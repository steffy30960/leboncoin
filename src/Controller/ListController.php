<?php

namespace App\Controller;

use App\Model\AnnonceModel;
use App\Controller\AbstractController;


class ListController extends AbstractController
{
    public function index()
    {
        $annonceModel = new AnnonceModel();

        //$annonces = $annonceModel->findAll();
        
            //je determine sur quelle page je me trouve 
            if(isset($_GET['p']) && !empty($_GET['p'])) {  // verifie si parametre en Get et verifie pas vide
                $currentPage = $_GET['p']; //si page defini egale numero page
                }else{
                $currentPage = 1;  // sinon si y a rien on dit on est page 1
            }
        
            $nbPageTotals = $annonceModel->countPage();
            $cherchepages = $annonceModel->findbypage($currentPage);
        
        $this->render('list.php', [
            'nbPageTotals' => $nbPageTotals, 
            'cherchepages' => $cherchepages,
            'currentPage' => $currentPage

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
}
    

