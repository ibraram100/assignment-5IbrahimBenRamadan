<!-- ابراهيم محمد فاتح بن رمضان -->
<!-- 2023/07/23 -->
<!-- Updating the expense table with the new data -->
<?php 
error_reporting(E_ALL);
ini_set('display_errors', 'On');

require_once "functions.php";
$conn = db_connection();
extract($_POST, EXTR_PREFIX_ALL, 'var');


// Update expense sql
$expense_sql = "UPDATE expense SET amount=$var_amount,expense_name = '$var_expense_name',expense_comment = '$var_expense_comment', date = '$var_date';";
// Checking if the new expense amount is higher than category budget or if expense amount is negative value
if ($var_amount > $var_category_budget or $var_amount <0)
{
  echo "<h1>Expense amount is either higher than category budget or less than 0 </h1>";
  echo "<button><a href='../php/add_expense_fe.php'>Go back</a></button>";
  exit(0);
}

// example, original budget = 1000,original expense = 500, so that makes the original budget = 500
// the new amount = 400, then $new_budget = 400-500 => -100
// then $new_budget = 500-(-100) =>600
$new_budget = $var_amount - $var_category_budget;
$new_budget = $var_category_budget - $new_budget;
$category_sql = "UPDATE category SET budget = ";
// using transaction to update expense amount and category budget
$conn->begin_transaction();
try 
{
    $conn->query($expense_sql);
    $conn->commit();

}
catch (Exception $e)
{
    echo "error updating expense";
    exit();
}

?>
