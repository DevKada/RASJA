<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link rel="stylesheet" href="login.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-LN+7fdVzj6u52u30Kp6M/trliBMCMKTyK833zpbD+pXdCLuTusPj697FH4R/5mcr" crossorigin="anonymous">
</head>

<body>
    <div class="container d-flex justify-content-center align-items-center">
        <div class="row">
            <div class="col">
                <div class="card bg-transparent text-center rounded-4">
                    <form action="#">
                        <h2 style="color: #E2E2E2;">Login Form</h2>
                        <div class="input-field">
                            <input type="text" required>
                            <label>Enter your email</label>
                        </div>
                        <div class="input-field">
                            <input type="password" required>
                            <label>Enter your password</label>
                        </div>
                        <div class="forget">
                            <label for="remember">
                                <input type="checkbox" id="remember">
                                <p class="mt-3">Remember me</p>
                            </label>
                            <a href="#">Forgot password?</a>
                        </div>
                        <button class="rounded-4" type="submit">Log In</button>
                        <div class="register">
                            <p>Don't have an account? <a href="#">Register</a></p>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/js/bootstrap.bundle.min.js" integrity="sha384-ndDqU0Gzau9qJ1lfW4pNLlhNTkCfHzAVBReH9diLvGRem5+R9g2FzA8ZGN954O5Q" crossorigin="anonymous"></script>
</body>

</html>