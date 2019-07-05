<?php require_once('inc/init.php');

if(isset($_GET['action'])) {

  // Delete an user from the database
  if(isset($_GET['id']) && $_GET['action']=='delete') {
    $setUser->deleteUser($_GET['id']);
  }

  // Login with email, test first internal, then external
  if(isset($_GET['action']) && $_GET['action']=='login'){
    $myUser=$setUser->getUserbyMail($_POST['email']);
    if (is_a ($myUser,'UserEntity')){
      $_SESSION['user']=$myUser;
      header('Location: index.php');
      exit();
    }
    else {
      unset($_SESSION['users']);
      $url = 'https://reqres.in/api/users?page=1&per_page=6';
  $json = file_get_contents($url);
  $arrayJson = json_decode($json, true);
    // var_dump($arrayJson);
   foreach($arrayJson['data'] as $guestUser){

      $guestUser=new UserExternEntity($guestUser['first_name'],$guestUser['last_name'],$guestUser['email'],$guestUser['avatar']);
      if($guestUser->getEmail()==$_POST['email']){$_SESSION['user']=$guestUser;}
      $_SESSION['users'][]=$guestUser;

      }
      if(isset($_SESSION['user'])){
      header('Location: index.php');
      exit();
}
          else{
            $_SESSION['error']='Erreur de connexion';

          }
        }
    }

//Log out
  if($_GET['action']=='logout'){
    unset($_SESSION['user']);
    header('Location: index.php');
  exit();
    }

    if(isset($_GET['id']) && $_GET['action']=='update'){
      unset($_SESSION['users']);
      $url = 'https://reqres.in/api/users?page=1&per_page=6';
  $json = file_get_contents($url);
  $arrayJson = json_decode($json, true);

   foreach($arrayJson['data'] as $guestUser){
if($guestUser['email']==$setUser->getUser($_GET['id'])->getEmail()) {
  unset($guestUser['id']);
  $setUser->updateUser($_GET['id'],$guestUser);
}
      $guestUser=new UserExternEntity($guestUser['first_name'],$guestUser['last_name'],$guestUser['email'],$guestUser['avatar']);
      $_SESSION['users'][]=$guestUser;

      }

      header('Location: index.php');
    exit();
      }

  }
  ?><pre><?
  // var_dump($_SESSION['users']);
?></pre>
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
          <p>Bienvenue <?= $_SESSION['user']->getFirst_Name() ?> !</p><?
        ?>
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
  <?php if(getUserByEmail($_SESSION['users'],$user->getEmail()) != false ){  ?>
    <a class="btn btn-success" href="?action=update&id=<?= $user->getId() ?>">Sync profil</a>
  <?php } ?>
  </div>
  </div>
  <hr />
<?php


} }

?> <h2>Users from partners</h2><?php
foreach($_SESSION['users'] as $guestUser){

    if(!$setUser->getUserByMail($guestUser->getEmail() ) ) {
      ?>
      <div class="row" class="user">
      <img class="col-4" src="<?= $guestUser->getAvatar() ?>" alt="Card image cap">
       <div class="col-8">
       <h5 class="card-title"><?= strtoupper($guestUser->getFirst_Name()).' '.strtoupper($guestUser->getLast_name()) ?></h5>
        <p class="card-text"><?= $guestUser->getEmail() ?></p>
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
