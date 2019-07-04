<?php

$db  = new PDO(
  'mysql:host=localhost;dbname=beewake',
  'root',
  'root',
  array(
    PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING,
    PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8',
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
  )
);
require_once('inc/UserModel.php');
require_once('inc/UserEntity.php');
$setUser=new UserModel($db);
$users = $setUser->getAllUsers();
session_start();

if(!isset($_SESSION['error'])){ $_SESSION['error']=null;}
if(!isset($_SESSION['users'])){
    $url = 'https://reqres.in/api/users?page=1&per_page=6';
$json = file_get_contents($url);
$_SESSION['users'] = json_decode($json, true);
/* foreach($_SESSION['users']['data'] as $guestUser){
   
    $guestUser=new UserEntity(NULL,$guestUser['first_name'],$guestUser['last_name'],$guestUser['email'],$guestUser['avatar']);
    var_dump($guestUser);?> <br><?php

    } */
}
   



?>