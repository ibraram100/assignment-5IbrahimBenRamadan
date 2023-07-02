<!-- this page contains some functions that can be reused through out the project -->
<?php 

// This function connects to the db using dbconn.php
function db_connection()
{
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
return $conn;

}
// This function starts session and checks if user is logged in or not
function start_check_session()
{
    session_start();
    // If user is not logged in, user will be redirected to login page
    if (!isset($_SESSION['user_id']))
    {
        // **add a message to the login page stating that the user must login in order to use this feature**
        header("Location: ../html/login.html");
        exit();
    }
    else
    {
        echo $_SESSION['username'];
    }
}

// This functions checks if variables are set and not empty
function check_var()
{
// checking if inputs are set by using isset()
foreach($_POST as $key=>$value){
  if(!isset($key)){
    echo "<h1 style='color:red;'>Please use the form normally, like normal people ya know</h1>";
    exit(0);
  }
}


// Checking for empty variables
foreach($_POST as $key=>$value){
  if(empty($value) and $key != 'last_name'){
    echo "<h1 style='color:red;'>$key is required !</h1>";
  }
}

}


?>