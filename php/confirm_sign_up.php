 <!-- ابراهيم محمد فاتح بن رمضان -->
 <!-- If all of the data entered correctly on sign_up.php, user's data will be displayed here   -->
<?php
extract($_GET,EXTR_PREFIX_ALL,'var');
foreach($_GET as $key=>$value){
    if(!isset($key)){
      echo "<h1 style='color:red;'>Please use the form normally, like normal people ya know</h1>";
      exit(0);
    }
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
        <title>Confirm Sign Up</title>
        <!-- Favicon -->
        <link rel="icon" href="../images/shroom wojak.png" type="image/x-icon">
    </head>
    <body>
        <header>
            <div class="logo">
            <a href="../html/home.html"><img src="../images/shroom wojak.png" alt="Logo" class="logo_img">Expense Tracker</a>
              </div>
              <nav>
                <ul>
                  <li><a href="#">Categories</a></li>
                  <li><a href="../html/SignUp.html">Sign Up</a></li>
                  <li><a href="../html/login.html">Login</a></li>
                  <li><a href="#">Log Out</a></li>
                </ul>
              </nav>
            </header>
        <main>
            <!-- Displaying user data in a table -->
            <table class="user_data">
                <tr>
                    <th class="user_data">Email</th>
                    <th class="user_data">Username</th>
                    <th class="user_data">Name</th>
                    <th class="user_data">Password</th>
                    <th class="user_data">Gender</th>

                </tr>
                <tr>
                    <td class="user_data"><?php echo "<h1>$var_email</h1>"; ?></td>
                    <td class="user_data"><?php echo "$var_username"; ?></td>
                    <td class="user_data"><?php echo "$var_first_name $var_last_name"; ?></td>
                    <td class="user_data"><?php echo "$var_password"; ?></td>
                    <td class="user_data"><?php echo "$var_gender"; ?></td>

                </tr>
                
                </tr>
            </table>
            <button><a href="../html/home.html">Go Home</a></button>

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