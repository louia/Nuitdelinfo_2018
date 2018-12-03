<?php
require_once('autoload.include.php') ;

class User{
 private  $id;
 private  $firstName;
 private  $lastName;
 private  $login;
 private  $phone;
 const session_key = "__user__";


 private function __construct(){

 }

 public function firstName() {
   return $this->firstName;
 }

public function profile(){
  $profile = "Nom : {$this->firstName} \n";
  $profile.= "Prénom : {$this->lastName} \n";
  $profile.= "Login : {$this->login} \n";
  $profile.= "Téléphone : {$this->phone} \n";
  return $profile;
}

public static function loginForm($action,$submitText = 'OK'){
  $form = <<<FORM
  <div class="login-page">
  <div class="form">
  <form action="{$action}" method="get" class="login-form">
    <input type="text" name="login" placeholder="Username" autocomplete="username"/>
    <input type="password" name="pass" placeholder="Password" autocomplete="current-password"/>
    <br/>
    <button type="submit">{$submitText}</button>
  </form>
  </div>
  </div>
FORM;
return $form;
}

public static function logoutForm($action,$text){
  $form = <<<FORM
  <form action="{$action}" method="get">
    <button name="logout" type="submit">{$text}</button>
  </form>
FORM;
return $form;
}

public static function createFromAuth(array $data){
  $hash = hash("sha512",$data['pass']);
  $stmt=myPDO::getInstance()->prepare(<<<SQL
    SELECT lastName,
           firstName,
           login,
           phone
    FROM user
    WHERE login = :login
    AND sha512pass = :pass
    ;
SQL
  ) ;

 $stmt->bindValue(':login',$data['login']);
 $stmt->bindValue(':pass',$hash);
  $stmt->setFetchMode(PDO::FETCH_CLASS, 'User');
  $stmt->execute();
  $user = $stmt->fetch();

  if($stmt->rowCount()==0){
    throw new AuthenticationException();
  }
  else{
    Session::start();
    $_SESSION['connected'] = true;
    return $user;
  }
}

public static function isConnected(){
  return $_SESSION['connected'];
}

public static function logoutIfRequested(){
  if(isset($_GET['logout'])){
    session_destroy();
  }
}

public function saveIntoSession(){
  $_SESSION['self::session_key']=$this;
}

public static function createFromSession(){
  if (isset($_SESSION['self::session_key']) && is_a($_SESSION['self::session_key'],'User')) {
    return $_SESSION['self::session_key'];
  }
  else {
    throw new Exception("Nest pas dans la Session");

  }
}
}
