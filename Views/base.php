<?php 
namespace cefiiproject\Views;
use cefiiproject\Models\recipeModel;
?>

<!DOCTYPE html>
<!--start of html wrapper-->
<html>
    <!--start of head-->
    <head>
        <meta charset = "UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content = "width = device-width, initial-scale=1.0">
        <title>
            <?=
            //changes title according to variable set by other pages
            $title
            ?>
        </title>
        <!--bootstrap-->
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" 
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
        <!--fontawesome-->
        <script src="https://kit.fontawesome.com/5d876d04f2.js" crossorigin="anonymous"></script>
        <link href="//netdna.bootstrapcdn.com/font-awesome/3.2.1/css/font-awesome.css" rel="stylesheet">
        <!--css-->
        <link rel="stylesheet" href="styles.css">
        </head>
        <!--end of head-->

    <!--start of body-->
    <body>  
    <div class="wrapper">
        <div class="container"> 
           <img class = "mjclogo" src="images/logoMJC ok" alt="mjc logo">
                <header>
                    <h1>Les Recettes du MJC<h1>
                </header> 
                        <div class="navbar">
                            <a id="returnMJC" href="https://mjcsaumur.com/">Retour au site MJC</a>
                            <a id="accueil" href="index.php">Accueil</a>
                            <div class="dropMenu">
                                <button class="dropbutton">
                                 Nos Recettes<i class="fa fa-caret-down"></i>
                                </button>
                                <div class="recettesOptions">
                                    <?php 
                                    //crée un boucle qui rempli le menu dropdown avec entrées de bdd
                                        $recipe = new recipeModel;
                                        $list = $recipe->findAll();

                                        foreach ($list as $value) {
                                            echo "<a href='index.php?controller=recipes&action=showRecipe&id=$value->recetteId'>$value->recetteTitle</a>";
                                        }
                                    ?>
                                </div>
                            </div>
                            <a id="propos" href="index.php?controller=home&action=about">A propos de nous</a>
                            <a id="galerie" href="index.php?controller=gallery&action=gallery">Galerie par des enfants</a>
                        </div>
        
            <main>
                <!--shows content. Content variable in Controller.php and displays content from the 
                   files in home and creation  -->
                <?=$content?>
            </main>
        </div>
        <footer>
        
            <div class="legal">
                <p><a href="https://mjcsaumur.com/mentions-legales/">Mentions Legals</a></p>
                <p><a href="https://mjcsaumur.com/politique-de-confidentialite/">Politique de Confidentialité</a></p>
            </div>
            <div class="address">
                <p>MJC Centre social de Saumur</p>
                <p>Place de Verdun</p>
                <p>49400 Saumur</p>
            </div>
            
            <div class="ouverture">
                <p>Horaires d'accueil:</p>
                <p>Lundi au Vendredi</p> 
                <p>9h00-12h30 14h-17h30</p>
            </div>   
            <div class="contact">
                <p>Contactez nous au:</p>
                <p><a href="mailto:infos@mjcsaumur.com">infos@mjcsaumur.com</a></p>
                <p>02. 41. 40. 25. 60</p>
            </div>
        </footer>
    
    </div>
    </body>
    <!--end of body-->
    
</html>