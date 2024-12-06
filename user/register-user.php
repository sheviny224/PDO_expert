<?php
include_once "../user/User.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    try {
        $user = new User(); 

        if (isset($_POST["register"])) {
            $user->register($_POST["username"], $_POST["password"]);
            header("Location: ../user/login-user.php");
            exit();
        }
    } catch (Exception $error) {
        echo "Error register-user:" . $error;
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
</head>

<body>
    <center>
        <form action="" method="post">
            Username: <input type="text" name="username">
            Password: <input type="text" name="password">
            <button type="submit" name="register">Register</button>
        </form>
    </center>
</body>

</html>