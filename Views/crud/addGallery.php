<?php

if ( isset( $_SESSION['Admin'] ) ) {
    // Grab user data from the database using the user_id
    // Let them access the "logged in only" pages
} else {
    // Redirect them to the login page
    header("Location:index.php?controller=crud&action=login");
}

//Handles Password Control
//require_once "protect.php";
//use cefiiproject\crud\protect;
//https://gist.github.com/eric1234/4692807
$title = "Ajoute une image par des enfants";
?>
<h2>
    Ajoute d'un image par des enfants
</h2>
<a href="index.php?controller=crud&action=galleryList"><button type="button" class="adMinButtons">Retour au liste</button></a>
<?php
//calls the render function listed under the add function in CreationController
echo $addForm;

?>  