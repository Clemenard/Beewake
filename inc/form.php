<?php
require_once('init.php');
if(isset($_POST['first_name'])){
    
    if(isset($_GET['action']) && $_GET['action']=='edit'){ 
        $setUser->updateUser($_GET['id'],$_POST);

    }
    else{
        $setUser->addUser($_POST);
    }
    header('Location: ../index.php');
  exit();
}
if(isset($_GET['id'])){
    $user=$setUser->getUser($_GET['id']);

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
    <form action="<?php if(isset($_GET['id'])){echo "?action=edit&id=".$_GET['id'];}  ?>" method="post" class="form-group">
        <label for="">Prénom</label>
        <input type="text" name="first_name" class="form-control" value="<?php if(isset($_GET['id'])){echo $user->getFirst_name();}  ?>">
        <label for="">Nom</label>
        <input type="text" name="last_name" class="form-control" value="<?php if(isset($_GET['id'])){echo $user->getLast_name();}  ?>">
        <label for="">Email</label>
        <input type="text" name="email" class="form-control" value="<?php if(isset($_GET['id'])){echo $user->getEmail();}  ?>">
        <label for="">Lien vers l'avatar</label>
        <input type="text" name="avatar" class="form-control" value="<?php if(isset($_GET['id'])){echo $user->getAvatar();}  ?>">
        <input type="submit" value="Sign in">
    </form>    
    
</body>
</html>