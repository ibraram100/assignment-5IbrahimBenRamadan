<!-- 2023/07/03 -->
<!-- ابراهيم محمد فاتح بن رمضان  -->
<!-- This file provides an edit form which then sends the data to edit_category_query.php  -->
<!-- edit_category_query.php will then send an update query to the database -->

<?php 
require_once "functions.php";
// Starting session
session_start();
// If user is not logged in, user will be redirected to login page
if (!isset($_SESSION['user_id']))
{
  // **add a message to the login page stating that the user must login in order to use this feature**
  header("Location: ../html/login.html");
  exit();
}
// Extracting login data from login.html
extract($_POST, EXTR_PREFIX_ALL, 'var');

// checking if Category id is set and not empty
foreach($_POST as $key=>$value){
    if(!isset($value)){
      echo "<h1 style='color:red;'>Please use the form normally, like normal people ya know</h1>";
      echo "<button><a href='../php/categories.php'>Go back</a></button>";
      exit(0);
    }
  }

  foreach($_POST as $key=>$value){
    if(empty($value)){
      echo "<h1 style='color:red;'>Please fill the fields</h1>";
      echo "<button><a href='../php/categories.php'>Go back</a></button>";
      exit(0);
    }
  }

// Connecting to db
$conn = db_connection();
// Making query
$sql = "SELECT * FROM category WHERE category_id = $var_category_id;";
$result = $conn->query($sql);
if (!$result)
{
  echo "Error in executing query";
  echo $sql;
  die($conn->error);
}
$data = $result->fetch_array(MYSQLI_ASSOC);
echo $data['category_name'];
// If query is returned with more than 1 row that means something have gone terribly wrong
$row = mysqli_fetch_assoc($result);
if ($result->num_rows != 1) 
{
  die("Somethnig went wrong");
} 


?>
<!DOCTYPE html>
<html>
    <head>
        <!-- Fonts  -->
        <!-- roboto -->
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Kanit:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
        <!-- Inter -->
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Kanit:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
        <!-- Styles  -->
        <link rel="stylesheet" href="../styles/styles.css">
        <!-- Title  -->
        <title>Expense Tracker</title>
        <!-- Favicon -->
        <link rel="icon" href="../images/shroom wojak.png" type="image/x-icon">
    </head>
    <body>
        <header>
            <div class="logo">
                <a href="home.html"><img src="../images/shroom wojak.png" alt="Logo" class="logo_img">Expense Tracker</a>
              </div>
              <nav>
                <ul>
                  <li><a href="../php/categories.php">Categories</a></li>
                  <li><a href="SignUp.html">Sign Up</a></li>
                  <li><a href="login.html">Login</a></li>
                  <li><a href="#">Log Out</a></li>
                  <li><a href="#">
                    <?php echo $_SESSION['username'];?> Profile</a></li>
                </ul>
              </nav>
            </header>
            <main>
            <div>
                <form class="sign_up_form" action="../php/edit_category_query.php"  method="post">
                    <h1 class="h1_form">Edit Category</h1>
                    <p class="p_form">Please edit the following fields </p>
                    <div class="input">
                        <label for="username" class="sign_up_label"> Category Name </label>
                        <br>
                        <input type="text" name="category_name" value="<?php echo $data['category_name'] ?>">
                        <br>
                        <label for="text" class="sign_up_label"> Budget </label>
                        <br>
                        <input type="number" name="budget" value="<?php echo $data['budget'] ?>">
                        <br>
                        <label for="text" class="sign_up_label"> Reminder </label>
                        <br>
                        <input type="date" name="reminder" value="<?php echo $data['reminder'] ?>">
                        <br>
                        <label for="text" class="sign_up_label"> Budget Limit </label>
                        <br>
                        <input type="number" name="budget_limit" value="<?php echo $data['budget_limit'] ?>">
                        <br>
                        <input type="submit">
                    </div>
                </form>
            </div>   
            </main>
    </body>
</html>

