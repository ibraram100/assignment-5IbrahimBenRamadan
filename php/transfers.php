<!-- ابراهيم محمد فاتح بن رمضان -->
<!-- 2023/08/03 -->
<!-- Allowing logged in users to view their transfers  -->

<?php
error_reporting(E_ALL);
ini_set('display_errors', 'On');
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



// $name_sql = "SELECT * FROM category WHERE user_user_id = $user_id ;";
// Getting category names
$name_sql = $conn->prepare("SELECT * FROM category WHERE category_id = ?");


// Prepare the statement for the SELECT query
$sql = $conn->prepare("SELECT * FROM category_transfer WHERE user_user_id = ?");
$sql->bind_param("i", $user_id);
$sql->execute();
$result = $sql->get_result();

// Executing query
// $result = $conn->query($sql);
// if (!$result)
// {
//   echo "Error in executing query";
//   echo $sql;
//   die($conn->error);
// }




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
              <li><a href="../php/add_categories_fe.php">Add Category</a></li>
              <li><a href="../html/login.html">Login</a></li>
              <li><a href="../php/logout.php">Log Out</a></li>
              <!-- Added user profile to the navbar -->
              <li><a href="../php/edit_profile.php"><?php echo $_SESSION['username'] ?>'s Profile</a></li>
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
    <th class="footer_th" colspan="3"><h1 class="footer_h1">Source category</h1></th>
    <th class="footer_th" colspan="3"><h1 class="footer_h1">Destination</h1></th>
    <th class="footer_th" colspan="3"><h1 class="footer_h1">date</h1></th>
    <th class="footer_th" colspan="3"><h1 class="footer_h1">Amount</h1></th>
    <th class="footer_th" colspan="3"><h1 class="footer_h1">Comment</h1></th>


    <br>
    <?php
  while($data = $result->fetch_array(MYSQLI_ASSOC))
  {
    ?>
    <tr>
    <td class="footer_td" colspan="3">
      <h1>
            <?php
                // echo $data['category_from'];  
                $name_sql->bind_param("i", $data['category_from']);
                $name_sql->execute();
                $result2 = $name_sql->get_result();
                $data2 = $result2->fetch_array(MYSQLI_ASSOC);
                echo $data2['category_name'];

                
            ?>
        </h1>
    </td>
    <td class="footer_td" colspan="3">
      <h1>
        <?php 
                // echo $data['category_to'];
                $name_sql->bind_param("i", $data['category_to']);
                $name_sql->execute();
                $result2 = $name_sql->get_result();
                $data2 = $result2->fetch_array(MYSQLI_ASSOC);
                echo $data2['category_name'];

        ?>
      </h1>
    </td>

    <td class="footer_td" colspan="3">
      <h1><?php echo $data['date'] ?></h1>
    </td>
    <td class="footer_td" colspan="3">
      <h1>
        <?php 
                echo $data['transfer_amount'];
        ?>
      </h1>
    </td>
    <td class="footer_td" colspan="3">
      <h1>
        <?php 
                echo $data['comment'];
        ?>
      </h1>
    </td>
    </td>
    </tr>
    <?php
}
echo "</table>";

}
?>