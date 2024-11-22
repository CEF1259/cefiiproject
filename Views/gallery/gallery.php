<div class="gallery">
<?php 

$title = "gallery par des enfants";

foreach($list as $value) {
     echo "<td><img src='$value->image' class='picture' alt='picture'"; 
}

?>
</div>