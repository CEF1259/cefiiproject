<?php
//controls display for gallery
namespace cefiiproject\Controllers;

//utilise galleryModel stocke dans Models, qui contient la code pour le montre
//use cefiiproject\models\galleryModel;
use cefiiproject\Models\recipeModel;


class galleryController extends Controller
{
    //montre le page gallery dans recipes, appelle par base.php
    public function gallery() {

        //instancier galleryModel comme une objet pour etre utilisé
        //$gallery = new galleryModel();
          $gallery = new recipeModel();
        //trouve tous les entrees dans la db
        $list = $gallery->findallGallery();
        //renders gallery on gallery.php, defines list from galleryModel
        $this->render("gallery/gallery",['list'=>$list]);
    }
}

?>