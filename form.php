<?php
require_once('inc/init.php');
if(isset($_POST['first_name'])){

    if(isset($_GET['action']) && $_GET['action']=='edit'){
        $setUser->updateUser($_GET['id'],$_POST);

    }
    else{
        $setUser->addUser($_POST);

        if(is_a($_SESSION['user'],'UserExternEntity')) {
          $_SESSION['user']=$setUser->getUserByMail($_SESSION['user']->getEmail());
    }
    header('Location: index.php');
  exit();
}
}

if(isset($_GET['id'])){
    $user=$setUser->getUser($_GET['id']);

}
else if(isset($_GET['action']) && $_GET['action']=='insertExtern'){
  $user=$_SESSION['user'];
}
else{
  $user= new UserExternEntity('','','','');
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
        <input type="text" id='first_name' name="first_name" class="form-control" value="<?= $user->getFirst_name() ?>">
        <label for="">Nom</label>
        <input type="text" id='last_name' name="last_name" class="form-control" value="<?= $user->getLast_name() ?>"><?php
  if(isset($_SESSION['user']) && is_a($_SESSION['user'],'UserExternEntity')) {
         ?>
         <input type="hidden" id='email' name="email" class="form-control" value="<?= $user->getEmail() ?>">
       <?php }else{ ?>
        <label for="">Email</label>
        <input type="text" id='email' name="email" class="" value="<?= $user->getEmail() ?>">
        <div class="btn btn-success" id="import">Import your data</div><br>
      <?php } ?>
        <label for="">Lien vers l'avatar</label>
        <input type="text" id='avatar' name="avatar" class="form-control" value="<?= $user->getAvatar() ?>">
        <input type="submit" value="<?php if(isset($_GET['id'])){echo "Edit";}else{echo 'Sign in';}?>">
    </form>
    <script
    src="https://code.jquery.com/jquery-3.3.1.min.js"
    integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="
    crossorigin="anonymous"></script>
<script src='js/form.js'></script>
</body>
</html>
