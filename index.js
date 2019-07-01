$(document).ready(function(){
   if(!Cookies.get('users')){

     $.ajax({
       url: 'https://reqres.in/api/users?page=1&per_page=6',
       method: 'get',
       dataType: 'json',
       success: function(request){

Cookies.set('users',request);
}
});

}
request = Cookies.getJSON('users');

//Create User objects with the data
var users=[]
for(user of request.data){
  userObject = new User(user.email,user.first_name,user.last_name,user.avatar,user.id);
  userObject.addUser(users)
}
request.data = users

//Adding a new user
var newUser= new User("contact@clement-menard.fr","Clément","Menard","https://scontent-cdg2-1.xx.fbcdn.net/v/t1.0-9/10172624_10152106710023106_8746587590316635122_n.jpg?_nc_cat=110&_nc_oc=AQlCD8vEu12rYftxm6T17gITt5coh6n979GNTSJqBUlbq0ktXEJmNsqHRul_Wp2sDxc&_nc_ht=scontent-cdg2-1.xx&oh=3e3d56bc6e6e1e58335afd328cb58b00&oe=5DB25AF1");
newUser.addUser(request.data)

//Delete an user
oldUser=newUser.getUser(3,request.data)
oldUser.deleteUser(request.data)

//Update an user
changingUser = newUser.getUser(7,request.data)
changingUser.setEmail("clement.menard.13@gmail.com")
changingUser.updateUser(request.data)

// Html/Css layout
var content ='<table class="table table-dark table-striped">'
 content +='<tr>'
var keys = Object.keys(request)
for(  key of keys ) {
 content +='<th scope="col">'+ key +'</th>';
}
 content +='</tr>'
 for( var user of request.data ) {
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
