<!doctype html>
<html lang="fr">

<head>
<!-- Required meta tags -->
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">

<!-- Bootstrap CSS -->
  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous" />
  <link rel="stylesheet" href="assets/css/list.css" />
  <title>Leboncoin</title>
  
</head>

<body>
<!----------------------navbar---------------------------------->
<nav class="navbar navbar-expand-lg navbar-light bg-light mb-3">
  <div class="container-fluid">
    <a class="navbar-brand text-warning" href="?page=list">Leboncoin</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
</nav>
<!----------------------------------fin navbar------------------------>

<H1 class="text-center my-3">Toutes les annonces</H1>
    <?php foreach ($annonces as $annonce) : ?>
      <div class="inline">    
        <img src="<?= $annonce->getImage() ?>" alt="image du produit"> 
          <p>id = <?= $annonce->getId() ?></p>
          <p><?= $annonce->getName().''?></p>      
          <p><?= $annonce->getDescription() ?></p>
          <p><?= $annonce->getDepartement() ?></p>
          <p><?= $annonce->getDate_de_parution() ?></p>
          <p><?= $annonce->getPrix() ?> euros</p>
         <div class="center"> 
          <a href="?page=createAnnonce" class="btn btn-primary">Ajouter</a>
          <a href="?id=<?= $annonce->getId()?>&page=delete"class="btn btn-primary">Supprimer</a>
          <a href="?page=update&id=<?= $annonce->getId()?> "class="btn btn-primary">Modifier</a>
        </div>
      </div>
        <?php endforeach ?>
        



    <!-- Optional JavaScript; choose one of the two! -->

<!-- Option 1: Bootstrap Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

<!-- Option 2: Separate Popper and Bootstrap JS -->
<!--
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
-->
</body>

</html>        