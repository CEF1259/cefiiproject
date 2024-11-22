<?php
namespace cefiiproject\Entities;

//contient les getters et setters pour POO
class recipeObjects {
 private $Ing_Id;
 private $Ing_Image;
 private $Ing_Nom;
 private $measure_Id;
 private $measure_unite;
 private $recetteId;
 private $recetteImage;
 private $recetteMethode;
 private $recetteTitle;
 private $Quant;



 /**
  * Get the value of Ing_Id
  */ 
 public function getIng_Id()
 {
  return $this->Ing_Id;
 }

 /**
  * Set the value of Ing_Id
  *
  * @return  self
  */ 
 public function setIng_Id($Ing_Id)
 {
  $this->Ing_Id = $Ing_Id;

  return $this;
 }

 /**
  * Get the value of Ing_Image
  */ 
 public function getIng_Image()
 {
  return $this->Ing_Image;
 }

 /**
  * Set the value of Ing_Image
  *
  * @return  self
  */ 
 public function setIng_Image($Ing_Image)
 {
  $this->Ing_Image = $Ing_Image;

  return $this;
 }

 /**
  * Get the value of Ing_Nom
  */ 
 public function getIng_Nom()
 {
  return $this->Ing_Nom;
 }

 /**
  * Set the value of Ing_Nom
  *
  * @return  self
  */ 
 public function setIng_Nom($Ing_Nom)
 {
  $this->Ing_Nom = $Ing_Nom;

  return $this;
 }

 /**
  * Get the value of measure_Id
  */ 
 public function getMeasure_Id()
 {
  return $this->measure_Id;
 }

 /**
  * Set the value of measure_Id
  *
  * @return  self
  */ 
 public function setMeasure_Id($measure_Id)
 {
  $this->measure_Id = $measure_Id;

  return $this;
 }

 /**
  * Get the value of measure_unite
  */ 
 public function getMeasure_unite()
 {
  return $this->measure_unite;
 }

 /**
  * Set the value of measure_unite
  *
  * @return  self
  */ 
 public function setMeasure_unite($measure_unite)
 {
  $this->measure_unite = $measure_unite;

  return $this;
 }

 /**
  * Get the value of recetteId
  */ 
 public function getRecetteId()
 {
  return $this->recetteId;
 }

 /**
  * Set the value of recetteId
  *
  * @return  self
  */ 
 public function setRecetteId($recetteId)
 {
  $this->recetteId = $recetteId;

  return $this;
 }

 /**
  * Get the value of recetteImage
  */ 
 public function getRecetteImage()
 {
  return $this->recetteImage;
 }

 /**
  * Set the value of recetteImage
  *
  * @return  self
  */ 
 public function setRecetteImage($recetteImage)
 {
  $this->recetteImage = $recetteImage;

  return $this;
 }

 /**
  * Get the value of recetteMethode
  */ 
 public function getRecetteMethode()
 {
  return $this->recetteMethode;
 }

 /**
  * Set the value of recetteMethode
  *
  * @return  self
  */ 
 public function setRecetteMethode($recetteMethode)
 {
  $this->recetteMethode = $recetteMethode;

  return $this;
 }

 /**
  * Get the value of recetteTitle
  */ 
 public function getRecetteTitle()
 {
  return $this->recetteTitle;
 }

 /**
  * Set the value of recetteTitle
  *
  * @return  self
  */ 
 public function setRecetteTitle($recetteTitle)
 {
  $this->recetteTitle = $recetteTitle;

  return $this;
 }

 /**
  * Get the value of Quant
  */ 
 public function getQuant()
 {
  return $this->Quant;
 }

 /**
  * Set the value of Quant
  *
  * @return  self
  */ 
 public function setQuant($Quant)
 {
  $this->Quant = $Quant;

  return $this;
 }
}
?>