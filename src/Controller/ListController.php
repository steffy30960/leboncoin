<?php

namespace App\Controller;

use App\Model\AnnonceModel;
use App\Controller\AbstractController;
use DateTimeImmutable;

class ListController extends AbstractController
{
    public function index()
    {
        $annonceModel = new AnnonceModel();

        $annonces = $annonceModel->findAll();
        // ma logique métier ici
        // exemple récupérer des données en BDD
        // traiter des formulaire
        // vérifier que l'utilisateur a les droits
        // etc...
        
        if (isset($_GET['page'])) {
            $total_pages = $annonceModel->countpage();

        }
        if (isset($_GET['page'])) {
            $num_results_on_page = $annonceModel->countpage();
            
        }

        $this->render('list.php', [
            'annonces' => $annonces,
            'total_pages' => $total_pages,
            'num_results_on_page' => $num_results_on_page,
            
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
            $image= trim($_POST['image']);
        }

      

        if (!empty($name)) {
            // je crée
            $annonceModel = new AnnonceModel();
            $annonce_id = $annonceModel->create($name, $prix, $description, $date_de_parution, $categorie, $image);
        }

        
        $this->render('formulaireajout.php', [
          
    ]);
    }
}
    

