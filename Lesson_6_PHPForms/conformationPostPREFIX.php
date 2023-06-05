<?php
  //  $var_fName = $_POST['fNae'];
  //  $var_lName = $_POST['lName'];
  extract($_POST, EXTR_PREFIX_ALL, 'var');
  if (empty($var_fName )) {
    echo "<p> The field $var_fName is   required. </p>";
}
if (empty($var_lName)){
echo "<p> The field $var_lName is  required. </p>";
}
    echo "Thank you for filling out the scholarship form, "
         .$var_fName." ".$var_lName. ".";
    echo "The credit card you want to use is " . 	$var_credit_card;

?>
