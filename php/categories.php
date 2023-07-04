<!-- ابراهيم محمد فاتح بن رمضان -->
<!-- 2023/06/30 -->
<!-- Allowing logged in users to view, edit categories (and maybe even search categories one day) -->

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
$sql = "SELECT * FROM category WHERE user_user_id = $user_id ;";
// Executing query
$result = $conn->query($sql);
if (!$result)
{
  echo "Error in executing query";
  echo $sql;
  die($conn->error);
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
        <title>Expense Tracker Sign Up</title>
        <!-- Favicon -->
        <link rel="icon" href="../images/shroom wojak.png" type="image/x-icon">
    </head>
    <!-- Header links -->
    <body>
    <header>
        <div class="logo">
            <a href="home.php"><img src="../images/shroom wojak.png" alt="Logo" class="logo_img">Expense Tracker</a>
        </div>
          <nav>
            <ul>
              <li><a href="../html/home.php">Home</a></li>
              <li><a href="#">Categories</a></li>
              <li><a href="../html/login.html">Login</a></li>
              <li><a href="../php/logout.php">Log Out</a></li>
              <!-- Added user profile to the navbar -->
              <li><a href="../html/home.php"><?php echo $_SESSION['username'] ?>'s Profile</a></li>
            </ul>
          </nav>
        </header>
        <main>
        

        </main>
    </body>
</html>


<?php 
if (!empty($result))
{
  ?>
  <table>
    <th class="footer_th" colspan="3"><h1 class="footer_h1">Category name</h1></th>
    <th class="footer_th" colspan="3"><h1 class="footer_h1">Category budget</h1></th>
    <th class="footer_th" colspan="3"><h1 class="footer_h1">Category date</h1></th>
    <th class="footer_th" colspan="3"><h1 class="footer_h1">Edit</h1></th>
    <th class="footer_th" colspan="3"><h1 class="footer_h1">Delete</h1></th>


    <br>
    <?php
  while($data = $result->fetch_array(MYSQLI_ASSOC))
  {
    ?>
    <tr>
    <td class="footer_td" colspan="3">
      <h1><?php echo $data['category_name'] ?></h1>
    </td>
    <td class="footer_td" colspan="3">
      <h1><?php echo $data['budget'] ?></h1>
    </td>
    <td class="footer_td" colspan="3">
      <h1><?php echo $data['creation_date'] ?></h1>
    </td>
    <td class="footer_td" colspan="3">
      <form action="../php/edit_category_fe.php" method="post">
        <input type="hidden" name="category_id" value="<?php echo $data['category_id']; ?>">
        <input class="edit_button" type="submit" value="Edit">
      </form>
    </td>
    <td class="footer_td" colspan="3">
      <form action="../php/delete_category.php" method="post">
        <input type="hidden" name="category_id" value="<?php echo $data['category_id']; ?>">
        <input class="edit_button" type="submit" value="Delete">
      </form>
    </td>
    </tr>
    <?php
}
echo "</table>";

}
?>