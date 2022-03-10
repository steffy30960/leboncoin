<?php

namespace App\Controller;


use App\Model\AnnonceModel;
use App\Controller\AbstractController;

class AnnonceController extends AbstractController
{
    public function annonce()
    {   
        $annonceModel = new AnnonceModel();
        $annonceId = $_GET['list'];
        // dd($articleId);
        // ma logique métier ici
        // exemple récupérer des données en BDD
        // traiter des formulaire
        // vérifier que l'utilisateur a les droits
        // etc...
        $annonce = $annonceModel->findAll();
        $annonce = $annonceModel->findById($annonceId);
      
      
        $this->render('annonce.php', [
            'annonce' => $annonce

        ]);
  
    }
    
 
}
