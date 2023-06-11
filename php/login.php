<!-- If username and password exisit, user will be logged in successfully and taken to home page -->

<?php 


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
$users_pass_arr = array(
  "admin_2023" => "Admin_2023",
  "cs314_2023" => "Cs314_2023",
  "system_admin" => "System_admin1"
);


foreach ($users_pass_arr as $username => $password) {
  if ($log_username == $username and $log_password == $password) {
    echo "<h1>Welcome Back $username</h1>";
    exit(0);
  }
}


echo "<h1 style='color:red;'>User Not Found !</h1>";
echo "<button><a href='../html/login.html'>Go back</a></button>";

?>
