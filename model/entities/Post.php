<?php
namespace Model\Entities;

use App\Entity;

/*
    En programmation orientée objet, une classe finale (final class) est une classe que vous ne pouvez pas étendre, c'est-à-dire qu'aucune autre classe ne peut hériter de cette classe. En d'autres termes, une classe finale ne peut pas être utilisée comme classe parente.
*/

final class Post extends Entity{

    private $id;
    private $texte;
    private $utilisateur;
    private $dateCreation;

    public function __construct($data){         
        $this->hydrate($data);        
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

    /**
     * Get the value of texte
     */ 
    public function getTexte()
    {
        return $this->texte;
    }

/**
     * Set the value of user
     *
     * @return  self
     */ 
    public function setTexte($texte){
        $this->texte = $texte;
        return $this;
    }
   

     /**
     * Get the value of user
     */ 
    public function getUtilisateur(){
        return $this->utilisateur;
    }

    /**
     * Set the value of user
     *
     * @return  self
     */ 
    public function setUtilisateur($utilisateur){
        $this->utilisateur = $utilisateur;
        return $this;
    }

    

    /**
     * Set the value of dateCreation
     *
     * @return  self
     */ 
    public function setDateCreation($dateCreation)
    {
        $this->dateCreation = $dateCreation;

        return $this;
    }

    /**
     * Get the value of dateCreation
     */ 
    public function getDateCreation()
    {
        return $this->dateCreation;
    }

    




    public function __toString(){
        
        return $this->texte;
    }

}