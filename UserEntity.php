 <?php 
 class UserEntity{
     protected $id,$email,$first_name,$last_name,$avatar;

  public function constructor($email,$first_name,$last_name,$avatar,$id=null) {
    $this->setEmail($email);
    $this->setFirst_name($first_name);
    $this->setLast_name($last_name);
    $this->setAvatar($avatar);
    $this->setId($id);
    return $this;
  }

  public function setEmail($email){$this->email = $email;}
  public function getEmail(){return $this->email;}
  public function setFirst_name($first_name){$this->first_name=$first_name;}
  public function getFirst_name(){return $this->first_name;}
  public function setLast_name($last_name){$this->last_name=$last_name;}
  public function getLast_name(){return $this->last_name;}
  public function setAvatar($avatar){$this->avatar=$avatar;}
  public function getAvatar(){return $this->avatar;}
  public function setId($id){$this->id=$id;}
  public function getId(){return $this->id;}
 }
 ?>