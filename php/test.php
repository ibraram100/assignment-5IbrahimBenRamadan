<?php 

// 2023/06/28 assignment 5 
// Including dbconn.php which contains db info
require_once 'dbconn.php';
// Connecting to the database using dbconn.php 
try {
    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);

    // Check connection
    if ($conn->connect_error) {
        throw new Exception("Failed to connect to MySQL: " . $conn->connect_error);
    }

    // Connection successful, do something with it
    echo "Connected successfully!";
} catch (Exception $e) {
    // Handle the exception
    echo $e->getMessage();
}
?>