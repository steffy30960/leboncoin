<!doctype html>
<html lang="fr">

<head>
<!-- Required meta tags -->
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">

<!-- Bootstrap CSS -->
  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous" />
  <link rel="stylesheet" href="assets/css/list.css">
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
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <div class="col-auto">
      <a  class="btn btn-warning" href="?page=createAnnonce" >Déposer une annonce</a>
        </div>
        
    <form class="d-flex"method="POST" action="?page=search">
       
    
        <div class="col-auto">
        <a class="btn" href="?page=search">Rechercher</a>
        </div>
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

<!---------------------------card------------------------------>
<H1 class="text-center my-3">Toutes nos annonces</H1>
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
                    <p class="card-text"><?= $annonce->getDepartement() ?></p>
                </div>
            </div>
        <?php endforeach ?>
    </div>
  <!---------------------------fin card------------------------------>  
  <?php if (ceil($total_pages / $num_results_on_page) > 0): ?>
			<ul class="pagination">
				<?php if ($page > 1): ?>
				<li class="prev"><a href="pagination.php?page=<?php echo $page-1 ?>">Prev</a></li>
				<?php endif; ?>

				<?php if ($page > 3): ?>
				<li class="start"><a href="pagination.php?page=1">1</a></li>
				<li class="dots">...</li>
				<?php endif; ?>

				<?php if ($page-2 > 0): ?><li class="page"><a href="pagination.php?page=<?php echo $page-2 ?>"><?php echo $page-2 ?></a></li><?php endif; ?>
				<?php if ($page-1 > 0): ?><li class="page"><a href="pagination.php?page=<?php echo $page-1 ?>"><?php echo $page-1 ?></a></li><?php endif; ?>

				<li class="currentpage"><a href="pagination.php?page=<?php echo $page ?>"><?php echo $page ?></a></li>

				<?php if ($page+1 < ceil($total_pages / $num_results_on_page)+1): ?><li class="page"><a href="pagination.php?page=<?php echo $page+1 ?>"><?php echo $page+1 ?></a></li><?php endif; ?>
				<?php if ($page+2 < ceil($total_pages / $num_results_on_page)+1): ?><li class="page"><a href="pagination.php?page=<?php echo $page+2 ?>"><?php echo $page+2 ?></a></li><?php endif; ?>

				<?php if ($page < ceil($total_pages / $num_results_on_page)-2): ?>
				<li class="dots">...</li>
				<li class="end"><a href="pagination.php?page=<?php echo ceil($total_pages / $num_results_on_page) ?>"><?php echo ceil($total_pages / $num_results_on_page) ?></a></li>
				<?php endif; ?>

				<?php if ($page < ceil($total_pages / $num_results_on_page)): ?>
				<li class="next"><a href="pagination.php?page=<?php echo $page+1 ?>">Next</a></li>
				<?php endif; ?>
			</ul>
			<?php endif; ?>




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
<?php
	$stmt->close();

?>