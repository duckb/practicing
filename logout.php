<?php
session_start();
/* once user press logout, clear all session and redirect him to home page*/
$_SESSION['name'] = '';
$_SESSION['userId'] = '';
unset($_SESSION);
header("Location:login.php");
?>