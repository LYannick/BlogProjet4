<?php $this->titre = 'Jean-Forteroche'; ?>

<main role="main">
  <div id="myCarousel" class="carousel slide container-fluid" data-ride="carousel">
    <ol class="carousel-indicators">
      <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
      <li data-target="#myCarousel" data-slide-to="1"></li>
      <li data-target="#myCarousel" data-slide-to="2"></li>
    </ol>
    <div class="carousel-inner">
      <div class="carousel-item active">
        <img class="first-slide" src="img/alaska.jpg" alt="First slide"/>
        <div class="container">
          <div class="carousel-caption">
            <h1>Jean Forteroche</h1>
              <p>Per hoc minui studium suum existimans Paulus, ut erat in conplicandis negotiis artifex dirus, unde ei Catenae inditum est cognomentum.</p>
          </div>
        </div>
      </div>
      <div class="carousel-item">
        <img class="second-slide" src="img/alaska1.jpg" alt="Second slide"/>
        <div class="container">
          <div class="carousel-caption">
            <h1>Découvrez l'Alaska</h1>
            <p>Altera sententia est, quae definit amicitiam paribus officiis ac voluntatibus. Hoc quidem est nimis exigue et exiliter ad calculos vocare amicitiam.</p>
          </div>
        </div>
      </div>
      <div class="carousel-item">
        <img class="third-slide" src="img/alaska2.jpg" alt="Third slide"/>
        <div class="container">
          <div class="carousel-caption">
            <h1>Et ensuite ?</h1>
            <p>At nunc si ad aliquem bene nummatum tumentemque ideo honestus advena salutatum introieris, primitus tamquam exoptatus suscipieris et interrogatus.</p>
          </div>
        </div>
      </div>
    </div>
    <a class="carousel-control-prev" href="#myCarousel" role="button" data-slide="prev">
      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
      <span class="sr-only">Previous</span>
    </a>
    <a class="carousel-control-next" href="#myCarousel" role="button" data-slide="next">
      <span class="carousel-control-next-icon" aria-hidden="true"></span>
      <span class="sr-only">Next</span>
    </a>
  </div>

  <div class="row container text-center" id="postIndex">
    
    <?php foreach ($billets as $billet): ?>    

      <div class="col-lg-4">
        <div class="card mb-4 shadow-sm">
          <img src="img/alaska3.jpg" alt="Photo de l'Alaska" height="180">
          <div class="card-body">
            <h2><?= $billet['titre'] ?></h2>
            <p class="card-text"><?= substr($billet['contenu'],0,150) ?>...</p>
              <div class="d-flex justify-content-between align-items-center">
                <div class="btn-group">
                  <a href="<?= "index.php?action=billet&id=" . $billet['id'] ?>"><button type="button" class="btn btn-primary">Voir plus</button></a>
                </div>
                <small class="text-muted"><?= $billet['date'] ?></small>
              </div>
          </div>
        </div>
      </div>
  
    <?php endforeach; ?>
  
  </div>
  
  <section class="jumbotron text-center">
    <div class="container">
      <img src="img/auteur.jpg" alt="Photo de Jean-Forteroche" width="550" height="350" id="authorPhoto"/>
      <h2>À propos de l'auteur</h2><br>
      <p>Et eodem impetu Domitianum praecipitem per scalas itidem funibus constrinxerunt, 
         eosque coniunctos per ampla spatia civitatis acri raptavere discursu. iamque artuum 
         et membrorum divulsa conpage superscandentes corpora onere catenarum in modum beluae 
         trahebatur et inimico urgente vel nullo, quasi sufficiente hoc solo, quod nominatus esset 
         aut delatus aut postulatus, capite vel multatione bonorum aut insulari solitudine damnabatur.</p>
    </div>
  </section>
