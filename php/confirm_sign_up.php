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
    </head>
    <body>
        <header>
            <!--  -->
        </header>
        <main>
            <!-- Displaying user data in a table -->
            <table>
                <tr>
                    <th>Email</th>
                    <th>Username</th>
                    <th>Name</th>
                    <th>Password</th>
                </tr>
                <tr>
                    <td><?php echo "$var_email"; ?></td>
                    <td><?php echo "$var_username"; ?></td>
                    <td><?php echo "$var_first_name $var_last_name"; ?></td>
                    <td><?php echo "$var_password"; ?></td>
                </tr>
                
                </tr>
            </table>
            <button><a href="#">Complete Sign Up</a></button>
            <button><a href="../html/SignUp.html">Go Back</a></button>

        </main>
    </body>
</html>