<?php
spl_autoload_register(function($class){
  include 'class_php/' . strtolower($class).'.class.php';
});
