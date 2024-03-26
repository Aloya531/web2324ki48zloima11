<?php
           $fullName = $_POST["name"];
           $email = $_POST["email"];
           $password = $_POST["password"];
        
           require_once "database.php";
           $sql = "SELECT * FROM Users WHERE email = '$email'";
           $result = mysqli_query($conn, $sql);
           $rowCount = mysqli_num_rows($result);


           if ($rowCount==0) {
             $sendingsql = "INSERT INTO Users (email, password,login) VALUES ('".$email."','".$password."','".$fullName."');";
    
            if ($conn->query($sendingsql) === TRUE) {
               echo "User registered successfully!";
               header("Location: index.html");
            } else {
               echo "Error: " . $sendingsql . "<br>" . $conn->error;
            }
           }
           else{
              die("User already exists!");
           }
?>