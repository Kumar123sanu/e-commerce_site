<?php
session_start();
if(isset($_SESSION['username'])){
    echo "Wellcome".$_SESSION['username'];
    echo "<br>";
    echo "And your password is".$_SESSION['password'];
    echo "<br>";
    echo "And your email is".$_SESSION['email'];
    
}
else{
    echo "You are not logged in";
}


?>