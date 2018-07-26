<?php
$host        = "host = localhost";
$port        = "port = 5432";
$dbname      = "dbname = training";
$credentials = "user = postgres password=have@tript0Singapore";
$db = pg_connect("$host $port $dbname $credentials");
?>
