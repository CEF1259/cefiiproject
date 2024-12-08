<?php

if ($_SESSION['username'] == "Admin") {
    // Grab user data from the database using the user_id
    // Let them access the "logged in only" pages
} else {
    // Redirect them to the login page
    header("Location:index.php?controller=crud&action=login");
}*/

//Handles Password Control
//require_once "protect.php";
//use cefiiproject\crud\protect;
$title ="Liste des images par enfants pour admin";
?>
<h2>Liste des recettes - admin seulement</h2>
<div class="galleryListButtons">
    <a href="index.php?controller=crud&action=addGallery"><button type="button" class="adMinButtons">Ajouter une image par des enfants</button></a>
    <a href="index.php?controller=crud&action=index"><button type="button" class="adMinButtons">Retour au page index admin</button></a>
</div>
<div class="galleryList">
    <table class="table">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Image</th>
            </tr>
        </thead>
        <?php 
            foreach ($list as $value) {
                    echo "<tr>";
                    echo "<td>" .$value->idgallery. "</td>";
                    echo "<td><img src='$value->image' class='picture></img>'</td>";
                   //echo "<td><a href='index.php?controller=CRUD&action=updateGallery&id=$value->idgallery'><i class='fas fa-pen controlButton'></i></a></td>";
                    echo "<td><a href='index.php?controller=CRUD&action=deleteGallery&id=$value->idgallery'><i class='fas fa-trash controlButton'></i></a></td>";
                    echo "</tr>"; 
                }
            ?>
    </table>
</div>
