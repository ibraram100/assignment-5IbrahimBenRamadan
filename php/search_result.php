<!-- ابراهيم محمد فاتح بن رمضان -->
<!-- 2023/07/24 -->
<!-- This file returns expense search result  -->
<?php 
error_reporting(E_ALL);
ini_set('display_errors', 'On');

require_once "functions.php";
// Connecting to db
$conn = db_connection();
// Starting session 
start_check_session();
$user_id = $_SESSION['user_id'];

extract($_POST, EXTR_PREFIX_ALL, 'var');
// checking if inputs are set by using isset()
foreach($_POST as $key=>$value){
  if(!isset($key)){
    echo "<h1 style='color:red;'>Please use the form normally, like normal people ya know</h1>";
    exit(0);
  }
}
// Checking for empty variables
$counter = 0;
foreach($_POST as $key=>$value){
  if(empty($value) and $key != 'last_name'){
    echo "<h1 style='color:red;'>$key is required !</h1>";
    $counter++;
  }
}
if ($counter>0)
{
    echo "<h1 style='color:red;'>Please fill requierd fields</h1>";
    echo "<button><a href='../php/expenses.php'>Go back</a></button>";
    exit(0);
}



// Making sure that date or expense name are not empty
// if (empty($var_search_name) and (empty($var_to_date) or empty($var_to_date)))
// {
//     echo "Please search by name, or date or both.";
//     echo "<button><a href='../php/expenses.php'>Go back</a></button>";
//     exit();
// }
// else if ((empty($var_to_date) and !empty($var_from_date)) or (empty($var_from_date) and !empty($var_to_date)))
// {
//     echo "Please use both date fields.";
//     echo "<button><a href='../php/expenses.php'>Go back</a></button>";
//     exit();
// }


// Sql query to return all expenses between a specific period 
$sql = "SELECT * FROM expense WHERE user_user_id = '$user_id' AND date > '$var_from_date' AND date < '$var_to_date' AND category_category_id = '$var_category_dropdown';";
$payment_sql = "SELECT * FROM payment_type WHERE user_id = '$user_id';";
$category_name_sql = "SELECT * FROM category WHERE user_user_id = '$user_id';";
$category_name = $conn->query($category_name_sql);

$result = $conn->query($sql);
$payment_result = $conn->query($sql);


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
    <!-- Body -->
    <body>
        <!-- Header links -->
        <header>
        <div class="logo">
            <a href="home.php"><img src="../images/shroom wojak.png" alt="Logo" class="logo_img">Expense Tracker</a>
        </div>
          <nav>
            <ul>
              <li><a href="home.php">Home</a></li>
              <li><a href="#">Categories</a></li>
              <li><a href="login.html">Login</a></li>
              <li><a href="#">Log Out</a></li>
              <li><a href="../php/edit_profile.php"><?php echo $_SESSION['username'] ?>'s Profile</a></li>
              <li><a href="../php/add_expense_fe.php">Add expense</a></li>
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
    <th class="footer_th" colspan="3"><h1 class="footer_h1">expense name</h1></th>
    <th class="footer_th" colspan="3"><h1 class="footer_h1">expense amount</h1></th>
    <th class="footer_th" colspan="3"><h1 class="footer_h1">Category</h1></th>
    <th class="footer_th" colspan="3"><h1 class="footer_h1">Edit</h1></th>
    <th class="footer_th" colspan="3"><h1 class="footer_h1">Delete</h1></th>


    <br>
    <?php
  while($data = $result->fetch_array(MYSQLI_ASSOC))
  {
    ?>
    <tr>
    <td class="footer_td" colspan="3">
      <h1><?php echo $data['expense_name'] ?></h1>
    </td>
    <td class="footer_td" colspan="3">
      <h1><?php echo $data['amount'] ?></h1>
    </td>
    <td class="footer_td" colspan="3">
        <!-- Getting category names -->
        <?php 
        $category_category_id = $data['category_category_id'];
        $sql_cat_name = "SELECT * FROM category WHERE category_id = '$category_category_id';";
        $category_query = $conn->query($sql_cat_name);
        ($category_name = $category_query->fetch_array(MYSQLI_ASSOC));
        ?>
      <h1><?php echo $category_name['category_name'] ?></h1>
    </td>
    <td class="footer_td" colspan="3">
      <form action="../php/edit_expense_fe.php" method="post">
        <input type="hidden" name="expense_id" value="<?php echo $data['expense_id']; ?>">
        <input type="hidden" name="category_id" value="<?php echo $category_name['category_id']; ?>">
        <input type="hidden" name="category_budget" value="<?php echo $category_name['budget']; ?>">
        <?php echo $category_name['budget']; ?>
        <input class="edit_button" type="submit" value="Edit">

      </form>
    </td>
    <td class="footer_td" colspan="3">
      <form action="../php/delete_expense.php" method="post">
        <input type="hidden" name="expense_id" value="<?php echo $data['expense_id']; ?>">
        <input type="hidden" name="expense_amount" value="<?php echo $data['amount']; ?>">
        <input type="hidden" name="category_budget" value="<?php echo $category_name['budget']; ?>">
        <input type="hidden" name="category_id" value="<?php echo $category_name['category_id']; ?>">

        <input class="edit_button" type="submit" value="Delete">
      </form>
    </td>
    </tr>
    <?php
}
echo "</table>";

}
?>