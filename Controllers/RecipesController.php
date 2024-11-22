<?php
namespace cefiiproject\Controllers;

use cefiiproject\Models\recipeModel;

class recipesController extends controller
{
    //montre le page recipe1 dans recipes, appelle par base.php
    /*
    public function listRecipes() {
        $recipes = new recipeModel();
        $list = $recipes->findAll();
    }*/

    //attempts to display a specific recipe, need to work on it and refine it
    public function showRecipe($id)
    {
        //trouver le titre pour une recette
        $recipes = new recipeModel();
        //$ingredients = new recipeModel();
        $recipe = $recipes->findRecipe($id);
        $this->render("recipes/recipe",["recipe"=>$recipe]);    
    }
    ////////////////////////////////////////////////////////////////////////
}

?>