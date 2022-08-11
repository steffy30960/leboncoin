<?php

namespace App\Controller;

use App\Model\AnnonceModel;
use App\Controller\AbstractController;


class ListController extends AbstractController
{
    public function index()
    {
        $annonceModel = new AnnonceModel();

        $annonces = $annonceModel->findAll();
        

        $this->render('list.php', [
            'annonces' => $annonces, 
            
        ]);
        
    }

    public function create()
    {
        $annonceModel = new AnnonceModel();

        // je récupère le name depuis le formulaire
        if (isset($_POST['name'])) {
            $name= trim($_POST['name']);
            $prix= trim($_POST['prix']);
            $description= trim($_POST['description']);
            $date_de_parution= new \Datetime;
            $categorie= trim($_POST['categorie']);
            $departement= trim($_POST['departement']);
            $image= trim($_POST['image']);
        }

      

        if (!empty($name)) {
            // je crée
            $annonceModel = new AnnonceModel();
            $annonce_id = $annonceModel->create($name, $prix, $description, $date_de_parution, $categorie, $image,$departement);
        }

        
        $this->render('formulaireajout.php', [
          
    ]);

   
    
    }
    public function paginations()
    {
        $annonceModel = new AnnonceModel();

       
     
        
        $result=$annonceModel->pagination();

        $this->render('list.php', [
            'result' => $result, 
            
        ]);
        


    }
}
    

