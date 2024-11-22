<?php
namespace cefiiproject\Entities;

//contient les getters et setters pour POO
class recipeObjects {
 
//pour recettes
 private $recetteId;
 private $recetteImage;
 private $recetteMethode;
 private $recetteTitle;
 private $Ingredients;

 //pour gallerie
 private $idGallery;
 private $image;

 //pour login
 private $UserName;
 private $password;

 ///setters et getters pour recettes

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
   * Get the value of Ingredients
   */ 
  public function getIngredients()
  {
   return $this->Ingredients;
  }
 
  /**
   * Set the value of Ingredients
   *
   * @return  self
   */ 
  public function setIngredients($Ingredients)
  {
   $this->Ingredients = $Ingredients;
 
   return $this;
  }

/////////////////////////////////////////////////////
//setters et getters pour gallery

 /**
  * Get the value of idGallery
  */ 
 public function getIdGallery()
 {
  return $this->idGallery;
 }

 /**
  * Set the value of idGallery
  *
  * @return  self
  */ 
 public function setIdGallery($idGallery)
 {
  $this->idGallery = $idGallery;

  return $this;
 }

 /**
  * Get the value of image
  */ 
 public function getImage()
 {
  return $this->image;
 }

 /**
  * Set the value of image
  *
  * @return  self
  */ 
 public function setImage($image)
 {
  $this->image = $image;

  return $this;
 }

////////////////////////////////////////////////
//Getters et Setters pour login

/**
  * Get the value of UserName
  */ 
 public function getUserName()
 {
  return $this->UserName;
 }

 /**
  * Set the value of UserName
  *
  * @return  self
  */ 
 public function setUserName($UserName)
 {
  $this->UserName = $UserName;

  return $this;
 }

 /**
  * Get the value of password
  */ 
 public function getPassword()
 {
  return $this->password;
 }

 /**
  * Set the value of password
  *
  * @return  self
  */ 
 public function setPassword($password)
 {
  $this->password = $password;

  return $this;
 }
}
?>