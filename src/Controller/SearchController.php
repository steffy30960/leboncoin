<?php

namespace App\Controller;


use PDO;
use App\Model\AnnonceModel;
use App\Controller\AbstractController;

class SearchController extends AbstractController
{


    public function index()
    {
        $annonceModel = new AnnonceModel();
        // je récupère le name , la categorie et le departement depuis le formulaire,
        if (isset($_GET['name'])){//|| isset($_GET['departement'])) { //|| isset($_POST['departement']) || isset($_POST['categorie'])){
            $name = trim($_GET['name']);
            //$departement= trim($_GET['departement']);
            //$categorie= trim($_POST['categorie']);
        } else {
            $name = '';
            //$departement='';
            //$categorie='';
        }

      
            $annonces = $annonceModel->search($name);

        $this->render('searchformulaire.php', [
            'annonces' => $annonces

        ]);
    }
}
