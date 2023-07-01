<!-- ابراهيم محمد فاتح بن رمضان -->
<!-- If username and password exisit, user will be logged in successfully and taken to home page -->


<?php 
// 2023/06/28 assignment 5 

// Starting session
session_start();

// Including dbconn.php which contains db info
require_once 'dbconn.php';
// Connecting to the database using dbconn.php 
try
{
  // Create connection
  $conn = new mysqli($servername, $username, $password, $dbname);

  // Check connection
  if ($conn->connect_error) {
    throw new Exception("Failed to connect to server ");
  }

  // if connection is good 
  echo "Connected successfully!";
} 
catch (Exception $e) 
{
  echo $e->getMessage();
}

// Extracting login data from login.html
extract($_POST, EXTR_PREFIX_ALL, 'log');

// checking if login inputs are set by using isset()
foreach($_POST as $key=>$value){
    if(!isset($value)){
      echo "<h1 style='color:red;'>Please use the form normally, like normal people ya know</h1>";
      echo "<button><a href='../html/SignUp.html'>Go back</a></button>";
      exit(0);
    }
  }

  foreach($_POST as $key=>$value){
    if(empty($value)){
      echo "<h1 style='color:red;'>Please fill the fields</h1>";
      echo "<button><a href='../html/login.html'>Go back</a></button>";
      exit(0);
    }
  }

// $users_pass_arr = array(
//   "admin_2023" => "Admin_2023",
//   "cs314_2023" => "Cs314_2023",
//   "system_admin" => "System_admin1"
// );


// foreach ($users_pass_arr as $username => $password) {
//   if ($log_username == $username and $log_password == $password) {
//     echo "<h1>Welcome Back $username</h1>";
//     echo "<button><a href='../html/home.html'>Go Home</a></button>";
//     exit(0);
//   }
// }


// Sql query to get username(email) and password
$sql = "SELECT * FROM user WHERE user_email = '$log_username' AND password = '$log_password' ";
$result = $conn->query($sql);
// Storing result in row
$row = mysqli_fetch_assoc($result);
if ($result->num_rows == 1) 
{
  echo "Login successful!";
  // if username and password are correct, store user id and username in session
  $_SESSION['user_id'] = $row['user_id'];
  $_SESSION['username'] = $row['username'];
  echo $row['username'];
  echo $row['user_id'];
  // Redirect to the home page or some other page
} 
else 
{
  echo "Invalid username or password.";
}



?>
