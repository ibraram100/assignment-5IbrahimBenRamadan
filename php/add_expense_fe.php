<!-- ابراهيم محمد فاتح بن رمضان -->
<!-- 2023/07/18 -->
<!-- This file displays the php form to add a new expense -->

<?php 
require_once "functions.php";
// Connecting to db
db_connection();
// Starting session 
start_check_session();
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
            </ul>
          </nav>
        </header>
        <!-- Main content -->
        <main>
            <div>
                <form class="sign_up_form" action="../php/add_expense.php" method="post">
                    <h1 class="h1_form">Add Expense</h1>
                    <p class="p_form">Please fill the following required fields to add new expense </p>
                    <div class="input">
                        <label for="email" class="sign_up_label"> Expense Name* </label>
                        <br>
                        <input type="name" name="expense_name" placeholder="Expense Name">
                        <br>
                        <label for="username" class="sign_up_label"> Amount* </label>
                        <br>
                        <input type="number" name="amount">
                        <br>
                        <label for="first_name" class="sign_up_label"> Comment </label>
                        <br>
                        <input type="text" name="comment" placeholder="I bought this thing because of ....">
                        <br>
                        <label for="last_name" class="sign_up_label"> Date </label>
                        <br>
                        <input type="date" name="date">
                        <br>
                        <input type="submit">
                    </div>             
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