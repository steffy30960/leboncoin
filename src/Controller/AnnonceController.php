<?php

namespace App\Controller;


use App\Model\AnnonceModel;
use App\Controller\AbstractController;

class AnnonceController extends AbstractController
{
    public function annonce()
    {   
        $annonceModel = new AnnonceModel();
        if (isset ($_GET['list'])) {
            $annonce = $annonceModel->findById($_GET['list']);
        }
        else {
            $annonce = $annonceModel->findAll();
        }

       
        $this->render('annonce.php', [
            'annonce' => $annonce,
            
        ]);
        
    }
    
 
}
