<?php
session_start();
if (isset($_POST['session_name'])) {$_SESSION[''.$_POST['session_name']] = $_POST['session_value'];}
?>

