<?php
session_start();
?>
<?php
        if (isset($_POST["submit"])) {
            $hostName = "localhost";
$dbUser = "id21932739_mykola";
$dbPassword = "12344321Ad/";
$dbName = "id21932739_literalnestbd";
$conn = mysqli_connect($hostName, $dbUser, $dbPassword, $dbName);
if (!$conn) {
    die("Something went wrong;");
}

            $email = $_POST["email"];
            $password = $_POST["password"];

 $selectsql = "SELECT * FROM Users WHERE email = '$email'";

            $result2 = mysqli_query($conn, $selectsql);
    
            $user = mysqli_fetch_array($result2, MYSQLI_ASSOC);

           if ($user) {

                if ($password== $user["password"]) {
                    $_SESSION["user"] = $user;
                    echo ("User login success");
                    header("Location: index.html");
                    die();
                }else{
                    echo "Password does not match";
                }
            }else{
                echo "Email does not match";
            }
        }
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login page</title>
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    <!-- JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2"
        crossorigin="anonymous"></script>
    <script src="https://accounts.google.com/gsi/client" async></script>
</head>

<body>

    <section>
        <h1 style="text-align: center;margin: 50px 0;">Login</h1>
        <div class="container">
            <form action="login.php" method="post">
               <div class="row">
                    <div class="form-group col-lg-4">
                        <label for="">Email</label>
                        <input type="text" name="email" id="email" class="form-control" required>
                    </div>
                    <div class="form-group col-lg-3">
                        <label for="">Password</label>
                        <input type="text" name="password" id="password" class="form-control" required>
                    </div>
                    <div class="form-group col-lg-2" style="display: grid;align-items:  flex-end;">
                        <input type="submit" name="submit" id="submit" class="btn btn-primary">
                    </div>
               </div>
            </form>
            <!-- Sign In With Google button with HTML data attributes API -->
<div id="g_id_onload"
    data-client_id="789506856517-46k64psq0v03ri2i4tqj0c0e1op9gi28.apps.googleusercontent.com"
    data-context="signin"
    data-ux_mode="popup"
    data-callback="handleCredentialResponse"
    data-auto_prompt="false">
</div>

<div class="g_id_signin"
    data-type="standard"
    data-shape="rectangular"
    data-theme="outline"
    data-text="signin_with"
    data-size="large"
    data-logo_alignment="left">
</div>
        </div>
    </section>
</body>
<script>

function parseJwt (token) {
    var base64Url = token.split('.')[1];
    var base64 = base64Url.replace(/-/g, '+').replace(/_/g, '/');
    var jsonPayload = decodeURIComponent(window.atob(base64).split('').map(function(c) {
        return '%' + ('00' + c.charCodeAt(0).toString(16)).slice(-2);
    }).join(''));

    return JSON.parse(jsonPayload);
}

async function handleCredentialResponse(response){
    const response123= parseJwt(response.credential)
    var formData = new FormData();

console.log(response123.email);
    formData.append("email",response123.email)
            var xhr = new XMLHttpRequest();
            xhr.open('Post', 'googleAuth.php', true);
            xhr.onload = function(test) {

            window.location.href = test.target.responseURL;
            };
            xhr.send(formData);
}
</script>
</html>