 <?php
  echo 1;
   
           $fullName = $_POST["name"];
           $email = $_POST["email"];
           $password = $_POST["password"];
           echo 1;
           require_once "lab_dbinitializer.php";
           $sql = "SELECT * FROM zloi WHERE email = '$email'";
           $result = mysqli_query($con, $sql);
           $rowCount = mysqli_num_rows($result);
    echo 2;
           if ($rowCount==0) {
            echo "Hello Test";
           }
           else{
              echo "Hello Name";
           }

            $sql = "INSERT INTO zloi (email, password,login) VALUES ('".$email."','".$password."','".$fullName."');";
            $stmt = mysqli_stmt_init($con);
            $prepareStmt = mysqli_stmt_prepare($stmt,$sql); 
            if ($con->query($sql) === TRUE) {
               echo "User registered successfully!";
               header("Location: default.php");
            } else {
               echo "Error: " . $sql . "<br>" . $con->error;
    }
?>