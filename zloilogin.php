<?php
    
            $email = $_POST["email"];
           $password = $_POST["password"];
            require_once "database.php";
            $sql = "SELECT * FROM User WHERE email = '$email'";
            $result = mysqli_query($conn, $sql);
            $user = mysqli_fetch_array($result, MYSQLI_ASSOC);
           if ($user) {
                if ($password== $user["password"]) {
                    $_SESSION["user"] = $user;
                    header("Location: index.html");
                    die();
                }else{
                    echo "Password does not match";
                }
            }else{
                echo "Email does not match";
            }

?>