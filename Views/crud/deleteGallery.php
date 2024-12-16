<?php

if ($_SESSION['username'] == "Admin") {
    // Grab user data from the database using the user_id
    // Let them access the "logged in only" pages
} else {
    // Redirect them to the login page
    header("Location:index.php?controller=crud&action=login");
}

$title = "Supression d'un image par enfant - admin seulement";
?>
<div class="alert alert-warning" role="alert">
    <p>Voulez vous supprimer :
        <?php echo "<img src='$gallery->image'></img>"; ?> 
        ?
    </p>

    <form action="#" method="POST">
        <input class="btn btn-danger" type="submit" name= "true" value="Oui">
        <input class="btn btn-danger" type="submit" name= "false" value="Non">

    </form>
</div>