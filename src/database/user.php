<?php
namespace App\database;

use App\database\Database;



Class User
{
    private $pdo;
    public function __construct()
    {
        $connection = new Database;
        $this->pdo = $connection->getPDO();
    }
    
    function addUser($email,$password){
        $statement = $this->pdo->prepare("INSERT INTO user (email, password) VALUES ( :email , :password)") ; 
        $statement->bindParam(':email', $_POST["email"]);
        $statement->bindParam(':password', $_POST["password"]);
        $statement->execute();
        }  
    }
    