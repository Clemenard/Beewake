$(document).ready(function(){

   if(!Cookies.get('users')){
     $.ajax({
       url: 'https://reqres.in/api/users?page=1&per_page=6',
       method: 'get',
       dataType: 'json',
       success: function(request){
         Cookies.set('users',request);
         document.location.href="index.php";
       }
     });
   }

  //Create User objects with the data

  request = Cookies.getJSON('users');
  var users=[]
  for(user of request.data){
    userObject = new User(user.email,user.first_name,user.last_name,user.avatar,user.id);
    userObject.addUser(users)
  }
  request.data = users

//Create User objects with the data

  var users=[]
  for(user of request.data){
    userObject = new User(user.email,user.first_name,user.last_name,user.avatar,user.id);
    userObject.addUser(users)
  }
  request.data = users

// Adding a new user

  var newUser= new User("contact@clement-menard.fr","Clément","Menard","https://scontent-cdg2-1.xx.fbcdn.net/v/t1.0-9/10172624_10152106710023106_8746587590316635122_n.jpg?_nc_cat=110&_nc_oc=AQlCD8vEu12rYftxm6T17gITt5coh6n979GNTSJqBUlbq0ktXEJmNsqHRul_Wp2sDxc&_nc_ht=scontent-cdg2-1.xx&oh=3e3d56bc6e6e1e58335afd328cb58b00&oe=5DB25AF1");
  newUser.addUser(request.data)

//Delete an user

  userObject.deleteUser(3,request.data)

//Update an user

  var changes = {"email":"clement.menard.13@gmail.com"}
  userObject.updateUser(7,changes,request.data)


  Cookies.set('users',request);


// Html/Css layout
  var content = '<h2>Users from partners</h2>'
  for(user of request.data){
    content +='<div class="row" class="user">'
    content +=  '<img class="col-4" src="' + user.getAvatar() + '" alt="Card image cap">'
    content +=  '<div class="col-8">'
    content +=    '<h5 class="card-title">' + user.getFirst_name().toUpperCase() + ' '+ user.getLast_name().toUpperCase() +'</h5>'
    content +=    '<p class="card-text">'+ user.getEmail() +'</p>'
    content +=  '</div>'
    content +='</div>'
    content+='<hr />'
  }
 $('#content').html(content);

})
