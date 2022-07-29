<?php

namespace App\Model;

use PDO;
use App\database\Database;

class AnnonceModel
{
    protected $id;

    protected $name;

    protected $description;

    protected $prix;

    protected $date_de_parution;

    protected $categories;

    protected $image;

    protected $departement;
    
    protected $pdo;

    const TABLE_NAME = 'articles';

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
        public function search($name = '', $categorie = "")
        {
    
            $sql = "SELECT
                    `id`
                    ,`name`
                    ,`description`
                    ,`prix`
                    ,`date_de_parution`
                    ,`categorie`
                    ,`image`
                    ,`departement`
                    FROM " . self::TABLE_NAME . "
                    WHERE `name` LIKE '%$name%' 
                    ORDER BY `id` ASC;
            ";

        $pdoStatement = $this->pdo->prepare($sql);
        $result = $pdoStatement->execute();
        $result = $pdoStatement->fetchAll(PDO::FETCH_CLASS, self::class);
        return $result;
    }

    public function create($name, $prix, $description, $date_de_parution,$categorie, $image)
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

    public function countpage()
    {
        // je recupere le nombre total d'articles dans ma table article".
        $total_pages =  $this->pdo->prepare('SELECT COUNT(*) AS nb_articles FROM `articles`');

        // je verifie si le numéro de page est spécifié et vérifie si c'est un nombre, sinon je mets le numéro de page par défaut qui est 1.
        $page = isset($_GET['page']) && is_numeric($_GET['page']) ? $_GET['page'] : 1;

        //Nombre de résultats à afficher sur chaque page.
        $num_results_on_page = 15;
            
            if ( $pdoStatement= $this->pdo->prepare('SELECT * FROM articles ORDER BY name LIMIT ?,?')) {
                //Calculez la page pour obtenir les résultats dont nous avons besoin à partir de notre tableau.
                $calcul_page = ($page - 1) * $num_results_on_page;
                $pdoStatement->bindParam('calcul_page', $calcul_page,PDO::PARAM_INT);
                $pdoStatement->bindParam('num_results_on_page', $num_results_on_page ,PDO::PARAM_INT);
        
             
            
               
              
            }
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
    public function getCategories()
    {
        return $this->categories;
    }

    /**
     * Set the value of categories
     *
     * @return  self
     */ 
    public function setCategories($categories)
    {
        $this->categories = $categories;

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