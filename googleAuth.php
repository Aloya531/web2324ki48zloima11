<?php
session_start();
            $email = $_POST["email"];
            $password= "temp";
            $name="temp";

         require_once "database.php";
            $sql = "SELECT * FROM Users WHERE email = '$email'";
            $result = mysqli_query($conn, $sql);
            $user = mysqli_fetch_array($result, MYSQLI_ASSOC);

           if ($user) {


            }else{

                $sql = "INSERT INTO Users (email, password,login) VALUES ( ?, ?, ? )";
            $stmt = mysqli_stmt_init($conn);
            $prepareStmt = mysqli_stmt_prepare($stmt,$sql);
            if ($prepareStmt) {

                mysqli_stmt_bind_param($stmt,"sss", $email, $password,$name);
                mysqli_stmt_execute($stmt);

                 $sql = "SELECT * FROM Users WHERE email = '$email'";
            $result = mysqli_query($conn, $sql);
            $user = mysqli_fetch_array($result, MYSQLI_ASSOC);

            }else{
                die("Something went wrong");
            }
            }



             $_SESSION["user"] = $user;
                header("Location: index.html");
                 die();


?>