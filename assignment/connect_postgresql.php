<?php
$host        = "host = localhost";
$port        = "port = 5432";
$dbname      = "dbname = postgres";
$credentials = "user = postgres password=171096";
$db = pg_connect("$host $port $dbname $credentials");
?>
