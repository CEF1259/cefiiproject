<?php
namespace cefiiproject\Controllers;

class HomeController extends Controller
{
    //montre le page index dans home, appelle par base.php
    public function index() {
    $this->render('Home/index');    
    }

    //montre le page propos dans home, appelle par base.php
    public function about() {
    $this->render('Home/propos');
    }
}



?>