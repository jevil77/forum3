<?php
namespace Model\Managers;

use App\Manager;
use App\DAO;

class UtilisateurManager extends Manager{

    // on indique la classe POO et la table correspondante en BDD pour le manager concerné
    protected $className = "Model\Entities\Utilisateur";
    protected $tableName = "utilisateur";

    public function __construct(){
        parent::connect();
    }

    // public function findUtilisateur($nom){

    //     $sql = "SELECT *
    //     FROM ".$this->tableName." a
    //     WHERE a.nom = :nom
    //     ";

    //     return $this->getOneOrNullResult(
    //     DAO::select($sql, ['nom' => $nom], false), 
    //     $this->className
    //     );



    // }



    public function findOneByEmail($email)
    {
        $sql = "SELECT * 
                FROM " . $this->tableName . " u 
                WHERE u.mail = :email";

        return $this->getOneOrNullResult(
            DAO::select($sql, ['email' => $email], false),
            $this->className
        );
    }











}







