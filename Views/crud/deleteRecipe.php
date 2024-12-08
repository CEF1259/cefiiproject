<?php

if ($_SESSION['username'] == "Admin") {
    // Grab user data from the database using the user_id
    // Let them access the "logged in only" pages
} else {
    // Redirect them to the login page
    header("Location:index.php?controller=crud&action=login");
}
*/

//Handles Password Control
//require_once "protect.php";
//use cefiiproject\crud\protect;

$title = "Supression d'un recette - admin seulement";
?>
<div class="alert alert-warning" role="alert">
    <p>Voulez vous supprimer la recette :
        <?php echo " "."<strong>$recipe->recetteTitle</strong>"; ?> 
        ?
    </p>

    <form action="#" method="POST">
        <input class="btn btn-danger" type="submit" name= "true" value="Oui">
        <input class="btn btn-danger" type="submit" name= "false" value="Non">

    </form>
</div>