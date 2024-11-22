<?php

namespace cefiiproject\Controllers;

abstract class Controller
{
    //render method for output from view folder
    public function render(string $path, array $data = []) {

    //extracts data in variable form
    extract($data);

    //creates a buffer
    ob_start();

    //creates a path
    include dirname(__DIR__) . '/Views/' . $path . ".php";
   

    //clears buffer from $content
    $content = ob_get_clean();

    //creates template
    include dirname(__DIR__).'/Views/base.php';
    }
}

?>