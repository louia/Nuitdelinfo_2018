<?php

require_once ("autoload.inc.php");

$p=new WebPage("Nuit de l'info", "#FFFFF","str");
$p->appendCssUrl("./css/style.css");
$p->appendContent(<<<HTML

<nav id="nav" class="navbar navbar-dark bg-dark ">
      <a class="navbar-brand" href="#">
      <img src="./img/favicon.png" alt="Fav Icon"> 
      </a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarCollapse">
        <ul class="navbar-nav mr-auto">
          <li class="nav-item active">
            <a class="nav-link" href="#">F.A.Q <span class="sr-only">(current)</span></a>
          </li>
          <li class="nav-item" id="nuit">
            <a class="nav-link disabled " href="404.php">La nuit de l'info  <i class="em em-night_with_stars"></i> </a>
          </li>
        </ul>
        <form class="form-inline mt-2 mt-md-0">
          <input class="form-control mr-sm-2" type="text" placeholder="Search" aria-label="Search">
          <button class="btn btn-outline-info my-2 my-sm-0" type="submit"><i class="fas fa-search"></i></button>
        </form>
      </div>
    </nav>
);

echo $p->toHTML();
