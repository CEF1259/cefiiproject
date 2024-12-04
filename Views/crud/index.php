<?php
//session already started in public index file
/*
if ( isset( $_SESSION['Admin'])) {
    // Grab user data from the database using the user_id
    // Let them access the "logged in only" pages
} else {
    // Redirect them to the login page
    header("Location:index.php?controller=crud&action=login");
}*/

//Handles Password Control
//require_once "protect.php";
//use cefiiproject\crud\protect;
//https://gist.github.com/eric1234/4692807


$title = "Livre des Recettes BackEnd - MJC seulement"
?>
<h2>Livre des Recettes BackEnd - Equipe de MJC Seulement</h2>

<div class= "adminNav">
<a href="index.php?controller=crud&action=recipeList"><button class="adMinButtons">Liste des Recettes</button></a>
<a href="index.php?controller=crud&action=galleryList"><button class="adMinButtons">Gallerie</button></a>
</div>