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

  deleteUser(users){
    var i=0
    for(var user of users){
if(user.id==this.id){
  users.splice(i,1)
  break
}
i++
  }
  return users
}

updateUser(users){
this.deleteUser(users)
this.addUser(users)
return users
}

}
