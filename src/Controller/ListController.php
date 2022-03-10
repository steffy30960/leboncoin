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
        // ma logique métier ici
        // exemple récupérer des données en BDD
        // traiter des formulaire
        // vérifier que l'utilisateur a les droits
        // etc...
     
        $this->render('list.php', [
            'annonces' => $annonces
        ]);
    }

    public function create()
    {
        $annonceModel = new AnnonceModel();

        // je récupère le name depuis le formulaire
        $annonce_name = trim($_POST['annonce_name']);

        if (!empty($annonce_name)) {
            // je crée
            $annonceModel = new AnnonceModel();
            $annonce_id = $annonceModel->create($annonce_name);
        }    

        header('Location:http://localhost/leboncoin/list.php');
        exit();
    }

}