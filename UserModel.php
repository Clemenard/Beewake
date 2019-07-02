<?php 

function execRequest($req,$params=array()){
  global $pdo;
  $r = $pdo->prepare($req);
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

class UserModel {

  protected $db;

  public function __construct(){
    $this->db = PDOManager::getInstance()->getPDO();
  }

  public function getDb(){
    return $this->db;
  }

  public function getUser($id){ 
$query = $pdo->execRequest("SELECT * FROM beewake  WHERE id_user= :id ",array('id'=> $id));
if( $query->rowCount() == 1 ){
$user=$query->fetch();
return $user;
}
else {
    return false;
}
  }

  public function getAllUsers(){ 
    $query = $pdo->execRequest("SELECT * FROM beewake");
    if( $query->rowCount() > 0 ){
    $q->setFetchMode(PDO::FETCH_CLASS,'User');
    $users=$query->fetchAll();
    return $users;
    }
    else {
        return false;
    }
      }

  public function addUser($infos){
    $q=$this->execRequest('INSERT INTO user ('.implode(',', array_keys($infos)).') VALUES (:'.implode(', :', array_keys($infos)).')',$infos);
    return $this->getDb()->lastInsertId();
  }

  public function deleteUser($id){
    $query = $pdo->execRequest("DELETE FROM user WHERE id_user=:id",array('id' => $id));
  }

  public function updateUser($id,$infos){
    foreach($infos as $key=>$values){
      $newValues[]="$key = :$key";
    }
  $infos['id']=$id;
    $q=$this->execRequest('UPDATE user SET '.implode(',',$newValues) .' WHERE id_user = :id',$infos);
  }
  }
  ?>