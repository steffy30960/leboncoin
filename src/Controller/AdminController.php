<?php

namespace App\Controller;

use App\Model\AdminModel;
use App\Controller\AbstractController;


class AdminController extends AbstractController
{
    public function index()
    {
        $adminModel = new AdminModel();

        $annonces = $adminModel->findAll();

        $this->render('admin.php', [
        'annonces' => $annonces

    ]);
    }
    public function add()
    {
        $adminModel = new AdminModel();

        // je récupère le name depuis le formulaire
        if (isset($_POST['name'])) {
            $name= trim($_POST['name']);
            $prix= trim($_POST['prix']);
            $description= trim($_POST['description']);
            $date_de_parution= new \Datetime();
            $categorie= trim($_POST['categorie']);
            $departement= trim($_POST['departement']);
            $image= trim($_POST['image']);
        }



        if (!empty($name)) {
            // je crée
            $adminModel = new AdminModel();
            $annonce_id = $adminModel->add($name, $prix, $description, $date_de_parution, $categorie, $image, $departement);
        }
    }

    public function delete()
    {
        $adminModel = new AdminModel();

        if (isset($_GET['id'])) {
            $id = $_GET['id'];
        }

        $result = $adminModel->delete($id);

        header('Location: ?page=admin');
    }

    public function update()
    {
        $adminModel = new AdminModel();


        
        // je récupère l id depuis le formulaire
        if (isset($_POST['name'])) {
            $name= trim($_POST['name']);
            $prix= trim($_POST['prix']);
            $description= trim($_POST['description']);
            $date_de_parution= $_POST['date_de_parution'];
            $categorie= trim($_POST['categorie']);
            $departement= trim($_POST['departement']);
            if (isset($_POST['name'])) {
                $image= trim($_POST['name']);
            }
        }    
        //je verifie  et regarde si pas vide
if (isset($_POST['name'])) {
    if (isset($_POST ['name']) && (!empty($_POST['name'])) &&
        isset($_POST ['prix']) && (!empty($_POST['prix'])) &&
        isset($_POST ['description']) && (!empty($_POST['description'])) &&
        isset($_POST ['date_de_parution']) && (!empty($_POST['date_de_parution'])) &&
        isset($_POST ['categorie']) && (!empty($_POST['categorie'])) &&
        isset($_POST ['departement']) && (!empty($_POST['departement'])) &&
        isset($_FILES ['image']) && (!empty($_FILES['image']))) 
    // je modifie
    $adminModel = new AdminModel();

            $id = $_GET['id'];
            $adminModel->update($id, $name, $prix, $description, $date_de_parution, $categorie, $image, $departement);
            }
       
            $annonce = $adminModel->findById($_GET['id']);
            
            $this->render('formulairemodification.php', [
                'annonce' => $annonce,
            
        ]);
        
        }
      
    }
