<?php
session_start();
$_SESSION["myData"]=$_POST["myData"];
var_dump($_SESSION["myData"]);
?>
