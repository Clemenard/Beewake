<?php require_once('inc/init.php');

if(isset($_GET['id']) && isset($_GET['action']) && $_GET['action']=='delete'){
$setUser->deleteUser($_GET['id']);
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
<a class="btn btn-success" href="inc/form.php">S'inscrire</a>
<?php 
$users = $setUser->getAllUsers();

/* ?><pre><?
  var_dump($user);
?></pre> */
?> <h2>Users from Beewake</h2><?php
foreach($users as $user){ ?>
<div class="row" class="user">
<img class="col-4" src="<?php echo $user->getAvatar(); ?>" alt="Card image cap">
 <div class="col-8">
 <h5 class="card-title"><?= strtoupper($user->getFirst_name()).' '.strtoupper($user->getLast_name()) ?></h5>
  <p class="card-text"><?= $user->getEmail() ?></p>
  <a class="btn btn-success" href="inc/form.php?id=<?= $user->getId() ?>">Edit profil</a>
  <a class="btn btn-success" href="?action=delete&id=<?= $user->getId() ?>">Delete profil</a>
  </div>
  </div>
  <hr />
<?php } ?>
<div id="content"></div>
</div>
</body>

<script
src="https://code.jquery.com/jquery-3.3.1.min.js"
integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="
crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/js-cookie@2/src/js.cookie.min.js"></script>
<script src="js/User.js"></script>
<script src="js/index.js"></script>
</html>
