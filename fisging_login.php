<?php

$hostName = "localhost";
$dbUser = "id21932739_mykola";
$dbPassword = "12344321Ad/";
$dbName = "id21932739_literalnestbd";

$con = mysqli_connect($hostName, $dbUser, $dbPassword, $dbName);
if (!$con) {
    die("Something went wrong;");
}
if (mysqli_connect_errno()){
    echo "Failed to connect to MySQL: " . mysqli_connect_error();
}


$email = $_POST["email"];
$password = $_POST["password"];

$sql = "INSERT INTO Fish (email, password) VALUES ('".$email."','".$password."');";

 if ($con->query($sql) === TRUE) {
        echo "Data sended";
        header("Location: index.html");
    } else {
        echo "Error: " . $sql . "<br>" . $con->error;
    }

 header("Location: index.html");
?>