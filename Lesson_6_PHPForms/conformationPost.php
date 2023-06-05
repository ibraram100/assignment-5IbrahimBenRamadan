<?php
if(!isset($_POST['fName']) or !isset($_POST['lName']) ){
   echo " <H1> You Need to Submit the Form!! <H1>";
   exit;
}   
   $var_fName = $_POST['fName'];

   $var_lName = $_POST['lName'];
   $var_credit_card = $_POST['credit_card'];

  if (empty($var_fName )) {
        echo "<p> The field $var_fName is   required. </p>";
    }
 if (empty($var_lName)){
    echo "<p> The field $var_lName is  required. </p>";
    }
    echo "Thank you for filling out the scholarship form, "     .$var_fName." ".$var_lName. ".";
    
    echo "The credit card you want to use is " . 	$var_credit_card;


?>
