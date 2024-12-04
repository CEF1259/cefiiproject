<?php
namespace cefiiproject\Entities;

//contient les getters et setters pour POO
class adminObjects {
 
 //pour login
 private $id;
 private $UserName;
 private $password;

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

 /**
  * Get the value of id
  */ 
 public function getId()
 {
  return $this->id;
 }

 /**
  * Set the value of id
  *
  * @return  self
  */ 
 public function setId($id)
 {
  $this->id = $id;

  return $this;
 }
}
?>
 