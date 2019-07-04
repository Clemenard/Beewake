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

?>