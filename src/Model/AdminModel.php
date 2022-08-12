<?php

namespace App\Model;

use PDO;
use App\database\Database;

class AdminModel
{
    protected $id;

    protected $name;

    protected $description;

    protected $prix;

    protected $date_de_parution;

    protected $categorie;

    protected $image;

    protected $departement;

    protected $pdo;

    public const TABLE_NAME = 'articles';

    public function __construct()
    {
        $database = new Database();
        $this->pdo = $database->getPDO();
    }

    public function findAll()
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
                ORDER BY `id` DESC;
        ';

        $pdoStatement = $this->pdo->query($sql);
        $result = $pdoStatement->fetchAll(PDO::FETCH_CLASS, self::class);
        return $result;
    }

    public function findById($id)
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
                  WHERE `id` = :id
                  ORDER BY `id` ASC;
          ';

        $pdoStatement = $this->pdo->prepare($sql);
        $pdoStatement->bindValue(':id', $id, PDO::PARAM_INT);
        $result = $pdoStatement->execute();
        $result = $pdoStatement->fetchObject(self::class);
        return $result;
    }
    public function Add($name, $prix, $description, $date_de_parution, $categorie, $image, $departement)
    {
        $sql = 'INSERT INTO ' . self::TABLE_NAME . '
                (`name`, `prix`, `description`, `date_de_parution`,`categorie`, `image`,`departement` )
                VALUES
                (:name, :prix, :description , :date_de_parution, :categorie, :image, :departement)
        ';

        $pdoStatement = $this->pdo->prepare($sql);
        $pdoStatement->bindValue(':name', $name, PDO::PARAM_STR);
        $pdoStatement->bindValue(':prix', $prix, PDO::PARAM_STR);
        $pdoStatement->bindValue(':description', $description, PDO::PARAM_STR);
        $pdoStatement->bindValue(':date_de_parution', $date_de_parution->format('Y-m-d H:i:s'));
        $pdoStatement->bindValue(':categorie', $categorie, PDO::PARAM_STR);
        $pdoStatement->bindValue(':image', $image, PDO::PARAM_STR);
        $pdoStatement->bindValue(':departement', $departement, PDO::PARAM_INT);
        $result = $pdoStatement->execute();

        if (!$result) {
            return false;
        }

        return $this->pdo->lastInsertId();
    }

    public function delete($id)
    {
        $sql = "DELETE FROM articles WHERE id = $id"  ;

        $pdoStatement = $this->pdo->prepare($sql);
        $result = $pdoStatement->execute();
        return $result;
    }

    public function update($id, $name, $prix, $description, $date_de_parution, $categorie, $image, $departement)
    {
        $sql = "UPDATE `articles` SET 
            `name` = :name,
            `description` = :description, 
            `prix` = :prix,
            `date_de_parution` = :datedeparution,
            `categorie` = :categorie,
            `departement`= :departement,
            `image` = :image
            WHERE `id` = :id"  ;
            

        $pdoStatement = $this->pdo->prepare($sql);
        $pdoStatement->bindValue(':id', $id, PDO::PARAM_STR);
        $pdoStatement->bindValue(':name', $name, PDO::PARAM_STR);
        $pdoStatement->bindValue(':prix', $prix, PDO::PARAM_STR);
        $pdoStatement->bindValue(':description', $description, PDO::PARAM_STR);
        $pdoStatement->bindValue(':datedeparution', $date_de_parution);
        $pdoStatement->bindValue(':categorie', $categorie, PDO::PARAM_STR);
        $pdoStatement->bindValue(':image', $image, PDO::PARAM_STR);
        $pdoStatement->bindValue(':departement', $departement, PDO::PARAM_INT);
        $pdoStatement->execute();

        $result= $pdoStatement->fetchAll();

        
        return $result;

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
     * Get the value of name
     */ 
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set the value of name
     *
     * @return  self
     */ 
    public function setName(String $name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Get the value of description
     */ 
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * Set the value of description
     *
     * @return  self
     */ 
    public function setDescription($description)
    {
        $this->description = $description;

        return $this;
    }

    /**
     * Get the value of prix
     */ 
    public function getPrix()
    {
        return $this->prix;
    }

    /**
     * Set the value of prix
     *
     * @return  self
     */ 
    public function setPrix($prix)
    {
        $this->prix = $prix;

        return $this;
    }

    /**
     * Get the value of date_de_parution
     */ 
    public function getDate_de_parution()
    {
        return $this->date_de_parution;
    }

    /**
     * Set the value of date_de_parution
     *
     * @return  self
     */ 
    public function setDate_de_parution($date_de_parution)
    {
        $this->date_de_parution = $date_de_parution;

        return $this;
    }

    /**
     * Get the value of categories
     */ 
    public function getCategorie()
    {
        return $this->categorie;
    }

    /**
     * Set the value of categories
     *
     * @return  self
     */ 
    public function setCategorie($categorie)
    {
        $this->categorie = $categorie;

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

    /**
     * Get the value of departement
     */ 
    public function getDepartement()
    {
        return $this->departement;
    }

    /**
     * Set the value of departement
     *
     * @return  self
     */ 
    public function setDepartement($departement)
    {
        $this->departement = $departement;

        return $this;
    }
}