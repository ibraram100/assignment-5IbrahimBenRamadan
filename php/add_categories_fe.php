<!-- ابراهيم محمد فاتح بن رمضان -->
<!-- 2023/07/02 -->
<!-- This page allows logged in users to create new categories  -->
<!-- Form data is then sent to add_categories.php in order to be stored in the database -->

<?php 
require_once 'functions.php';
// This function starts session and checks if user is logged in or not
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
              <li><a href="../html/home.php"><?php echo $_SESSION['username'] ?>'s Profile</a></li>
            </ul>
          </nav>
        </header>
        <main>
            <div>
                <form class="sign_up_form" action="add_categories.php"  method="post">
                    <h1 class="h1_form">Add Category</h1>
                    <p class="p_form">Please fill the following required fields create a category </p>
                    <div class="input">
                        <label for="username" class="sign_up_label"> Category Name </label>
                        <br>
                        <input type="text" name="category_name" placeholder="Sowrds">
                        <br>
                        <label for="text" class="sign_up_label"> Budget </label>
                        <br>
                        <input type="number" name="budget">
                        <br>
                        <label for="text" class="sign_up_label"> Reminder </label>
                        <br>
                        <input type="date" name="reminder">
                        <br>
                        <label for="text" class="sign_up_label"> Budget Limit </label>
                        <br>
                        <input type="number" name="budget_limit">
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


