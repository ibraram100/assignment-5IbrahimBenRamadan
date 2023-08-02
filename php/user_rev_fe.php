<!-- ابراهيم محمد فاتح بن رمضان -->
<!-- 2023/08/02 -->
<!-- This page allows users to review the website -->

<?php 
error_reporting(E_ALL);
ini_set('display_errors', 'On');


require_once "functions.php";
// Connecting to db
$conn = db_connection();
// Starting session 
start_check_session();
$user_id = $_SESSION['user_id'];



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
              <li><a href="../php/expenses.php">Expenses</a></li>
              <li><a href="../php/edit_profile.php"><?php echo $_SESSION['username'] ?>'s Profile</a></li>
            </ul>
          </nav>
        </header>
        <!-- Main content -->
        <main>
            <div>
                <form action="../php/user_rev_query.php" method="post" class="sign_up_form">
                    <h1 class="h1_form">User Review Form</h1>
		            <label for="rating">Rating:</label><br>
		            <input type="radio" id="rating5" name="rating" value="5" required>
		            <label for="rating5">5</label>
		            <input type="radio" id="rating4" name="rating" value="4" required>
		            <label for="rating4">4</label>
		            <input type="radio" id="rating3" name="rating" value="3" required>
		            <label for="rating3">3</label>
		            <input type="radio" id="rating2" name="rating" value="2" required>
		            <label for="rating2">2</label>
		            <input type="radio" id="rating1" name="rating" value="1" required>
		            <label for="rating1">1</label><br><br>
		            <label for="review">Review:</label><br>
		            <textarea id="review" name="comment" rows="5" cols="40" required></textarea><br><br>
		            <input type="submit" value="Submit">
	            </form>
            </div>

            <footer>
            
                <table>
                    <th class="footer_th" colspan="3"><h1 class="footer_h1">Site Map</h1></th>
                    <th class="footer_th" colspan="3"><h1 class="footer_h1">Social Media</h1></th>
                    <th class="footer_th" colspan="3"><h1 class="footer_h1">About</h1></th>
    
                    <tr>
                        
                        <td class="footer_td" colspan="3">
                            <ul>
                                <li class="footer_li">
                                    <a href="home.php">Home</a>
                                </li>
                                <li class="footer_li">
                                    <a href="#">About </a>
                                </li>
                                <li class="footer_li">
                                    <a href="../html/login.html">Login</a>
                                </li>
                                <li class="footer_li">
                                    <a href="../html/SignUp.html">Sign Up</a>
                                </li>
                                <li class="footer_li">
                                    <a href="#">Categories</a>
                                </li>
                            </ul>
                        </td>
                        <td class="footer_td" colspan="3">
                            <ul>
                                <li>
                                   <img class="footer_icon" src="../images/facebook.png"> Facebook: <a href="https:facebook.com">Facebook.com</a> 
                                </li>
                                <li>
                                  <img class="footer_icon" src="../images/instagram.png"> instagram <a href="https:facebook.com">instagram.com</a> 
                                </li>
                                <li>
                                  <img class="footer_icon" src="../images/twitter.png"> twitter <a href="https:facebook.com">Twitter.com</a> 
                                </li>
                                
                            </ul>
    
                        </td>
                        <td class="footer_td" colspan="3">
                            <P style="color:white; margin:0px;padding:0px;">
                                This website was made as a part<br> of CS315 homework 
                            </P>
                        </td>
                    </tr>
                </table>
            </footer>

        </main>
    </body>


</html>