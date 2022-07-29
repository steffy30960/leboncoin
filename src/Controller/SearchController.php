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
              // je récupère le name depuis le formulaire
        if (isset($_POST['name'])) {
            $name= trim($_POST['name']);
          
        }
        else {
            $name='';
          
        }   
            
            $annonces = $annonceModel->search($name);
        
        $this->render('searchformulaire.php', [
            'annonces' => $annonces

        ]);
  
    }
    

}
    