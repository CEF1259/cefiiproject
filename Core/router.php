<?php
namespace cefiiproject\Core;

class Router 
{
    public function routes()
    {
        //If statement that checks if the controller is declared and not empty. 
        // gets new array (if true), default is home (false event)
        $controller = (isset($_GET['controller'])? ucfirst(array_shift($_GET)):'Home');
        $controller = '\\cefiiproject\Controllers\\'.$controller.'Controller';
    
        //if statement that gets if action is declared and not empty
        // gets new array (if true), default is index (if false)
        $action = (isset($_GET['action'])?array_shift($_GET):'index');
        
        //instances controller
        $controller = new $controller();

        if (method_exists($controller, $action)) {
            (isset($_GET))? call_user_func_array([$controller, $action], $_GET):$controller->$action();
        }
        else {
            http_response_code(404);
            echo "La page recherchee n'existe pas";
        }
    }
}

?>