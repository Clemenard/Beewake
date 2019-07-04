<?php
require_once('init.php');
require_once('UserModel.php');
require_once('UserEntity.php');
if(isset($_POST['first_name'])){
    $setUser=new UserModel($db);
    $setUser->addUser($_POST);
    header('Location: ../index.php');
  exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/style.css">
    <title>Suscribe</title>
</head>
<body>
    <form action="" method="post" class="form-group">
        <label for="">Prénom</label>
        <input type="text" name="first_name" class="form-control">
        <label for="">Nom</label>
        <input type="text" name="last_name" class="form-control">
        <label for="">Email</label>
        <input type="text" name="email" class="form-control">
        <label for="">Lien vers l'avatar</label>
        <input type="text" name="avatar" class="form-control">
        <input type="submit" value="Sign in">
    </form>    
    
</body>
</html>