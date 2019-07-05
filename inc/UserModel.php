<?php
class UserModel {

  protected $db;

public function __construct($db){$this->setDb($db);}

public function setDb(PDO $db)
{
$this->db = $db;}

public function getDb()
{
return $this->db;}

  function execRequest($req,$params=array()){
    $r = $this->db->prepare($req);
    if ( !empty($params) ){
      // sanatize et bindvalue
      foreach($params as $key => $value){
        $params[$key] = htmlspecialchars($value,ENT_QUOTES);
        $r->bindValue($key,$params[$key],PDO::PARAM_STR);
      }
    }
    $r->execute();
    if ( !empty( $r->errorInfo()[2] )){
      die('Request failed - please contact the administrator');
    }
    return $r;
  }

  public function getUser($id){
$query = $this->execRequest("SELECT * FROM users  WHERE id_users= :id ",array('id'=> $id));
if( $query->rowCount() == 1 ){
  $query->setFetchMode(PDO::FETCH_CLASS,'UserInternEntity');
$user=$query->fetch();
return $user;
}
else {
    return false;
}
  }

  public function getUserByMail($email){
    $query = $this->execRequest("SELECT * FROM users  WHERE email= :email ",array('email'=> $email));
    if( $query->rowCount() == 1 ){
      $query->setFetchMode(PDO::FETCH_CLASS,'UserInternEntity');
    $user=$query->fetch();
    return $user;
    }
    else {
        return false;
    }
      }

  public function getAllUsers(){
    $query = $this->execRequest("SELECT * FROM users");
    if( $query->rowCount() > 0 ){
    $users=$query->fetchAll(PDO::FETCH_CLASS,'UserInternEntity');
    return $users;
    }
    else {
        return false;
    }
      }

  public function addUser($infos){
    $this->execRequest('INSERT INTO users ('.implode(',', array_keys($infos)).') VALUES (:'.implode(', :', array_keys($infos)).')',$infos);
    return $this->getDb()->lastInsertId();
  }

  public function deleteUser($id){
     $this->execRequest("DELETE FROM users WHERE id_users=:id",array('id' => $id));
  }

  public function updateUser($id,$infos){
    foreach($infos as $key=>$values){
      $newValues[]="$key = :$key";
    }
  $infos['id']=$id;
    $this->execRequest('UPDATE users SET '.implode(',',$newValues) .' WHERE id_users = :id',$infos);
  }
  }
  ?>
