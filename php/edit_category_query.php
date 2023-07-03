<!-- Updating the database with the new data -->
<?php 
require_once "functions.php";
$conn = db_connection();
extract($_POST, EXTR_PREFIX_ALL, 'var');
echo $var_budget_limit;
$var_category_id = 8;
$sql = "UPDATE category SET budget=$var_budget, budget_limit=$var_budget_limit WHERE category_id='$var_category_id';";
$conn->query($sql);


?>
