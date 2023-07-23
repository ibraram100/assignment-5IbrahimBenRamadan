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
$user_id =  $_SESSION['user_id'];

// Calculating expense_id based on the number of rows (expenses) to generate the next expense id.
$number_of_expenses_query = "SELECT COUNT(*) FROM expense;";
$result = ($conn->query($number_of_expenses_query));
// Converting the mysqli result to an array 
$result = mysqli_fetch_row($result);
$expense_id = $result[0]+1;


// Making sql query 
$sql = "INSERT INTO expense (expense_id,category_category_id,user_user_id,expense_name,amount,date,payment_type_payment_id)
VALUES ('$expense_id',$var_category_dropdown,1,'$var_expense_name','$var_amount','$var_date',4)";
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
