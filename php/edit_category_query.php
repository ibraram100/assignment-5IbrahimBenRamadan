<!-- Updating the database with the new data -->
<?php 
error_reporting(E_ALL);
ini_set('display_errors', 'On');
require_once "functions.php";
$conn = db_connection();
extract($_POST, EXTR_PREFIX_ALL, 'var');
echo $var_budget_limit;
// $var_category_id = 8;
echo $var_category_name;
$sql = "UPDATE category SET budget=$var_budget, budget_limit=$var_budget_limit, category_name='$var_category_name', reminder = '$var_reminder' WHERE category_id='$var_category_id';";
$conn->query($sql);
if (!$conn->query($sql))
{
    die ("error excuting query");
}
else 
{
    echo "hlkk";
    header("location:categories.php");
}



?>
