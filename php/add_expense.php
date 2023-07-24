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
$user_id =  $_SESSION['user_id'];

// Calculating expense_id based on the number of rows (expenses) to generate the next expense id.
$number_of_expenses_query = "SELECT COUNT(*) FROM expense;";
$result = ($conn->query($number_of_expenses_query));
// Converting the mysqli result to an array 
$result = mysqli_fetch_row($result);
$expense_id = $result[0]+1;

// Making sql query 
$sql = "INSERT INTO expense (expense_id,category_category_id,user_user_id,expense_name,amount,date,payment_type_payment_id)
VALUES ('$expense_id',$var_category_dropdown,$user_id,'$var_expense_name','$var_amount','$var_date',4)";
// Sql query to update category's budget 
$category_update = "UPDATE category SET budget = budget- $var_amount WHERE category_id = '$var_category_dropdown';";
// Sql query to get category in order to check if the expense amount is less than category budget
$category_sql = "SELECT * FROM category WHERE category_id = '$var_category_dropdown';";
$category_data = $conn->query($category_sql);
// Check if the query was executed
if (!$category_data)
{
  echo "Error: " . $sql . "<br>" . $conn->error;
  exit();
}


$category_data = $category_data->fetch_array(MYSQLI_ASSOC);
// Checking if expense amount is higher than category budget or if expense amount is negative value
if ($var_amount > $category_data['budget'] or $var_amount <0)
{
  echo "<h1>Expense amount is either higher than category budget or less than 0 </h1>";
  echo "<button><a href='../php/add_expense_fe.php'>Go back</a></button>";
  exit(0);
}

// Starting transaction 
$conn->begin_transaction();
try 
{
  // Insertin expense into expenses table
  $conn->query($sql);
  $conn->query($category_update);
  $conn->commit();
  


}
catch(Exception $e)
{
  $conn->rollback();
  echo "couldn't add expense";
  exit(0);
}

  header('location: expenses.php');


?>
