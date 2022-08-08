<?php

namespace App\Model;

use PDO;
use App\database\Database;

class MessageModel
{
    protected $id;

    protected $message;

    protected $articles_id;

    protected $pdo;

    const TABLE_NAME = 'commentaire';

    public function __construct()
    {
        $database = new Database();
        $this->pdo = $database->getPDO();
    }

    public function findAll()
    {
        $sql = 'SELECT
                `id`
                ,`message`
                , `articles_id`
                FROM ' . self::TABLE_NAME . '
                ORDER BY `id` DESC;
        ';

        $pdoStatement = $this->pdo->query($sql);
        $result = $pdoStatement->fetchAll(PDO::FETCH_CLASS, self::class);
        return $result;
    }
    public function findByArticles($articlesId)
    {
        $sql = 'SELECT
                `id`
                ,`name`
                ,`description`
                ,`prix`
                ,`date_de_parution`
                ,`categorie`
                ,`image`
                ,`departement`
                FROM ' . self::TABLE_NAME . '
                WHERE `articles_id` = :articles_id
                ORDER BY `id` ASC;
        ';
        
        $pdoStatement = $this->pdo->prepare($sql);
        $pdoStatement->bindValue(':articles_id', $articlesId, PDO::PARAM_INT);
        $result = $pdoStatement->execute();
        $result = $pdoStatement->fetchAll(PDO::FETCH_CLASS, self::class);
        return $result;
    }
    function save($message,$id) 
    {
        //enregistrement base de données 

        $insert = "INSERT INTO commentaire (message, articles_id)
        VALUES('$message',$id)";


         $query = $this->pdo->prepare($insert);
        //j'execute la requete insert

         $result = $query->execute();
         return $result;
       
        //if($execute == true) {
        //    $msgSucces = "message envoyé avec succès";
        //}else{
        //$msgError = "Le message n'a pas été envoyé";
        }

    
 
    /**
     * Get the value of date_parution
     */ 
    public function getDate_parution()
    {
        return $this->date_parution;
    }

    /**
     * Set the value of date_parution
     *
     * @return  self
     */ 
    public function setDate_parution($date_parution)
    {
        $this->date_parution = $date_parution;

        return $this;
    }

    /**
     * Get the value of message
     */ 
    public function getMessage()
    {
        return $this->message;
    }

    /**
     * Set the value of message
     *
     * @return  self
     */ 
    public function setMessage($message)
    {
        $this->message = $message;

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

    /**
     * Get the value of articles_id
     */ 
    public function getArticles_id()
    {
        return $this->articles_id;
    }

    /**
     * Set the value of articles_id
     *
     * @return  self
     */ 
    public function setArticles_id($articles_id)
    {
        $this->articles_id = $articles_id;

        return $this;
    }
}