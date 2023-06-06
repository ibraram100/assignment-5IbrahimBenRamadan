<?php 
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
if (preg_match('/[\'^£$%&*()}{@#~?><>,|=_+¬-]/', $var_password) and strlen($var_password)>10){
  // echo "<h1>Strong Pass</h1>";
}
else {
  echo "<h1 style='color:red;'>Weak Password, Password must be at least 10 chars long and contain at least one special char !</h1>";
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


// Going to sign up confirmation page
echo "<form action='confirm_sign_up.php' method='post'>";
echo "<input type='hidden' name='username' value='".$var_password."' />";
echo "<input type='submit' value='submit' />";
echo "</form>";

header('location:confirm_sign_up.php');





?>