<?php
if ($_SESSION['username'] == "Admin") {
    // Grab user data from the database using the user_id
    // Let them access the "logged in only" pages
} else {
    // Redirect them to the login page
    header("Location:index.php?controller=crud&action=login");
}

$title = "Ajoute une recette";
?>
<h2>
    Ajoute d'une Recette
</h2>
<a href="index.php?controller=crud&action=recipeList"><button type="button" class="adMinButtons">Retour au liste</button></a>
<?php
//calls the render function listed under the add function in CreationController
echo $addForm;

?>