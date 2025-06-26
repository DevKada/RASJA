<?php
include("db.php");

session_start();
session_destroy();
session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $conn = new mysqli("localhost", "root", "", "jobCircle");
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $email = $_POST['email'];
    $password = $_POST['password'];

    $loginquery = "SELECT * FROM admins WHERE email = '$email' AND password = '$password'";

    $loginresult = $conn->query($loginquery);

    if ($loginresult && $loginresult->num_rows > 0) {
        $row = $loginresult->fetch_assoc();

        $_SESSION['adminID'] = $row['adminID'];
        $_SESSION['email'] = $row['email'];
        $_SESSION['password'] = $row['password'];
        $_SESSION['firstName'] = $row['firstName'];
        $_SESSION['lastName'] = $row['lastName'];

        header("Location: admin.php");
        exit(); // VERY IMPORTANT
    } else {
        echo "NO USER FOUND";
    }
}
?>



<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>LOGIN</title>
    <link rel="stylesheet" href="login.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-LN+7fdVzj6u52u30Kp6M/trliBMCMKTyK833zpbD+pXdCLuTusPj697FH4R/5mcr" crossorigin="anonymous">
</head>

<body>
    <div class="container d-flex justify-content-center align-items-center">
        <div class="row">
            <div class="col">
                <div class="card bg-transparent text-center rounded-4">
                    <form method="post" action="login.php">
                        <h2 style="color: #E2E2E2;">JOB CIRCLE</h2>
                        <div class="input-field my-3">
                            <input type="text" id="email" name="email" required>
                            <label>Enter your email</label>
                        </div>

                        <div class="input-field my-3">
                            <input type="password" id="password" name="password" required>
                            <label>Enter your password</label>
                        </div>

                        <div class="my-2" style="color: #E2E2E2;">
                            <input type="checkbox" id="show-password" onclick="togglePassword()">
                            <label for="show-password">Show Password</label>
                        </div>

                        <div class="mt-5 text-center">
                            <button class="rounded-4" type="submit">Log In</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script>
        function togglePassword() {
            const passwordField = document.getElementById("password");
            passwordField.type = passwordField.type === "password" ? "text" : "password";
        }
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/js/bootstrap.bundle.min.js" integrity="sha384-ndDqU0Gzau9qJ1lfW4pNLlhNTkCfHzAVBReH9diLvGRem5+R9g2FzA8ZGN954O5Q" crossorigin="anonymous"></script>
</body>

</html>