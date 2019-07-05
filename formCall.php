<?php
require_once('inc/init.php');
unset($_SESSION['users']);
$url = 'https://reqres.in/api/users?page=1&per_page=6';
$json = file_get_contents($url);
$arrayJson = json_decode($json, true);
$result=false;
foreach($arrayJson['data'] as $guestUser){

if($guestUser['email']==$_GET['email']){$result=$guestUser;}
$guestUser=new UserExternEntity($guestUser['first_name'],$guestUser['last_name'],$guestUser['email'],$guestUser['avatar']);
$_SESSION['users'][]=$guestUser;

}
echo json_encode($result);




?>
