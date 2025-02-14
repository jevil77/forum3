<?php
namespace Model\Managers;

use App\Manager;
use App\DAO;

class PostManager extends Manager{



     // on indique la classe POO et la table correspondante en BDD pour le manager concerné
     protected $className = "Model\Entities\Post";
     protected $tableName = "post";
 
     public function __construct(){
         parent::connect();
     }



     public function findPostsByTopics($id) {

        $sql = "SELECT * 
                FROM ".$this->tableName." p
                 WHERE p.topic_id = :id
                ORDER BY p.dateCreation ASC";


     // la requête renvoie plusieurs enregistrements --> getMultipleResults
        return  $this->getMultipleResults(
            DAO::select($sql, ['id' => $id]), 
            $this->className
        );
     }









}



 












