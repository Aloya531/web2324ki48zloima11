<!DOCTYPE html>
<html lang="en">

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
               header("Location: index.html");
            } else {
               echo "Error: " . $sql . "<br>" . $con->error;
    }
?>

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