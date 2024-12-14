<?php
$title ="Liste des recettes";
?>
<h2>Liste des recettes</h2>

<div class="listRecipe">
    <table class="table">
        <thead>
            <tr>
                <th scope="col">Recette Titre</th>
                <th scope="col">Image</th>
                <th scope="col">Cliquer icon pour cuisiner!</th>

            </tr>
        </thead>
        <?php 
            foreach ($list as $value) {
                    echo "<tr>";
                    echo "<td>" .$value->recetteTitle . "</td>";
                    echo "<td><img src='$value->recetteImage' class='picture'></img></td>";
                    echo "<td><a href='index.php?controller=recipes&action=showRecipe&id=$value->recetteId'><i class='fa-solid fa-kitchen-set bigger'></i></a></td>";
                    echo "</tr>"; 
                }
            ?>
    </table>
</div>
