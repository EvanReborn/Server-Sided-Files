<?php
$db_host = "enter";
$db_user = "your";
$db_pass = "own";
$db_name = "credentials";

$con = mysqli_connect($db_host, $db_user, $db_pass, $db_name);

if (mysqli_connect_error())
    die("Failed to connect to DB!");
