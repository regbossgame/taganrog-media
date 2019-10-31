<?php
include "cook_life.php";
//session_start();
$_SESSION['log']="";
unset($_SESSION["log"]);
//unset($_SESSION["pas"]);
//unset($_SESSION["name"]);

header("LOCATION: ".$_SERVER['HTTP_REFERER']);
?>