<?php
session_unset();
session_destroy();

echo ("<script> window.location='index.php?controller=crud&action=index'</script>");
?>