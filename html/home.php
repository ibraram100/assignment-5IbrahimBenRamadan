<!-- ابراهيم محمد فاتح بن رمضان -->
<!-- Home page that have a really short brief description of the website  -->


<!DOCTYPE html>
<?php 
// Starting Session
session_start();

?>
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
              <div style="display: flex;">
                <div style="flex: 1;">
                    <h1 class="home_section">new era of financial management</h1>
                </div>
                <div style="flex: 1;">
                    <img src="../images/home_section.png" alt="Picture">
                </div>
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
                                  <a href="home.html">Home</a>
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