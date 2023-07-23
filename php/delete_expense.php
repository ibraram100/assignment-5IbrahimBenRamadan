<!-- ابراهيم محمد فاتح بن رمضان -->
<!-- 2023/07/23 -->
<!-- deleting expenses -->
<?php 
error_reporting(E_ALL);
ini_set('display_errors', 'On');

require_once "functions.php";
$conn = db_connection();
extract($_POST, EXTR_PREFIX_ALL, 'var');


// delete expense sql
$expense_sql = "DELETE FROM expense  WHERE expense_id = $var_expense_id;";


// Update category sql 
$new_budget = $var_category_budget+$var_expense_amount;
$category_sql = "UPDATE category SET budget = '$new_budget' WHERE category_id = '$var_category_id';";
// using transaction to update expense amount and category budget
$conn->begin_transaction();
try 
{
    $conn->query($expense_sql);
    $conn->query($category_sql);
    $conn->commit();
    header('location: expenses.php');

}
catch (Exception $e)
{
   echo "Couldn't delete expense !";
   $conn->rollback();
}

?>
