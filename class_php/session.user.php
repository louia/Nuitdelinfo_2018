<?php
require_once('autoload.include.php') ;
/**
 *
 */
class Session
{
    public static function start(){
      if (headers_sent()==TRUE ||session_status()==PHP_SESSION_DISABLED) {
        throw new Exception("Impossible de démarrer une session");
      }
      else if(session_status()==PHP_SESSION_NONE) {
        session_start();
      }
    }

}



 ?>
