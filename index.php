<?php require_once('inc/init.php');

if(isset($_GET['action'])) {
if(isset($_GET['id']) && $_GET['action']=='delete') {
$setUser->deleteUser($_GET['id']);
}
if(isset($_GET['action']) && $_GET['action']=='login'){
  $myUser=$setUser->getUserbyMail($_POST['email']);
  if (is_a ($myUser,'UserEntity')){
  $_SESSION['user']=$myUser;}
  else {$_SESSION['error']='Erreur de connexion';}
  header('Location: index.php');
  exit();
  }

  if(isset($_GET['action']) && $_GET['action']=='logout'){
    session_destroy();
    header('Location: index.php');
  exit();
    }

    
  }
?>
<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/style.css">
  <title>Beewake : List of users</title>
</head>

<body>
  <div class="container">
    <header class="navbar">
      <div><a class="btn btn-success" href="form.php">Create an account</a></div>
      <div>
        <? if(isset($_SESSION['user'])){
          ?>
          <p>Bienvenue <?= $_SESSION['user']->getFirst_Name() ?> !</p>
          <p><a class="btn btn-success" href="?action=logout">Log out</a></p>
       <?php } else { ?>
      <form action="?action=login" method="post">
        <label for="">Email</label>
        <input type="text" name="email">
        <input type="submit" class="btn btn-success" value="Sign in" >
       </form> <?php } ?></div>
      <div></div>
    </header>
       <?php if(!is_null($_SESSION['error'])){ ?><div class="alert alert-danger"><?php echo $_SESSION['error'];$_SESSION['error']=null; ?></div> <?php } ?>


<?php 


/* ?><pre><?
  var_dump($user);
?></pre> */
?> <h2>Users from Beewake</h2><?php
if($users){
  
foreach($users as $user){ ?>
<div class="row" class="user">
<img class="col-4" src="<?php echo $user->getAvatar(); ?>" alt="Card image cap">
 <div class="col-8">
 <h5 class="card-title"><?= strtoupper($user->getFirst_name()).' '.strtoupper($user->getLast_name()) ?></h5>
  <p class="card-text"><?= $user->getEmail() ?></p>
  <a class="btn btn-success" href="form.php?id=<?= $user->getId() ?>">Edit profil</a>
  <a class="btn btn-success" href="?action=delete&id=<?= $user->getId() ?>">Delete profil</a>
  </div>
  </div>
  <hr />
<?php


} }

?> <h2>Users from partners</h2>
foreach($_SESSION['users']['data'] as $guestUser){

    if(!$setUser->getUserByMail($guestUser['email'] ) ) {
      ?>
      <div class="row" class="user">
      <img class="col-4" src="<?php echo $guestUser['avatar']; ?>" alt="Card image cap">
       <div class="col-8">
       <h5 class="card-title"><?= strtoupper($guestUser['first_name']).' '.strtoupper($guestUser['last_name']) ?></h5>
        <p class="card-text"><?= $guestUser['email'] ?></p>
        </div>
        </div>
        <hr />
   <?php } 
 } ?>

</div>
</body>

<script
src="https://code.jquery.com/jquery-3.3.1.min.js"
integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="
crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/js-cookie@2/src/js.cookie.min.js"></script>
<script src="js/User.js"></script>
<!-- <script src="js/index.js"></script> -->
</html>
