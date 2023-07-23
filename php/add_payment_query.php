<!-- ابراهيم محمد فاتح بن رمضان -->
<!-- 2023/07/23 -->
<!-- This file executes query to add new payment method -->

<?php 
error_reporting(E_ALL);
ini_set('display_errors', 'On');


require_once "functions.php";
// Connecting to db
$conn = db_connection();
// Starting session 
start_check_session();


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

// Calculating payment_id based on the number of rows (payment methods) to generate the next payment id.
$number_of_payments_query = "SELECT COUNT(*) FROM payment_type;";
$result = ($conn->query($number_of_payments_query));
if (!$result)
{
    echo "error";
    exit();
}
// Converting the mysqli result to an array 
$result = mysqli_fetch_row($result);
$payment_id = $result[0]+1;
$user_id = $_SESSION['user_id'];

$sql = "INSERT INTO payment_type (payment_id,user_user_id,payment_type) VALUES ('$payment_id','$user_id','$var_payment_type');";
$result = $conn->query($sql);
if (!$result)
{
    echo "error adding payment type";
    exit();
}

?>