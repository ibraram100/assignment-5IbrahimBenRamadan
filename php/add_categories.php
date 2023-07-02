<!-- 2023/07/02 -->
<!-- ابراهيم محمد فاتح بن رمضان -->
<!-- This file stores categories in the database -->
<?php 
error_reporting(E_ALL);
ini_set('display_errors', 'On');

// Starting session
session_start();
// If user is not logged in, user will be redirected to login page
if (!isset($_SESSION['user_id']))
{
  // **add a message to the login page stating that the user must login in order to use this feature**
  header("Location: ../html/login.html");
  exit();
}


require_once "functions.php";
// Connecting to database
$conn = db_connection();

// Reciving data from add_categories_fe
extract($_POST, EXTR_PREFIX_ALL, 'var');
check_var();
echo $var_category_name;
echo $var_budget;
echo "hello";



// Each category will be given an id by the system
// Calculating the id based on the number of rows (created categories) to generate the next category's id
$number_of_categories_query = "SELECT COUNT(*) FROM category;";
$result = ($conn->query($number_of_categories_query));
// Converting the mysqli result to an array 
$result = mysqli_fetch_row($result);
$category_id = $result[0]+1;
$user_id = $_SESSION['user_id'];
// Current date
$current_date = date('Y-m-d');
// Category query
$sql = "INSERT INTO category (category_id, category_name, budget, reminder, budget_limit, user_user_id, creation_date)
VALUES ('$category_id','$var_category_name', '$var_budget', '$var_reminder','$var_budget_limit','$user_id','$current_date')";
$result = $conn->query($sql);

if (!$result)
{
  echo "Error: " . $sql . "<br>" . $conn->error;
}
else 
{
  // Displaying categories in categories.php
  header("Location: categories.php");
}
?>


