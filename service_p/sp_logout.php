<?php
session_start();

unset($_SESSION["login_sp"]);
     header("Location:../index.php");

?>