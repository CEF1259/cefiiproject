<?php 

if ($_SESSION['username'] == "Admin") {
    // Grab user data from the database using the user_id
    // Let them access the "logged in only" pages
} else {
    // Redirect them to the login page
    header("Location:index.php?controller=crud&action=login");
} 

$title = "Modification d'un image - admin seulement";
?>
<h2>Modification d'un image soumis par enfant - admin seulement</h2>
<a href="index.php?controller=crud&action=galleryList"><button type="button" class="adMinButtons">Retour au liste</button></a>
<?php
        if(!empty($error)) {
    ?>
    
            <div class="alert alert-danger" role="alert">
            <?php echo $error;?>
    <?php
        }
    ?>
   <section class="row">
        <div class="col-10">
            <?php 
            //calls the render function found under updateGallery in crudController
            //seems to be displaying correctly
                echo $updateForm; 
            ?>
        </div>
    

   </section>