<?php 
//cherche la titre du recette de bdd, 
namespace cefiiproject\Views\recipe;
use cefiiproject\Models\recipeModel;
$title = $recipe->recetteTitle;
?>
<aside class="recipeAside">
    <div class='recipeHeader'>
        <!--recette title et image sont appelle de bdd, variable recipe est donne par la recipeModel, qui est appelle par la recipeController, qui est appele par la base.php selon la id du recette-->
        <h2><?php echo $recipe->recetteTitle;?></h2>
        <img src=<?=$recipe->recetteImage?> alt="">
        <a id="propos" href="index.php?controller=recipes&action=showRecipeFalc&id=<?=$recipe->recetteId?>">Version accessible</a>
    </div>
    <div class='recipeContent'>
        <div class="arrows">
            <!--button that is supposed to go to the previous entry in the dbb. If no more entries goes to the last-->
            <div>
               <i class="fa-solid fa-circle-arrow-left fa-2xl"></i>
            </div>
        </div>
        <div class="recipeBody">
            <div class='ingredientPage'>
                <!--ingredients go here--> 
                <div class=IngreList></div>
                        <?php 
                            //breaks apart text field into lines based on commas
                            $str = $recipe->Ingredients;
                            $output= explode(",", $str);
                            foreach ($output as $value) {
                            echo "<ul>". $value ."</ul>";
                            }
                        ?>
                </div>
                <div class='methodPage'>
                    <!--instructions go here-->
                    <?php 
                    //breaks apart text field into lines based on periods
                    $str = $recipe->recetteMethode;
                    $output= explode(".", $str);
                    foreach ($output as $key=> $value) {
                        $number = $key+1;
                        echo "<ul>"."$number"."."." ".$value ."</ul>";
                        }
                    ?>
            </div>
        </div>
        <div class="arrows">
                    <!--button that is supposed to go to the next entry in the dbb. If no more entries goes to the first-->
            <div><i class="fa-solid fa-circle-arrow-right fa-2xl"></i></div>
        </div>
    </div>
</aside>