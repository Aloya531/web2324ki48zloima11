<?php
  if (isset($_POST["submit"])) {
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
                header("Location: https://literalnest.000webhostapp.com/");
                exit();
            } else {
               echo "Error: " . $sendingsql . "<br>" . $conn->error;
            }
           }
           else{
              die("User already exists!");
           }
       }
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register page</title>
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    <!-- JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2"
        crossorigin="anonymous"></script>
</head>

<body>
    <section>
        <h1 style="text-align: center;margin: 50px 0;">Registration</h1>
        <div class="container">
            <form action="registration.php" method="post">
               <div class="row">
                    <div class="form-group col-lg-4">
                        <label for="">Email</label>
                        <input type="text" name="email" id="email" class="form-control" required>
                    </div>
                    <div class="form-group col-lg-3">
                        <label for="">Password</label>
                        <input type="text" name="password" id="password" class="form-control" required>
                    </div>
                    <div class="form-group col-lg-3">
                        <label for="">Name</label>
                        <input type="text" name="name" id="name" class="form-control" required>
                    </div>
                           <div class="form-group col-lg-2" style="display: grid;align-items:  flex-end;">
                        <input type="submit" name="submit" id="submit" class="btn btn-primary">
                    </div>

               </div>
            </form>
        </div>
    </section>
</body>

</html>