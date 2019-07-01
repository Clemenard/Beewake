$(document).ready(function(){
   if(Cookies.get('users'))
   {}
   else{
 $.ajax({
   url: 'https://reqres.in/api/users?page=1&per_page=6',
   method: 'get',
   dataType: 'json',
   success: function(request){

  Cookies.set('users',request);
}
});
 };
users = Cookies.getJSON('users');

 var content ='<table class="table table-dark table-striped">'
  content +='<tr>'
 var keys = Object.keys(users.data[0])
for(  key of keys ) {
  content +='<th scope="col">'+ key +'</th>';
 }
  content +='</tr>'
  for( var user of users.data ) {
  content +='<tr>'
     for( key in user) {
       if(key == 'avatar'){
        content +=  '<td><img src="' + user[key] + '" alt="" /></td>'
       }
       else {
  content +=  '<td>' + user[key] + '</td>'
}
}
  content +='</tr>'
}
  content +='</table>'
$('#content').html(content);

} ) ;
