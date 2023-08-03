<!-- ابراهيم محمد فاتح بن رمضان  -->
<!-- 2023/08/02 -->
<!-- This file checks for inputs and stores user review in the database -->

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

// using user_id as a primary key, since every user have only one review 
$stmt = $conn->prepare("SELECT user_user_id FROM review WHERE user_user_id = ?");
$stmt->bind_param("i", $user_id);
$stmt->execute();
$stmt->store_result();
$num_rows = $stmt->num_rows;
echo $num_rows;
// if a user have already reviewed the site, old review is gonna be updated
if ($num_rows == 1)
{
    // Making prepared update sql statment to protect againset sql injection 
    $stmt = $conn->prepare("UPDATE review
                              SET score = ?, comment = ?
                              WHERE review_id = ? AND user_user_id = ?");
    $stmt->bind_param("isii", $var_rating, $var_comment, $user_id, $user_id);
    $stmt->execute();
} // If it's first time leaving a review 
else if ($num_rows == 0)
{
    
     // Making prepared insert sql statment to protect againset sql injection 
    $stmt = $conn->prepare("INSERT INTO review (review_id, score, comment, user_user_id) 
                            VALUES (?, ?, ?, ?)");
    $stmt->bind_param("iisi", $user_id, $var_rating, $var_comment, $user_id);
    $stmt->execute();

}
else 
{
    echo "<h1 style= 'color:red;'>Something have gone terribly wrong</h1>";
    exit(0);
}





?>