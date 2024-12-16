<?php

if ($_SESSION['username'] == "Admin") {
    // Grab user data from the database using the user_id
    // Let them access the "logged in only" pages
} else {
    // Redirect them to the login page
    header("Location:index.php?controller=crud&action=login");
} 

$title ="Liste des recettes pour admin";
?>
<h2>Liste des recettes - admin seulement</h2>
<div class="recipeListButtons">
    <a href="index.php?controller=crud&action=addRecipe"><button type="button" class="adMinButtons">Ajouter une recette</button></a>
    <a href="index.php?controller=crud&action=index"><button type="button" class="adMinButtons">Retour au page index admin</button></a>
</div>
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
                    echo "<td><a href='index.php?controller=crud&action=updateRecipe&id=$value->recetteId'><i class='fas fa-pen controlButton'></i></a></td>";
                    echo "<td><a href='index.php?controller=crud&action=deleteRecipe&id=$value->recetteId'><i class='fas fa-trash controlButton'></i></a></td>";
                    echo "</tr>"; 
                }
            ?>
    </table>
</div>
