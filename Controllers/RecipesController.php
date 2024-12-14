<?php
namespace cefiiproject\Controllers;

use cefiiproject\Models\recipeModel;

class recipesController extends controller
{
    //montre le page recipe1 dans recipes, appelle par base.php
    public function listRecipes() {
        $recipes = new recipeModel();
        $list = $recipes->findAll();
        $this->render("recipes/listRecipes",[recipe=>$recipe]);
    }

    public function showRecipe($id)
    {
        //trouver le titre pour une recette
        $recipes = new recipeModel();
        //$ingredients = new recipeModel();
        $recipe = $recipes->findRecipe($id);
        $this->render("recipes/recipe",["recipe"=>$recipe]);    
    }
    ////////////////////////////////////////////////////////////////////////

    public function showRecipeFalc($id) {
        //trouver le titre pour une recette
        $recipes = new recipeModel();
        //$ingredients = new recipeModel();
        $recipe = $recipes->findRecipe($id);
        $this->render("recipes/recipeFALC",["recipe"=>$recipe]);
    }
}

?>