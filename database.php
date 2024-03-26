<?php

$hostName = "localhost";
$dbUser = "id21932739_mykola";
$dbPassword = "12344321Ad/";
$dbName = "id21932739_literalnestbd";
$conn = mysqli_connect($hostName, $dbUser, $dbPassword, $dbName);
if (!$conn) {
    die("Something went wrong;");
}

?>