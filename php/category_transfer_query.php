<!-- ابراهيم محمد فاتح بن رمضان  -->
<!-- 2023/08/02 -->
<!-- This file transfers amount from one category to another and stores the transaction in category_transfer table -->

<?php 
error_reporting(E_ALL);
ini_set('display_errors', 'On');


require_once "functions.php";
// Connecting to db
$conn = db_connection();
// Starting session 
start_check_session();
$user_id = $_SESSION['user_id'];
// Extracting data
extract($_POST, EXTR_PREFIX_ALL, 'var');
// checking if inputs are set by using isset()
foreach($_POST as $key=>$value){
  if(!isset($key)){
    echo "<h1 style='color:red;'>Please use the form normally, like normal people ya know</h1>";
    exit(0);
  }
}
// Calculating transfer id
$number_of_transfers_query = "SELECT COUNT(*) FROM category_transfer;";
$result = ($conn->query($number_of_transfers_query));
// Converting the mysqli result to an array 
$result = mysqli_fetch_row($result);
$transfer_id = $result[0]+1;
$current_date = date('Y-m-d');



// Prepared statement for getting the source category budget
$get_budget_from = $conn->prepare("SELECT * FROM category WHERE category_id = ?");
$get_budget_from->bind_param("i", $var_category_from);
$get_budget_from->execute();
$get_from = $get_budget_from->get_result();
$get_from = $get_from->fetch_assoc();
$get_from = $get_from['budget'];

// Prepared statement for getting the destenation category budget
$get_budget_to = $conn->prepare("SELECT * FROM category WHERE category_id = ?");
$get_budget_to->bind_param("i", $var_category_to);
$get_budget_to->execute();
$get_to = $get_budget_to->get_result();
$get_to = $get_to->fetch_assoc();
$get_to = $get_to['budget'];

$new_from = $get_from - $var_transfer_amount;
$new_to = $get_to + $var_transfer_amount;


// Prepared statment for insert query
$sql_transfer = $conn->prepare("INSERT INTO category_transfer (transfer_id, date, transfer_amount, comment, category_from, category_to, user_user_id)
                       VALUES (?, ?, ?, ?, ?, ?, ?)");

$sql_transfer->bind_param("isdsiii", $transfer_id, $current_date, $var_transfer_amount, $var_comment, $var_category_from, $var_category_to, $user_id);


// Prepared statement for updating source category query
$sql_from = $conn->prepare("UPDATE category SET budget = ? WHERE category_id = ?");
$sql_from->bind_param("ii", $new_from, $var_category_from);


// Prepared statement for updating source category query
$sql_to = $conn->prepare("UPDATE category SET budget = ? WHERE category_id = ?");
$sql_to->bind_param("ii", $new_to, $var_category_to);


// If the transfered amount is greater than the source category's budget 
if ($var_transfer_amount > $get_from)
{
    echo "<h1 style='color:red;'>entered amount is greater than category's budget !</h1>";
    exit(0);
}
else
{ // if not, then insert this transaction to transfer_table and move the amount to the destination category
    $conn->begin_transaction();
    try 
    {
        $sql_transfer->execute();
        $sql_from->execute();
        $sql_to->execute();
        $conn->commit();
        header('location: transfers.php');
    }
    catch (Exception $e)
    {
        $conn->rollback();
        echo $e;
    }
}






?>