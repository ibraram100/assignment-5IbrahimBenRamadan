<!-- ابراهيم محمد فاتح بن رمضان -->
<!-- 2023/07/02 -->
<!-- when a user vists this page, the user will be logged out immediatly, no questions asked (which is a very bad practice in my opinion) -->
<?php 
session_start();
// If user is logged in, user will be logged out
if(isset($_SESSION) && !empty($_SESSION['user_id']))
{
    session_destroy();
    header("Location: ../html/login.html");
    exit();
}// if user is not logged in, user will be redirected to home page
else 
{
    header("Location: ../html/home.html");
    exit();
}
?>