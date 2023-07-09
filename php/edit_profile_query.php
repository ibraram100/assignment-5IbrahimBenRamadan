<?php 
error_reporting(E_ALL);
ini_set('display_errors', 'On');
session_start();
require_once "functions.php";
$conn = db_connection();
extract($_POST, EXTR_PREFIX_ALL, 'var');


// Reusing same signup.php code to validate data
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

// Displaying a go back to edit profile if there are one or more empty required fields and/or illegal inputs
if ($counter>0){
  echo "<button><a href='../php/edit_profile.php'>Go back</a></button>";
  exit(0);
}





$user_id = $_SESSION['user_id'];

$sql = "UPDATE user SET user_email = '$var_email', username='$var_username', password='$var_password', first_name = '$var_first_name' WHERE user_id='$user_id';";

$conn->query($sql);
if (!$conn->query($sql))
{
    die ("error excuting query");
}
else 
{
    header("location:categories.php");
}

?>

