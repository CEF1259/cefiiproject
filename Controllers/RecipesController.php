<?php
namespace cefiiproject\Controllers;

use cefiiproject\Models\recipeModel;

class recipesController extends Controller
{
    //montre le page recipe1 dans recipes, appelle par base.php
    public function listRecipes() {
        $recipes = new recipeModel();
        $list = $recipes->findAll();
        $this->render("Recipes/listRecipes",["list"=>$list]);
    }

    public function showRecipe($id)
    {
        //trouver le titre pour une recette
        $recipes = new recipeModel();
        //$ingredients = new recipeModel();
        $recipe = $recipes->findRecipe($id);
        $this->render("Recipes/recipe",["recipe"=>$recipe]);    
    }
    ////////////////////////////////////////////////////////////////////////

    public function showRecipeFalc($id) {
        //trouver le titre pour une recette
        $recipes = new recipeModel();
        //$ingredients = new recipeModel();
        $recipe = $recipes->findRecipe($id);
        $this->render("Recipes/recipeFALC",["recipe"=>$recipe]);
    }
}

?>