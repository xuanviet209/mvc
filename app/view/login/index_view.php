<?php if(!defined('ROOT_PATH')) { exit('can not access');} ?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="public/css/bootstrap.min.css">
    <style>
        body {
            background: linear-gradient(to right, #b92b27, #1565c0);
        }
    </style>
    <title>login</title>
</head>
<body>
<div class="container">
    <div class="row">
        <div class="col-12 col-sm-12 col-md-6 offset-md-3 col-lg-6 offset-lg-3 col-xl-6 offset-xl-3" >
            <h1 class ="text-center my-3">Login User</h1>
            <form action="index.php?c=login&m=handle" method="post" class="p-3 border">
                <div class="form-group">
                    <labe>User</labe>
                    <input type="text" class="form-control" name="username"/>
                </div>
                <div class="form-group">
                    <labe>Pass</labe>
                    <input type="password" class="form-control" name="password"/>
                </div>
                <button name="btnLogin" type="submit" class="btn btn-primary mt-2">login</button>
            </form>
        </div>
    </div>
</div>
</body>
</html>