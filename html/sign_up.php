<?php 
// if(!isset($_POST['first_name']) or !isset($_POST['last_name'])  ){
//     echo " <H1> You Need to Submit the Form!! <H1>";
//     exit;
//  }   

 extract($_POST, EXTR_PREFIX_ALL, 'var');
 if (empty($var_first_name))
 {
    echo "<h1 style='color:red;'>First name is required !</h1>";
 }
 
 if (empty($var_username))
 {
    echo "<h1 style='color:red;'>Username is required !</h1>";
 }
 if (empty($var_password))
 {
    echo "<h1 style='color:red;'>Password is required !</h1>";
 }

 if (empty($var_confirm_password))
 {
    echo "<h1 style='color:red;'>Please confirm password !</h1>";
 }
 
 


?>