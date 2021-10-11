<?php
  ob_start();
session_start();

if(isset($_SESSION['login'])){
    unset($_SESSION['login']);
    header('location:'.SITEURL.'login.php');
}


?>