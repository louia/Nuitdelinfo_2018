<?php

require_once ("autoload.inc.php");

$p=new WebPage("Nuit de l'info", "#FFFFF","str");
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
        <a class="nav-link"  href="./404.php">La nuit de l'info  <i class="em em-night_with_stars"></i></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="faq.php">F.A.Q</a>
      </li>
    </ul>
    <form class="form-inline my-2 my-lg-0">
      <input class="form-control mr-sm-2" type="search" placeholder="Teste-moi !" aria-label="Search">
      <button class="btn btn-outline-success my-2 my-sm-0" onclick="window.location.href='./404.php'"><i class="fas fa-search"></i></button>
    </form>
  </div>
</nav>
HTML
);


echo $p->toHTML();


