 <?php
 abstract class UserEntity{
     protected $email,$first_name,$last_name,$avatar;

  public function getEmail(){return $this->email;}
  public function getFirst_name(){return $this->first_name;}
  public function getLast_name(){return $this->last_name;}
  public function getAvatar(){return $this->avatar;}

  public function setEmail($email){$this->email = $email;}
  public function setFirst_name($first_name){$this->first_name=$first_name;}
  public function setLast_name($last_name){$this->last_name=$last_name;}
  public function setAvatar($avatar){$this->avatar=$avatar;}
 }
 ?>
