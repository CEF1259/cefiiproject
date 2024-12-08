<?php
//session already started in public index file

if ($_SESSION['username'] == "Admin") {
    // Grab user data from the database using the user_id
    // Let them access the "logged in only" pages
} else {
    // Redirect them to the login page
    header("Location:index.php?controller=crud&action=login");
}

$title = "Livre des Recettes BackEnd - MJC seulement"
?>
<h2>Livre des Recettes BackEnd - Equipe de MJC Seulement</h2>

<div class= "adminNav">
<a href="index.php?controller=crud&action=recipeList"><button class="adMinButtons">Liste des Recettes</button></a>
<a href="index.php?controller=crud&action=galleryList"><button class="adMinButtons">Gallerie</button></a>
</div>