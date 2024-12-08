<?php
use cefiiproject\autoloader;
use cefiiproject\Core\router;

  //Troubleshooting code, gives error messages
  ini_set('display_errors', 1); 
  ini_set('display_startup_errors', 1); 
  error_reporting(E_ALL);
  //End Troubleshooting

//this is the main index file. It is what the user sees and loads content from Base


//starts session
session_start();
//var_dump($_SESSION);

include '../autoloader.php';
autoloader::register();

$route = new Router();

$route->routes();
?>

