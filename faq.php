<?php

require_once ("autoload.inc.php");

$p=new WebPage("Nuit de l'info", "#FFFFF","img//favicon_trans.png");
$p->appendCssUrl("./css/style.css");

$p->appendContent(<<<HTML

<nav id="nav" class="navbar navbar-expand-lg navbar-light bg-light">
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo01" aria-controls="navbarTogglerDemo01" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarTogglerDemo01">
    <a class="navbar-brand" href="#"><img src="./img/favicon.png" alt="Fav Icon"> <span class="sr-only">(current)</a>

    
    <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
      <li class="nav-item active">
        <a class="nav-link"  href="index.php">La nuit de l'info  <i class="em em-night_with_stars"></i></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="faq.php">F.A.Q</a>
      </li>
    </ul>
    <form class="form-inline my-2 my-lg-0">
      <input class="form-control mr-sm-2" type="search" placeholder="Testez-moi !" aria-label="Search">
      <a href="404.php" class="btn btn-outline-success my-2 my-sm-0" ><i class="fas fa-search"></i></a>
    </form>
  </div>
</nav>

<div class="container" id="faq">

<div class="alert alert-dark mt-5 mb-0" role="alert" style="background-color:#003366;color:lightblue;">
  Comment se sert-on de la boussole? <i class="far fa-compass"></i>
</div>

<div class="alert alert-dark" role="alert" style="background-color:lightblue;color:#003366;">
  Toujours indiquer le nord devant soit !<br>
  Il suffit ensuite de lire l'emplacement de l'aiguille.
</div>

<div class="alert alert-dark mt-4 mb-0" role="alert" style="background-color:#003366;color:lightblue;">
  Et la météo alors ?! <i class="far fa-sun"></i>
</div>

<div class="alert alert-dark" role="alert" style="background-color:lightblue;color:#003366;">
  Votre navigateur diffuse des données sur votre position, <br>
  notre script de la mort qui tue s'occupe ensuite d'afficher la température, l'hygrométrie <br>
  ainsi que la vitesse du vent. Tu remarqueras que dans le dessert il fait chaud. <i class="fas fa-feather"></i>
</div>


<div class="alert alert-dark mt-4 mb-0" role="alert" style="background-color:#003366;color:lightblue;">
  C'est quoi le truc en haut à droite ? <i class="far fa-sun"></i> - J+2
</div>

<div class="alert alert-dark" role="alert" style="background-color:lightblue;color:#003366;">
  Grâce à notre ballon météorologique nous avons une prévision de la météo jusqu'à J+2.
</div>

<div class="alert alert-dark mt-4 mb-0" role="alert" style="background-color:#003366;color:lightblue;">
 Et l'espèce de carte ?
</div>

<div class="alert alert-dark" role="alert" style="background-color:lightblue;color:#003366;">
  C'est effectivement une magnifique carte qui affiche ton emplacement et tout cela sans Google Maps !
</div>

<div class="alert alert-dark mt-4 mb-0 " role="alert" style="background-color:#003366;color:lightblue;">
 c'est qu'il a l'air drôlement bien foutu ton calendrier dis donc !
</div>

<div class="alert alert-dark" role="alert" style="background-color:lightblue;color:#003366;">
 Yep ! c'est une librairie que seule la NASA utilise pour planifier ses envoies de fusée. <i class="fas fa-space-shuttle"></i> <i class="fab fa-rocketchat"></i> <i class="fas fa-rocket"></i>
</div>

</div>

HTML
);

$p->appendCss("

body{

  background-image: url(\"./img/background.jpg\");
  background-repeat:no-repeat;
  background-attachment:fixed;
  height : 100%;
  background-size: cover;
  no-repeat: norepeat;
}
");

echo $p->toHTML();