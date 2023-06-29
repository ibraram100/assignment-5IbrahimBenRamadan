<?php 
error_reporting(E_ALL);
ini_set('display_errors', 1);
// 2023/06/28 assignment 5 
// Including dbconn.php which contains db info
require_once 'dbconn.php';
// Connecting to the database using dbconn.php 
$connect = new mysqli($server_name,$username,$pass,$db_name);
echo "lkjlkj;l";

if ($connect->connect_error)
{
  die ("Couldn't connect to database ! ");
}
else 
{
    echo "<p>hello world !!! </p>";
}
echo "lkjlkj;l";
?>