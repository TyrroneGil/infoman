<?php 
require_once __DIR__ . '/vendor/autoload.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
</head>
<body>
    <div class="container my-4">
    <form action="saveuser.php" method="POST">
    <label for="">Username: </label>
    <input type="text" class="form-control" name="username">
   <label for="">Email: </label>
    <input type="text" class="form-control" name="email">
    <label for="">Birthday: </label>
    <input type="text" class="form-control" name="birth">
    <label for="">Age: </label>
    <input type="text" class="form-control" name="age">  
    <label for="">Proffesion: </label>
    <input type="text" class="form-control" name="proff">
    <label for="">Password: </label>
    <input type="password" class="form-control" name="password">
    <button type="submit" class="btn btn-primary my-4">Sign up</button>
</form>
</div>
</body>
</html>