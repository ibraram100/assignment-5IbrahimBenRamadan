<!-- ابراهيم محمد فاتح بن رمضان -->
<!-- 2023/07/09 -->
<!-- Allowing logged in users edit their profile data -->
<!-- new data is then sent to edit_profile_query.php -->
<?php 
require_once "functions.php";
session_start();
// If user is not logged in, user will be redirected to login page
if (!isset($_SESSION['user_id']))
{
  // **add a message to the login page stating that the user must login in order to use this feature**
  header("Location: ../html/login.html");
  exit();
}
// Connecting to db
$conn = db_connection();
// Query
$user_id = $_SESSION['user_id'];
$sql = "SELECT * FROM user WHERE user_id = $user_id ;";
// Executing query
$result = $conn->query($sql);
if (!$result)
{
  echo "Error in executing query";
  echo $sql;
  die($conn->error);
}
// If query is returned with more than 1 row that means something have gone terribly wrong
$data = mysqli_fetch_assoc($result);
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
                  <li><a href="../php/add_categories_fe.php">Add Category</a></li>
                  <li><a href="SignUp.html">Sign Up</a></li>
                  <li><a href="login.html">Login</a></li>
                  <li><a href="../php/logout.php">Log Out</a></li>
                  <li><a href="#">
                    <?php echo $_SESSION['username'];?> Profile</a></li>
                </ul>
              </nav>
            </header>
            <main>
            <div>
                <form class="sign_up_form" action="../php/edit_profile_query.php"  method="post">
                    <h1 class="h1_form">Edit Profile</h1>
                    <p class="p_form">Please edit the following fields </p>
                    <div class="input">
                        <label for="email" class="sign_up_label"> Email </label>
                        <br>
                        <input type="email" name="email" value="<?php echo $data['user_email'] ?>">
                        <br>
                        <label for="text" class="sign_up_label"> Username </label>
                        <br>
                        <input type="text" name="username" value="<?php echo $data['username'] ?>">
                        <br>
                        <label for="text" class="sign_up_label"> Password </label>
                        <br>
                        <input type="password" name="password" value="<?php echo $data['password'] ?>">
                        <br>
                        <label for="text" class="sign_up_label">Confirm Password </label>
                        <br>
                        <input type="password" name="confirm_password" value="<?php echo $data['password'] ?>">
                        <br>
                        <label for="text" class="sign_up_label"> First Name </label>
                        <br>
                        <input type="text" name="first_name" value="<?php echo $data['first_name'] ?>">
                        <br>

                        <label for="text" class="sign_up_label"> Last Name </label>
                        <br>
                        <input type="text" name="last_name" value="<?php echo $data['last_name'] ?>">
                        <br>

                        <input type="submit">
                    </div>
                </form>
            </div>   
            </main>
    </body>
</html>



