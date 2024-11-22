<?php 
//cherche la titre du recette de bdd, 
$title = $recipe->Recipe;
?>
<aside>
    <div class='recipeHeader'>
        <!--recette title et image sont appelle de bdd, variable recipe est donne par la recipeModel, qui est appelle par la recipeController, qui est appele par la base.php selon la id du recette-->
        <h2><?php echo $recipe->Recipe;?></h2><img src=<?=$recipe->Image?> alt="">
    </div>
    <div class='recipeBody'>
        <div class='ingredientPage'>
            <!--ingredients go here--> 
            <?php 
                  /*  echo "<tr>";
                    echo "<td>". $recipe->Ingredient."</td>";
                    echo "<td>". $recipe->Amount."</td>";
                    echo "<td>". $recipe->Unit_of_Measure."</td>";
                    echo "<tr>";*/
                foreach ($recipe as $value) {
                    echo "<tr>";
                    echo "<td>". $value->Ingredient."</td>";
                    echo "<td>". $value->Amount."</td>";
                    echo "<td>". $value->Unit_of_Measure."</td>";
                    echo "<tr>";
                }
                ?>
        </div>
        <div class='methodPage'>
            <!--instructions go here-->
            <?=$recipe->Instructions;?>
        </div>
    </div>
</aside>