<?php 
//cherche la titre du recette de bdd, 
namespace cefiiproject\Views\recipe;
use cefiiproject\Models\recipeModel;
$title = $recipe->recetteTitle;

$currentPage = $recipe->recetteId;

$recipes = new recipeModel();
$totalItemsObject = $recipes->getTotalItems();
$totalItemsArray = get_object_vars($totalItemsObject);
$totalItems = $totalItemsArray["total"];
?>
<aside class="recipeAside">
    <div class='recipeHeader'>
        <!--recette title et image sont appelle de bdd, variable recipe est donne par la recipeModel, qui est appelle par la recipeController, qui est appele par la base.php selon la id du recette-->
        <h2><?php echo $recipe->recetteTitle;?></h2>
        <img src=<?=$recipe->recetteImage?> alt="">
        <a id="propos" href="index.php?controller=recipes&action=showRecipe&id=<?=$recipe->recetteId?>">Version Original</a>
    </div>
    <div class='recipeContent'>
        <div class="arrows">
            <!--button that is supposed to go to the previous entry in the dbb. If no more entries goes to the last-->
            <div>
            <?php if ($currentPage > 1): ?>
                    <a href="index.php?controller=recipes&action=showRecipeFalc&id=<?=$currentPage - 1?>"><i class="fa-solid fa-circle-arrow-left fa-2xl"></i></a>
                <?php endif; ?>
            </div>
        </div>

        <div class="recipeBodyFalc">
        <img src=<?=$recipe->recetteFalc?> alt="">
        </div>

        <div class="arrows">
                    <!--button that is supposed to go to the next entry in the dbb. If no more entries goes to the first-->
            <div>
            <?php if ($currentPage < $totalItems): ?>
                <a href="index.php?controller=recipes&action=showRecipeFalc&id=<?=$currentPage + 1?>"><i class="fa-solid fa-circle-arrow-right fa-2xl"></i></a>
            <?php endif; ?>
            </div>
        </div>
    </div>
</aside>