<?php
namespace cefiiproject\Models;

use Exception;
use cefiiproject\Core\dbConnect;
use cefiiproject\Entities\recipeObjects;

//gerer les requetes SQL pour la bdd
class recipeModel extends dbConnect {

     //checks for errors when executing a function
     public function executeTryCatch() {
        try{
            $this->request->execute();
        }
        catch(Exception $e) {
            die("Error:".$e->getMessage());
        }
        $this->request->closeCursor();
    }

    ////////fonctions qui gere le CRUD de recettes//////
    
    //trouve tous les contenues de tableau recipetable, qui contient les titres des recettes
    public function findAll() {
        $this->request = "SELECT * FROM recipetable";
        $result = $this->connection->query($this->request);
        $list=$result->fetchAll();
        return $list;
    }

    //trouve un specifique titre du tableau recipetable
    public function findRecipe($id) {
        $this->request = $this->connection->prepare("SELECT * FROM recipetable WHERE recetteId = :recetteId");
        $this->request->bindParam(":recetteId", $id);
        $this->request->execute();
        $recipe = $this->request->fetch();
        return $recipe;
    }

    ///////////////////////////////////////////////////////////////////////////////////////////////////

    //adds a recipe to the database
    public function addRecipe(recipeObjects $recipe) {
        $this->request = $this->connection->prepare("INSERT INTO recipetable VALUES (NULL, :recetteTitle, :Ingredients, :recetteImage, :recetteMethode, :recetteFalc)");
        $this->request->bindValue(":recetteTitle", $recipe->getrecetteTitle());
        $this->request->bindValue(":Ingredients", $recipe->getIngredients());
        $this->request->bindValue(":recetteImage", $recipe->getrecetteImage());
        $this->request->bindValue(":recetteMethode", $recipe->getrecetteMethode());
        $this->request->bindValue(":recetteFalc", $recipe->getrecetteFalc());
        $this->executeTryCatch();
    }

//////////////////////////////////////////////////////////////

    //editer les recettes
    public function updateRecipe($id, recipeObjects $recipe) {
        $this->request = $this->connection->prepare("UPDATE recipetable SET recetteTitle =:recetteTitle, Ingredients = :Ingredients, recetteImage = :recetteImage, recetteMethode = :recetteMethode, recetteFalc = :recetteFalc
            WHERE recetteId = :recetteId");
            $this->request->bindValue(":recetteId", $id);
            $this->request->bindValue(":recetteTitle", $recipe->getrecetteTitle());
            $this->request->bindValue(":Ingredients", $recipe->getIngredients());
            $this->request->bindValue(":recetteImage", $recipe->getrecetteImage());
            $this->request->bindValue(":recetteMethode", $recipe->getrecetteMethode());
            $this->request->bindValue(":recetteFalc", $recipe->getrecetteFalc());
            $this->executeTryCatch();
    }

    ///////////////////////////////////////////////////////////

    //supprime une recette
    public function deleteRecipe($id) {
        $this->request = $this->connection->prepare("DELETE FROM recipetable WHERE recetteId = $id");
        $this->executeTryCatch();
    }

    /////////////////////////////////////////////////////////

    /////Fonctions pour recettes fini////////

    /////Fonctions qui gere le gallery fait par des enfants///////

     //finds content for the gallery
     public function findAllGallery() {
        $this->request = "SELECT * FROM mjcgallery";
        $result = $this->connection->query($this->request);
        $list = $result->fetchAll();
        return $list;
    }
    //////////////////////////////////////////////////////////////
    
    ////trouve une seule entree dans la tableau mjcgallery/////
    public function findGallery($id) {
        $this->request = $this->connection->prepare("SELECT * FROM mjcgallery WHERE idgallery = :idgallery");
        $this->request->bindParam(":idgallery", $id);
        $this->request->execute();
        $gallery = $this->request->fetch();
        return $gallery;
    }

    //////////////////////////////////////////////////////////////////////////////////////////////

    //supprime une image dans le gallerie par des enfants
    public function deleteGallery($id) {
        $this->request = $this->connection->prepare("DELETE FROM mjcgallery WHERE idgallery = $id");
        $this->executeTryCatch();
    }

    ///////////////////////////////////////////////////////////

    //ajoute images aux gallery
    public function addGallery(recipeObjects $gallery) {
        $this->request = $this->connection->prepare("INSERT INTO mjcgallery VALUES(NULL, :image)");
        $this->request->bindValue(":image", $gallery->getImage());
        $this->executeTryCatch();
    }
    ///////////////////////////////////////////////////////////////////////////
    
    ////Modifier une entree dans le gallery/////////
    public function updateGallery($id, recipeObjects $gallery) {
        $this->request = $this->connection->prepare("UPDATE mjcgallery SET image = :image WHERE idgallery = :idgallery");
            $this->request->bindValue(":idgallery", $id);
            $this->request->bindValue(":image", $gallery->getImage());
            $this->executeTryCatch();
    }

    /////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
    ////////section qui controle login et securite/////////////////////////////////////

    /////fonction de login///////////////////////////
    public function login(recipeObjects $login) {
        $testuser = $login->getUserName();
        $testpw = $login->getPassword();
        //var_dump($testuser);
        //var_dump($testpw);

        //selectionner une entry de la tableau userstable table par rapport de nom utilisateur
        $this->request = $this->connection->prepare("SELECT*FROM userstable WHERE UserName = :UserName AND Password = :Password");
        $this->request->bindparam(":UserName", $testuser);
        $this->request->bindparam(":Password", $testpw);
        $this->request->execute();
        $user = $this->request->fetch();
        var_dump($user);
        
        //retour vrai ou faux selon le test password, qui est utiliser par la controller.
        //si vrai la session est cree
        //no encrypytion because must be simple, so no password_verify
        if ($user) {
              
                $user = true;
                var_dump("here 1");
            }
            else {
                $user = false;
                var_dump("here 2");
            }
            return $user;
        }
    }
    ///////////////////////////////////////////////////////////////////////////////////
    //fonctions abandonees qui utilise le vieux tableaux de bdd, qui sont trop compliques a travaille avec pour l'instant
    /*public function findRecipe($id) {
        $this->request = $this->connection->prepare("SELECT r.recetteTitle AS Recipe, 
                                                    r.recetteImage AS Image,
	                                                r.recetteMethode AS Instructions, 
	                                                ri.quant AS Amount, 
	                                                mu.measure_unite AS Unit_of_Measure, 
	                                                i.Ing_Nom AS Ingredient 
                                                    FROM mjcrecettetitre r 
                                                    JOIN recetteIngredient ri on r.recetteId = ri.recetteId 
                                                    JOIN mjcrecetteIngredients i on i.Ing_Id = ri.Ing_Id 
                                                    LEFT OUTER JOIN mjcrecettemeasure mu on mu.measure_id = ri.measure_id   
                                                    WHERE r.recetteId = :recetteId
                                                    GROUP BY Ing_Nom");
        $this->request->bindParam(":recetteId", $id);
        $this->request->execute();
        $recipe = $this->request->fetch();
        return $recipe;
    }
    
      //trouve tous les contenues de tableau mjcrecettetitre, qui contient les titres des recettes
    public function findAll() {
        $this->request = "SELECT * FROM mjcrecettetitre";
        $result = $this->connection->query($this->request);
        $list=$result->fetchAll();
        return $list;
    }

    //trouve un specifique titre du tableau mjcrecettetitre
    public function findTitle($id) {
        $this->request = $this->connection->prepare("SELECT * FROM mjcrecettetitre WHERE recetteId = :recetteId");
        $this->request->bindParam(":recetteId", $id);
        $this->request->execute();
        $recipeTitle = $this->request->fetch();
        return $recipeTitle;
    }
    */

?>