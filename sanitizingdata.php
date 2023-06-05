<?php

//Use of filter_var()
$str = "<h1>CS315</h1>";

$newstr = filter_var($str,FILTER_SANITIZE_STRING);
	
echo $newstr . "<br>";
#---------------
$email = "al.aburas@uot.edu.l<y>";
  
// Remove all illegal characters
// from email
$nemail = filter_var($email, FILTER_SANITIZE_EMAIL);
         
echo $nemail . "<br>";
$url = "www.uot.edu.l°y";
  
// Remove all illegal characters
// from a url
$nurl = filter_var($url,
        FILTER_SANITIZE_URL);
         
echo $nurl;
?>
