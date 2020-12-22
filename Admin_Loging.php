<!DOCTYPE html>
<?php session_start(); ?>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Document</title>
    <link rel="stylesheet" href="node_modules/bootstrap/dist/css/bootstrap.min.css" />
    <link href="https://fonts.googleapis.com/css2?family=Kanit:wght@300&display=swap" rel="stylesheet" />
</head>
<style>
* {
    font-family: "Kanit", sans-serif;
}

body {
    height: 100vh;
    background-color: blue;
}
</style>

<body class="d-flex justify-content-center align-items-center">
    <div class="card show-lg">
        <div class="card-header font-weight-bold font-italic text-center bg-primary">
            Loging Carental Admin
        </div>
        <div class="card-body">
            <form action="Admin_Log.php" method="POST">
                <div class="form-group d-flex justify-content-center flex-column align-items-center">
                    <label for="Username">Username</label>
                    <input type="text" class="form-control" />
                    <label for="Username">Passowrd</label>
                    <input type="password" class="form-control" />
                    <input type="submit" value="Login" class="btn btn-success m-3" />
                </div>
            </form>
        </div>
    </div>
</body>

</html>