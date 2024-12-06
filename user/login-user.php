<?php
include_once "../includes/Database.php";
include_once "../user/User.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    try {
        $user = new User(); //Creat User-object

        if (isset($_POST["login"])) {
            $loginCorrect = $user->login($_POST["username"], $_POST["password"]);

            if ($loginCorrect) {
                header("Location: ../user/dashboard-user.php"); //Send user to it's Dashboard
            } else {
                header("Location: ../user/login-user.php"); 
            }
            exit();
        }
    } catch (Exception $error) {
        echo "Error login-user:" . $error;
    }
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
</head>

<body>
    
    <center>
        <h1>Loginpage!</h1>
        <form action="" method="post">
            Username: <input type="text" name="username">
            Password: <input type="text" name="password">
            <button type="submit" name="login">Login</button>
        </form>
    </center>
</body>

</html>