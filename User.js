class User {
  constructor(email,first_name,last_name,avatar,id=null) {
    this.setEmail(email)
    this.setFirst_name(first_name)
    this.setLast_name(last_name)
  this.setAvatar(avatar)
  this.setId(id)

  return this
  }
  setEmail(email){this.email=email}
  getEmail(){return this.email}

  setFirst_name(first_name){this.first_name=first_name}
  getFirst_name(){return this.first_name}

  setLast_name(last_name){this.last_name=last_name}
  getLast_name(){return this.last_name}

  setAvatar(avatar){this.avatar=avatar}
  getAvatar(){return this.avatar}

  setId(id){this.id=id}
  getId(){return this.id}

getUser(id,users){
  for(var user of users){

if(user.id==id){ return user}
}
return false
}


   addUser(users){
     if(this.getId()==null){
     var idmax = 0
     for(var user of users){
       if(user.id>idmax){
         idmax=user.id
       }

     }
     this.setId(idmax+1)
   }
users.push(this);
return users;
  }

  deleteUser(id,users){
    var i=0
    var oldUser = this.getUser(id,request.data)
    if(oldUser) {

    for(var user of users){
if(user.id==oldUser.id){
  users.splice(i,1)
  break
}
i++
  }

}
else{ return false}
}

updateUser(id,array,users){
  var changeUser = this.getUser(id,request.data)
  if(changeUser) {
  var keys = Object.keys(array)
for(var key of keys){
switch (key){
case "first_name": changeUser.setFirst_name(array.first_name);break
case "last_name": changeUser.setLast_name(array.last_name);break
case "email": changeUser.setEmail(array.email);break
case "avatar": changeUser.setAvatar(array.avatar);break
default : break;
}
}
changeUser.deleteUser(id,users)
changeUser.addUser(users)
}
else { return false;}
}

}
