<?php
//controls display for gallery
namespace cefiiproject\Controllers;
use cefiiproject\Core\Form;
use cefiiproject\Entities\recipeObjects;

//utilise galleryModel stocke dans Models, qui contient la code pour le montre
use cefiiproject\Models\recipeModel;

class crudController extends Controller
{
    //montre le page index dans home, appelle par base.php
    public function index() {
        $this->render('crud/index');    
        }

    ////////////////////////////////////////////////////////////////

     ///////////////Gerer les crud Controllers pour recettes///////////////////
     
    //trouver tous les recettes
    public function recipeList()
    {
        $recipes = new recipeModel();
        //$ingredients = new recipeModel();
        $list = $recipes->findAll();
        $this->render("crud/recipeList",["list"=>$list]);    
    }

    /////////////////////////////////////////////////////////

     //ajoute une recette
     public function addRecipe() 
     {
         //validee les donnees dans la formule
         if (Form::validatePost($_POST,["Recette","Ingredient","Instructions"])&&Form::validateFiles($_FILES,["picture","pictureFalc"])) 
         {
             //chemin image
             $picture = "images/".$_FILES["picture"]["name"];
             $pictureFalc = "images/".$_FILES["pictureFalc"]["name"];
             //rayon pour type
             $type = array("jpg"=> "image/jpg", "jpeg"=>"image/jpeg", "gif"=>"image/gif","png"=>"image/png");
 
             //variables pour type, taile et nom pour image du recette
             $picType = $_FILES["picture"]["type"];
             $picName = $_FILES["picture"]["name"];
             $picSize = $_FILES["picture"]["size"];

            //variables pour type, taile et nom pour image Falc
             $picTypeFalc = $_FILES["pictureFalc"]["type"];
             $picNameFalc = $_FILES["pictureFalc"]["name"];
             $picSizeFalc = $_FILES["pictureFalc"]["size"];
 
             //verifier extension fichier pour image du recette
             //recuperee extension fichier
             $ext = pathinfo($picName, PATHINFO_EXTENSION);
             if (!array_key_exists($ext,$type)) 
             {
                 echo "Le format du fichier est incorrect.";
             }
             //verifier taille de fichier, max 2mb
             $maxsize = 2*1024*1024;
             if ($picSize > $maxsize) 
             {
                 echo "La taille du fichier depasse la limite";
             }
 
             //verifier mime de fichier
             if (in_array($picType,$type))
             {
                 $uniqueName = uniqid('',true);
                 $file = $uniqueName . "." . $ext;
                 if (file_exists("images/".$file)) 
                 {
                     echo $file . "existe deja";
                 } 
                 else 
                 {
                     //upload images
                     move_uploaded_file($_FILES["picture"]["tmp_name"],"images/".$_FILES["picture"]["name"]);
                 }
             };

             //verifier image pour image falc
             $extFalc = pathinfo($picNameFalc, PATHINFO_EXTENSION);
             if (!array_key_exists($extFalc,$type)) 
             {
                 echo "Le format du fichier est incorrect.";
             }
             //verifier taille de fichier, max 2mb
             $maxsize = 2*1024*1024;
             if ($picSizeFalc > $maxsize) 
             {
                 echo "La taille du fichier depasse la limite";
             }
 
             //verifier mime de fichier
             if (in_array($picTypeFalc,$type))
             {
                 $uniqueNameFalc = uniqid('',true);
                 $fileFalc = $uniqueNameFalc . "." . $extFalc;
                 if (file_exists("images/".$fileFalc)) 
                 {
                     echo $fileFalc . "existe deja";
                 } 
                 else 
                 {
                     //upload images
                     move_uploaded_file($_FILES["pictureFalc"]["tmp_name"],"images/".$_FILES["pictureFalc"]["name"]);
                 }
             };
             $recipe = new recipeObjects();
 
             $recipe->setrecetteTitle(htmlspecialchars($_POST["Recette"],ENT_QUOTES));
             $recipe->setIngredients(htmlspecialchars($_POST["Ingredients"],ENT_QUOTES));
             $recipe->setrecetteMethode(htmlspecialchars($_POST["Instructions"],ENT_QUOTES));
             $recipe->setrecetteImage($picture);
             $recipe->setrecetteFalc($pictureFalc);
 
             $model = new recipeModel();
             $model->addRecipe($recipe);
 
             echo ("<script> window.location= 'index.php?controller=crud&action=recipeList'</script>");
         }
        $form = new Form();
        //crée la formule
        //tous fonctions en bas localisée en core/form
        //<label for='' attributes>content<label>
        //<input type='' name='' attributes>
        $form->startForm("#","POST",["enctype"=>"multipart/form-data"]);
        $form->addLabel("Recette","Nom du Recette",["class"=>"form-label"]);
        $form->addInput("text","Recette", ["id"=>"recetteTitre","class"=>"form-control","placeholder"=>"Ajouter un recette"]);
        $form->addLabel("Ingredients","Ingredients",["class"=>"form-label"]);
        $form->addTextarea("Ingredients", "Faire une liste des ingredients, leur unite de measure et leur quantité. Termine chaque entrée avec une virgule", ["id"=>"ingredients","class"=>"form-control","placeholder"=>"","rows"=>10]);
        $form->addLabel("Instructions","Instructions",["class"=>"form-label"]);
        $form->addTextarea("Instructions", "Faire les instructions pour le recette, en terminant chaque etape avec une point. Il n'y a pas besoin d'énumérer chaque etape", ["id"=>"Instructions","class"=>"form-control","placeholder"=>"","rows"=>10]);
        $form->addLabel("picture","Image du recette",["class"=>"form-label"]);
        $form->addInput("file","picture",["id"=>"picture", "class" => "form-control"]);
        $form->addLabel("pictureFalc","Image du recette accessible",["class"=>"form-label"]);
        $form->addInput("file","pictureFalc",["id"=>"pictureFalc", "class" => "form-control"]);
        $form->addInput("submit", "add", ["value"=>"Ajoute une Recette", "class" => "btn btn-primary"]);
        $form->endForm();
 
        //afficher le page
        $this->render("crud/addRecipe",['addForm'=>$form->getFormElements()]);
     }
     /////////////////////////////////////////////////////////////////

     //supprime une recette
     public function deleteRecipe($id) {
        if(isset($_POST["true"])) {
            //this deletes the entry
            $recipe = new recipeModel();
            $recipe->deleteRecipe($id);
            //this redirects to list
            header("Location:index.php?controller=crud&action=recipeList");
        } 
        elseif (isset($_POST['false'])){
            //this redirecs to list
            header("Location:index.php?controller=crud&action=recipeList");
        }
        
        else {
            //this collects the entry with find
            $recipes = new recipeModel();
            $recipe = $recipes->findRecipe($id);
        }
        //this returns to selected entry
        $this->render('crud/deleteRecipe', ["recipe"=>$recipe]);
     }

     ///////////////////////////////////////////////////////////////////

     ////////////update (editer) une recette
     public function updateRecipe($id) {

        //updates text entries
        if(Form::validatePost($_POST, ["Recette","Ingredient","Instructions"])) {
            $recipeObject = new recipeObjects();

            $recipeObject->setrecetteTitle(htmlspecialchars($_POST["Recette"],ENT_QUOTES));
            $recipeObject->setIngredients(htmlspecialchars($_POST["Ingredients"],ENT_QUOTES));
            $recipeObject->setrecetteMethode(htmlspecialchars($_POST["Instructions"],ENT_QUOTES));
            
             //si une image est televerse 
             if(Form::validateFiles($_FILES, ["picture","pictureFalc"])) {
                move_uploaded_file($_FILES["picture"]["tmp_name"],"images/".$_FILES["picture"]["name"]);
                move_uploaded_file($_FILES["pictureFalc"]["tmp_name"],"images/".$_FILES["pictureFalc"]["name"]);

            //chemin d'image
                $picture = "images/" . $_FILES["picture"]["name"];
                $pictureFalc = "images/".$_FILES["pictureFalc"]["name"];
                $recipeObject->setrecetteImage($picture);
                $recipeObject->setrecetteFalc($pictureFalc);
            }
            //s'il n'y a pas une nouvelle image, ancien est gardee
            else{
                $recipeObject->setrecetteImage($_POST["hidden"]);
            }
            $recipe = new recipeModel();
            $recipe->updateRecipe($id, $recipeObject);

            //dirige vers le liste
            header("Location:index.php?controller=crud&action=recipeList");
        }
        else{
            $error = !empty($_POST)?"Le formulaire n'a pas ete correctement rempli" :"";
        }
        $recipe = new recipeModel();
        $recipeObject = $recipe->findRecipe($id);
        $form = new Form();

        //cree la form
        //objet form est dans form.php

        $form->startForm("#","POST",["enctype"=>"multipart/form-data"]);
        $form->addLabel("Recette","Nom du Recette",["class"=>"form-label"]);
        $form->addInput("text","Recette", ["id"=>"recetteTitre","class"=>"form-control","placeholder"=>"Ajouter un recette", "value"=>$recipeObject->recetteTitle]);
        $form->addLabel("Ingredients","Ingredients",["class"=>"form-label"]);
        $form->addTextarea("Ingredients", $recipeObject->Ingredients, ["id"=>"ingredients","class"=>"form-control","placeholder"=>"","rows"=>10]);
        $form->addLabel("Instructions","Instructions",["class"=>"form-label"]);
        $form->addTextarea("Instructions",$recipeObject->recetteMethode, ["id"=>"Instructions","class"=>"form-control","placeholder"=>"","rows"=>10]);
        $form->addLabel("picture","Image du recette",["class"=>"form-label"]);
        $form->addInput("file","picture",["id"=>"picture", "class" => "form-control"]);
        $form->addInput("text", "hidden", ["id"=>"hidden", "class" => "form-control", "value"=>$recipeObject->recetteImage, "hidden"=>""]);
        $form->addLabel("picture","Image Accessible",["class"=>"form-label"]);
        $form->addInput("file","pictureFalc",["id"=>"pictureFalc", "class" => "form-control"]);
        $form->addInput("text", "hidden", ["id"=>"hidden", "class" => "form-control", "value"=>$recipeObject->recetteFalc, "hidden"=>""]);
        $form->addInput("submit", "update", ["value"=>"modifier", "class" => "btn btn-primary"]);
        $form->endForm();

        $this->render("crud/updateRecipe",["updateForm"=>$form->getFormElements(),"erreur"=>$error,"recipeObject"=>$recipeObject]);
     }
     ////////////////////////////////////////////////

     /////////////////////crud control pour recettes finit/////////////////

     ////////////////////crud control pour le gallery/////////////////////

     //cherche une list de tous les images de tableau mjcgallery
     public function galleryList() {

        //instancier galleryModel comme une objet pour etre utilisé
          $gallery = new recipeModel();
        //trouve tous les entrees dans la db
        $list = $gallery->findallGallery();
        //renders gallery on gallery.php, defines list from galleryModel
        $this->render("crud/galleryList",['list'=>$list]);
    }
    ////////////////////////////////////////////////////////////////////

    //ajoute une image au tableau mjcgallery au travers de fonction addGallery
        public function addGallery()
        {
            if (Form::validateFiles($_FILES,["picture"])) 
            {
                //chemin image
             $picture = "images/enfantsGallery/".$_FILES["picture"]["name"];
 
             //rayon pour type
             $type = array("jpg"=> "image/jpg", "jpeg"=>"image/jpeg", "gif"=>"image/gif","png"=>"image/png");
 
             //variables pour type, taile et nom
             $picType = $_FILES["picture"]["type"];
             $picName = $_FILES["picture"]["name"];
             $picSize = $_FILES["picture"]["size"];
 
             //verifier extension fichier
             //recuperee extension fichier
             $ext = pathinfo($picName, PATHINFO_EXTENSION);
             if (!array_key_exists($ext,$type)) 
             {
                 echo "Le format du fichier est incorrect.";
             }
             //verifier taille de fichier, max 2mb
             $maxsize = 2*1024*1024;
             if ($picSize > $maxsize) 
             {
                 echo "La taille du fichier depasse la limite";
             }
 
             //verifier mime de fichier
             if (in_array($picType,$type))
             {
                 $uniqueName = uniqid('',true);
                 $file = $uniqueName . "." . $ext;
                 if (file_exists("images/enfantsGallery/".$file)) 
                 {
                     echo $file . "existe deja";
                 } 
                 else 
                 {
                     //upload images
                     move_uploaded_file($_FILES["picture"]["tmp_name"],"images/enfantsGallery/".$_FILES["picture"]["name"]);
                 }
            };
            $gallery = new recipeObjects();
            $gallery->setImage($picture);

            $model = new recipeModel();
            $model->addGallery($gallery);

            //returns to galleryList after submission
            echo ("<script> window.location='index.php?controller=crud&action=galleryList'</script>");
        }
        //creation de formule pour televerser les images
        $form = new Form();
        $form->startForm("#","POST",["enctype"=>"multipart/form-data"]);
        $form->addLabel("picture","Image",["class"=>"form-label"]);
        $form->addInput("file","picture",["id"=>"picture", "class" => "form-control"]);
        $form->addInput("submit", "add", ["value"=>"Ajoute une image", "class" => "btn btn-primary"]);
        $form->endForm();

        //afficher le page
        $this->render("crud/addGallery",['addForm'=>$form->getFormElements()]);
    }
//////////////////////////////////////////////////////////////////////////////////////
    //supprime une recette
    public function deleteGallery($id) {
        if(isset($_POST["true"])) {
            //this deletes the entry
            $gallery = new recipeModel();
            $gallery->deleteGallery($id);
            //this redirects to list
            header("Location:index.php?controller=crud&action=galleryList");
        } 
        elseif (isset($_POST['false'])){
            //this redirecs to list
            header("Location:index.php?controller=crud&action=galleryList");
        }
        
        else {
            //this collects the entry with find
            $galleries = new recipeModel();
            $gallery = $galleries->findGallery($id);
        }
        //this returns to selected entry
        $this->render('crud/deleteGallery', ["gallery"=>$gallery]);
     }
     /////////////////////////////////////////////////////////////////////////////////////////
     //fonction qui editer les entrees pour les gallerie par des enfants
     //quelques lignes commentée juste en cas on besoin apres une modification au table
     //non fonctionnel, ne comprends pas pourquoi
        public function updateGallery($id) {
        if(Form::validatePost($_POST, ["id"])) {
            $galleryObject = new recipeObjects();

            $galleryObject->setidgallery(htmlspecialchars($_POST["id"],ENT_QUOTES));
            //$recipeObject->setIngredients(htmlspecialchars($_POST["Ingredients"],ENT_QUOTES));
            //$recipeObject->setrecetteMethode(htmlspecialchars($_POST["Instructions"],ENT_QUOTES)); 
             
            //si une image est televerse              
            if(Form::validateFiles($_FILES, ["picture"])) {
                move_uploaded_file($_FILES["picture"]["tmp_name"],"images/enfantsGallery/".$_FILES["picture"]["name"]);
            
            //chemin d'image
                $picture = "images/enfantsGallery/" . $_FILES["picture"]["name"];
                $galleryObject->setImage($picture);
            }
            //s'il n'y a pas une nouvelle image, ancien est gardee
            else{
                $galleryObject->setImage($_POST["hidden"]);
            }
            $gallery = new recipeModel();
            $gallery->updateGallery($id, $galleryObject);

            //dirige vers le liste
            header("Location:index.php?controller=crud&action=galleryList");
        }
            else {
                $error = !empty($_POST)?"Le formulaire n'a pas ete correctement rempli" :"";
                }
            
        $gallery = new recipeModel();
        $galleryObject = $gallery->findGallery($id);
        $form = new Form();

        //cree la form
        //objet form est dans form.php

        $form->startForm("#","POST",["enctype"=>"multipart/form-data"]);
        $form->addLabel("picture","Image",["class"=>"form-label"]); 
        $form->addInput("file","picture",["id"=>"picture", "class" => "form-control"]);
        $form->addInput("text", "hidden", ["id"=>"hidden", "class" => "form-control", "value"=>$galleryObject->image, "hidden"=>""]);
        $form->addInput("submit", "update", ["value"=>"modifier", "class" => "btn btn-primary"]);
        $form->endForm();
        $this->render("crud/updateGallery",["updateForm"=>$form->getFormElements(),"erreur"=>$error,"galleryObject"=>$galleryObject]);
     }
     /////////////////////////////////////////////////////////////////////////////////////////////////////

     //control l'authentication et controle de mot de pass
     public function login() {
        if(Form::validatePost($_POST, ["Username","Password"])) {
            $login = new recipeObjects();

            $login->setUsername(htmlspecialchars($_POST["Username"], ENT_QUOTES));
            $login->setPassword(htmlspecialchars($_POST["Password"], ENT_QUOTES));

            $recipeModel = new recipeModel;
            $user = $recipeModel->login($login);
            //var_dump($user);
            if($user === true) {
                $_SESSION["username"] = "Admin";
                header("Location:index.php?controller=crud&action=index");
                //echo ("<script> window.location='index.php?controller=crud&action=index'</script>");
            }
            else if ($user === false) {
                echo ("<script>alert('le mot de pass ou credentials sont incorrect')</script>");
                echo ("<script>console.log('le mot de pass ou credentials sont incorrect')</script>");        
            }
        }

        $form = new form();
        $form->startForm("#", "POST", ["enctype" => "multipart/form-data"]);
        $form->addLabel("text", "Nom Utilisateur", ["class" => "form-label"]);
        $form->addInput("text", "Username", ["id"=>"Username", "class" => "form-control", "placeholder" => "Votre Nom utilisateur"]);
        $form->addLabel("text", "Mot de Passe", ["class" => "form-label"]);
        $form->addInput("password", "Password", ["id"=>"Password", "class" => "form-control", "placeholder" => "Mot de Passe"]);
        $form->addInput("submit", "add", ["value"=>"Verifier", "class" => "btn btn-primary"]);
        //endform located in core/form
        $form->endForm();

        //renders form, views\form
        $this->render('crud/login',["user"=>$form->getformElements()]);
     }

     public function logout() {
       $this->render("crud/logout");
     }


}
