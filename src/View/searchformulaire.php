<!doctype html>
<html lang="fr">

<head>
<!-- Required meta tags -->
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">

<!-- Bootstrap CSS -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
<link rel="stylesheet" href="assets/css/list.css">
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
        <input class="form-control me-2" type="search" placeholder="Rechercher une annonce" aria-label="Search">
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
      </ul>
    </div>
  </div>
</nav>
<!--------------------------fin navbar------------------------->
<!--------------------------formulaire------------------------->
<h1 class="text-center">Rechercher un article</h1>
  <div class=" ms-3 my-3">
    <form method="POST">
      <div class="col-sm-3 my-3">
        <select class="custom-select mr-sm-2" id="inlineFormCustomSelect">
                <option selected>Catégorie</option>
                <option value="1">Ameublement</option>
                <option value="2">Animaux</option>
                <option value="7">Bijou</option>
                <option value="7">Electroménager</option>
                <option value="3">Enfant</option>
                <option value="4">Maison</option>
                <option value="5">Mode</option>
                <option value="7">Moto</option>
                <option value="6">Téléphonie</option>
                <option value="7">Véhicule</option>
               
                
        </select>
      </div>
      <div class="form-row align-items-center">
        <div class="col-sm-3 my-3">
          <input type="text" class="form-control" id="inlineFormInputName" placeholder= "Que recherchez vous ?" name ="name">
        </div>
        </div>
          <button type="submit" class="btn btn-primary my-3">Rechercher</button>
        </div>
      </div>
    </form> 
  </div>
 
<!--------------------------fin formulaire ------------------------->
<!---------------------------card------------------------------>
<div class=" ms-3 my-3">
    <div class="row row-cols-1 row-cols-md-3 g-4">
        <?php foreach ($annonces as $annonce) : ?>
            <div class="card">
              <img src="<?= $annonce->getImage() ?>" alt=""> 
                <div class="card-body">
                    <h5 class="card-title"><a href="?page=annonce&list=<?= $annonce->getId() ?>">
                      <?= $annonce->getName() ?>
                      </a>
                    </h5>
                      <p class="card-text"><?= $annonce->getDescription() ?></p>
                </div>
            </div>
        <?php endforeach ?>
    </div>
</div>  
   
  <!---------------------------fin card------------------------------>  
<!-- Option 1: Bootstrap Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

<!-- Option 2: Separate Popper and Bootstrap JS -->
<!--
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
-->
</body>

</html>