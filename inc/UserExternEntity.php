<?php
class UserExternEntity extends UserEntity{


   public function __construct($id,$first_name,$last_name,$email,$avatar) {

   $this->setEmail($email);
   $this->setFirst_name($first_name);
   $this->setLast_name($last_name);
   $this->setAvatar($avatar);
   $this->setId($id);

   return $this;
 }
}
?>
