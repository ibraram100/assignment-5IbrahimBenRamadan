<!-- ابراهيم محمد فاتح بن رمضان -->
<!-- 2023/07/03 -->
<!-- Delete category from database -->
<?php 
error_reporting(E_ALL);
ini_set('display_errors', 'On');
require_once "functions.php";
$conn = db_connection();
extract($_POST, EXTR_PREFIX_ALL, 'var');

$sql = "DELETE FROM category WHERE category_id = $var_category_id;";
$conn->query($sql);
if (!$conn->query($sql))
{
    die ("error excuting query");
}
else 
{
    header("location:categories.php");
}



?>
