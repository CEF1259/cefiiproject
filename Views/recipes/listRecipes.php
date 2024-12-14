<?php
$title ="Liste des recettes";
?>
<h2>Liste des recettes</h2>

<div class="recipeList">
    <table class="table">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Recette Titre</th>
                <th scope="col">Ingredients</th>
                <th scope="col">Instructions</th>
                <th scope="col">Image</th>
                <th scope="col">Image Accessible</th>
            </tr>
        </thead>
        <?php 
            foreach ($list as $value) {
                    echo "<tr>";
                    echo "<td>" .$value->recetteId. "</td>";
                    echo "<td>" .$value->recetteTitle . "</td>";
                    echo "<td>" .$value->Ingredients . "</td>";
                    echo "<td>" .$value->recetteMethode . "</td>";
                    echo "<td><img src='$value->recetteImage' class='picture'></img></td>";
                    echo "<td><img src='$value->recetteFalc' class='picture'></img></td>";
                    echo "<td><a href='index.php?controller=CRUD&action=showRecipe&id=$value->recetteId'><i class='fas fa-pen controlButton'></i></a></td>";
                    echo "</tr>"; 
                }
            ?>
    </table>
</div>
