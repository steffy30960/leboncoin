<!doctype html>
<html lang="fr">

<head>
<!-- Required meta tags -->
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">

<!-- Bootstrap CSS -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
<link rel="stylesheet" href="./../../assets/css/list.css">
<title>Annonce</title>
</head>

<body>
<!----------------------navbar---------------------------------->
<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <div class="container-fluid">
    <a class="navbar-brand" href="?page=list">Leboncoin</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <form class="d-flex">
        <input class="form-control me-2" type="search" placeholder="Déposer une annonce" aria-label="Search">
        <button class="btn btn-outline-success" type="submit">Rechercher</button>
      </form>
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="#">Mes recherches</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Favoris</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Messages</a>
        </li>
        <li class="nav-item">
          <a class="nav-link disabled" href="#" tabindex="-1" aria-disabled="true">Se connecter</a>
        </li>
        <li class="nav-item">
          <a class="nav-link disabled" href="?page=admin" tabindex="-1" aria-disabled="true">Admin</a>
        </li>
      </ul>
    </div>
  </div>
</nav>
<!--------------------------fin navbar------------------------->
<!---------------------------card------------------------------>
<div class="d-flex justify-content-center">
  <div class="card text-center mt-3" style="width: 50rem;">
    <img src="<?= $annonce->getImage() ?>" width="400px" height="400px" class="card-img-top" alt="...">
    <div class="card-body">
      <h5 class="card-title"><?= $annonce->getName() ?></h5>
      <p class="card-text"> Description : <?= $annonce->getDescription() ?></p>
      <p class="card-text"> Département : <?= $annonce->getDepartement() ?></p>
      <p class="card-text"> Prix : <?= $annonce->getPrix() ?> euros</p>
      <a href="#" class="btn btn-primary">Acheter</a>
    </div>
  </div>
</div>

<!-------------------fin card------------------------------>  
<!---------------formulaire de réponse a l'annonce------------------------------->
<?php if($result == true): ?>
  <p class="text-center text succes"> message envoyé avec succès</p>
<?php elseif($result === false): ?>
  <p> "Le message n'a pas été envoyé" </p>
<?php endif; ?>
   
  
<div class="d-flex justify-content-center mt-3">
<div class="card" style="width: 50rem;">
<form class="row g-3" method="POST">
<div class="col-md-6">
<label for="message" class="form-label">Votre message :</label>
</div>
<div class="input-group">
  <textarea class="form-control" aria-label="With textarea" name="message" ></textarea>
</div>
<div class="col-12">
    <button type="submit" class="btn btn-primary">Envoyer</button>
  </div>
  
</form>
</div>
</div>
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