<div class="gallery">
<?php 

$title = "gallery par des enfants";

echo "<h2>Soumissons de nos utilisateurs</h2>";

foreach($list as $value) {
     echo "<td><img src='$value->image' class='picture' alt='picture'"; 
}

?>
</div>