<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Beewalk : List of users</title>
</head>
<body>
<div id="content"></div>
</body>
<script
src="https://code.jquery.com/jquery-3.3.1.min.js"
integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="
crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/js-cookie@2/src/js.cookie.min.js"></script>
<script>
$(document).ready(function(){
  <?php if(isset($_COOKIE["users"])){
    ?>$('#content').html(Cookies.get('users'));
  <?php } else{ ?>
 $.ajax({
   url: 'https://reqres.in/api/users?page=1&per_page=6',
   method: 'get',
   dataType: 'json',
   success: function(request){

  Cookies.set('users',request );
$('#content').append('ajax');
}
})
<?php } ?>
} ) ;

</script>
</html>
