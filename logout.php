<?php 
if(!isset($_SESSION)) 
{ 
    session_start(); 
}

session_destroy();

echo "<script>alert('anda telah logout');</script>";
echo "<script>location='index.php';</script>";

?>