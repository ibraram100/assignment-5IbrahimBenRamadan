<!-- ابراهيم محمد فاتح بن رمضان -->
<!-- the purpose of this page is to check and validate data before it get's sent to the server -->

<!-- 2023/06/29 -->
<!-- Storing users in database -->
<?php 
error_reporting(E_ALL);
ini_set('display_errors', 'On');

// Including dbconn.php which contains db info
require_once 'dbconn.php';
// Connecting to the database using dbconn.php 
try {
    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);

    // Check connection
    if ($conn->connect_error) {
        throw new Exception("Failed to connect to server ");
    }

    // if connection is good 
    echo "Connected successfully!";
} catch (Exception $e) {
    echo $e->getMessage();
}


extract($_POST, EXTR_PREFIX_ALL, 'var');
// checking if inputs are set by using isset()
foreach($_POST as $key=>$value){
  if(!isset($key)){
    echo "<h1 style='color:red;'>Please use the form normally, like normal people ya know</h1>";
    exit(0);
  }
}



// Checking for empty variables
$counter = 0;
foreach($_POST as $key=>$value){
  if(empty($value) and $key != 'last_name'){
    echo "<h1 style='color:red;'>$key is required !</h1>";
    $counter++;
  }
}

// Making sure passwords are strong
if (preg_match('/[\'^£$%&*()}{@#~?><>,|=_+¬-]/', $var_password) and(preg_match('/[A-Z]/', $var_password)) and(preg_match('/[a-z]/', $var_password)) and strlen($var_password)>10){
  // echo "<h1>Strong Pass</h1>";
}
else {
  echo "<h1 style='color:red;'>Weak Password, Password must be at least 10 chars long and contain at least one special char, one capital letter !</h1>";
  $counter++;
}

// Checking if password and confirm password match 
if($var_password != $var_confirm_password){
  echo "<h1 style='color:red;'>Passwords do not match !</h1>";
  $counter++;
}

// Sanitizing email and validating it
$var_email = filter_var($var_email,FILTER_SANITIZE_EMAIL);
if (!filter_var($var_email,FILTER_VALIDATE_EMAIL)){
  echo "<h1 style='color:red;'>Email is not valid !</h1>";
  $counter++;
}
// Checking the checkbox
if ($var_agree != 'on'){
  echo "<h1 style='color:red;'>You must agree to terms and services to sign up!</h1>";
  $counter++;
}


// Displaying a go back to signup button if there are one or more empty required fields and/or illegal inputs
if ($counter>0){
  echo "<button><a href='../html/SignUp.html'>Go back</a></button>";
  exit(0);
}

// Sanitizing username, first name and last name
$var_username = filter_var($var_username,FILTER_SANITIZE_SPECIAL_CHARS);
$var_first_name = filter_var($var_first_name,FILTER_SANITIZE_SPECIAL_CHARS);
$var_last_name = filter_var($var_last_name,FILTER_SANITIZE_SPECIAL_CHARS);

// Each user will be given an id by the system
// Calculating the id based on the number of rows (registered users) to generate the next user's id
$number_of_users_query = "SELECT COUNT(*) FROM user;";
$result = ($conn->query($number_of_users_query));
// Converting the mysqli result to an array 
$result = mysqli_fetch_row($result);
$id = $result[0]+1;

// Making sql insert query
$sql = "INSERT INTO user (user_id, user_email, username, password, first_name, last_name, gender)
VALUES ('$id','$var_email', '$var_username', '$var_password','$var_first_name','$var_last_name','$var_gender')";

$result = $conn->query($sql);

if (!$result)
{
  echo "Error: " . $sql . "<br>" . $conn->error;
}
else 
{
  // Displaying user data in confirmation_sign_up.php
  header("Location: confirm_sign_up.php?email=" . urlencode($var_email) . "&username=" . urlencode($var_username) . "&first_name=" . urlencode($var_first_name) . "&last_name=" . urlencode($var_last_name) . "&password=" . urlencode($var_password),"&gender=" . urlencode($var_gender),false);
}

?>