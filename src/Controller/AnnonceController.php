<?php

namespace App\Controller;


use App\Model\AnnonceModel;
use App\Model\MessageModel;
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
        


        $messageModel = new MessageModel();
        // je recupere l'id de la page concernant l'article
        if (isset ($_GET['list'])) {
            $id = $_GET['list'];
        }
        // je recupere le message  et l'article_id depuis le formulaire
        // $articlesId = $_POST['articlesId'];
        
        if (isset($_POST['message'])) {
            $message = $_POST['message'];
    
            $result = $messageModel->save($message,$id);
          
        }
        $this->render('annonce.php', [
            'annonce' => $annonce,
            'result' => $result ?? null

        ]);
    }
}
