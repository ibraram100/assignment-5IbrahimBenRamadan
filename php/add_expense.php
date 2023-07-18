<!-- ابراهيم محمد فاتح بن رمضان -->
<!-- 2023/07/18 -->
<!-- This file validates input data from add_expense_fe.php, if data is validated, data will be stored in database -->
<?php
error_reporting(E_ALL);
ini_set('display_errors', 'On');



require_once "functions.php";
// Connecting to db
$conn = db_connection();
// Starting session 
start_check_session();
// Checking if variables are set and not empty
extract($_POST, EXTR_PREFIX_ALL, 'var');
check_var();

echo $var_expense_name;
echo $var_amount;
echo $var_date;
// Making sql query
$user_id =  $_SESSION['user_id'];
$sql = "INSERT INTO expense (expense_id,category_category_id,user_user_id,expense_name,amount,date,payment_type_payment_id)
VALUES (1,7,1,'$var_expense_name','$var_amount','$var_date',4)";
$result = $conn->query($sql);

if (!$result)
{
  echo "Error: " . $sql . "<br>" . $conn->error;
}
else 
{
  echo "hurray !!";
}

?>
