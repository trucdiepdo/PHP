<?php
$host        = "host = 172.16.3.82";
$port        = "port = 5432";
$dbname      = "dbname = Training";
$credentials = "user = postgres password=have@tript0Singapore";

$db = pg_connect("$host $port $dbname $credentials");
?>
