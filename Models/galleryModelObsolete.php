<?php 
namespace cefiiproject\models;

use Exception;
use cefiiproject\core\dbConnect;

//gerer PDO requete pour la gallerie
class galleryModel extends dbConnect {
    public function findAllGallery() {
        $this->request = "SELECT * FROM mjcGallery";
        $result = $this->connection->query($this->request);
        $list = $result->fetchAll();
        return $list;
    }
}

?>