<?php

require_once '../class_php/webpage.class.php';

$list_element;

$page = new WebPage("Checklist");

$page->appendContent(<<<BODY
<p>Checklist</p>
<div class="list-items">
  <div class="item">
    <input type="checkbox">
    <label for="">Bilan de santé</label>
    <span><i class="fas fa-medkit"></i></span>
  </div>
  <div class="item">
    <input type="checkbox">
    <label for="">Entretien des matériels</label>
    <span><i class="fas fa-wrench"></i></span>
  </div>
  <div class="item">
    <input type="checkbox">
    <label for="">Vérifications et maintenance des systèmes de survie</label>
    <span><i class="fas fa-cogs"></i></span>
  </div>
  <div class="item">
    <input type="checkbox">
    <label for="">Contrôle du camp</label>
    <span><i class="fas fa-eye"></i></span>
  </div>
</div>
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.4.1/css/all.css">
BODY
);

$page->appendCss(<<<CSS
  @import url("https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css");
  @import url('https://fonts.googleapis.com/css?family=Chakra+Petch');
  body{
    margin:0;
    padding:0;
    display:flex;
    justify-content:center;
    align-items:center;
    flex-direction:column;
    height:100vh;
    font-family: 'Chakra Petch', sans-serif;
  }

  .list-items{
    width:350px;
    height:auto;
    background-image: linear-gradient(25deg, #26035c, #2e0c78, #341897, #3624b7, #3131d8);
    border-radius:10px;
    box-shadow:0px 5px 35px #000;
  }
  .item{
    width:100%;
    height:50px;
    border-top:1px solid rgba(0,0,0,.4);
    display:grid;
    grid-template-columns:1fr 6fr 1fr;
    align-items:center;
    position:relative;
    overflow:hidden;
  }
  .item input[type="checkbox"],.item span{
    margin:auto;
  }
  .item label, .item span{
    color:rgba(255,255,255,.4);
    transition:.3s all;
  }
  .item input[type="checkbox"]{
    -webkit-appearance:none;
    height:15px;
    width:15px;
    border-radius:3px;
    border:2px solid rgba(255,255,255,.4);
    outline:none;
    display:flex;
    justify-content:center;
    align-items:center;
    transition:.2s all;
    cursor:pointer;
    z-index:2;
  }

  .item input[type="checkbox"]:before{
    content:'\f00c';
    position:absolute;
    font-family:fontAwesome;
    font-size:10px;
    color:aqua;
    opacity:0;
  }

  .item input[type="checkbox"]:checked:before{
    opacity:1;
  }
  .item input[type="checkbox"]:checked{
    border:2px solid aqua;
    box-shadow:0px 0px 5px aqua;
  }
  .item input[type="checkbox"]:checked ~ label{
    color:#Fff;
  }
  .item input[type="checkbox"]:checked ~ span{
    color:aqua;
    animation: animation .5s;
  }
  .item input[type="checkbox"]:hover{
    transform:scale(1.4);
  }
  .item label:before{
    content:'';
    position:absolute;
    width:200px;
    height:100%;
    transform:skew(35deg);
    left:-140px;
    background:rgba(0,0,0,.1);
    transition:.5s all;
  }
  .item input[type="checkbox"]:checked ~ label:before{
    left:120%;
  }
  @keyframes animation{
    0%{
      opacity:0;
      transform:scale(0.1) rotate(30deg);
    }
    50%{
      transform:rotate(-10deg);
    }
    75{
      transform:rotate(3deg);
    }
    100%{
      opacity:1;
      transform:scale(1);
    }
  }

  p{
    font-size:40px;
    color: #003366;
    animation: animationTitle 5s infinite;
  }
  @keyframes animationTitle {
    from,
    11.1%,
    to {
      text-shadow:0px 0px 5px rgba(0,255,255,.2);
    }

    22.2% {
      text-shadow:0px 0px 5px rgba(0,255,255,.9);
    }

    33.3% {
     text-shadow:0px 0px 5px rgba(0,255,255,.2);
    }

    44.4% {
     text-shadow:0px 0px 5px rgba(0,255,255,.9);
    }

    55.5% {
     text-shadow:0px 0px 5px rgba(0,255,255,.2);
    }

    66.6% {
     text-shadow:0px 0px 5px rgba(0,255,255,.9);
    }

    77.7% {
      text-shadow:0px 0px 5px rgba(0,255,255,.2);
    }

    88.8% {
     text-shadow:0px 0px 5px rgba(0,255,255,.9);
    }
  }
CSS
);

echo $page->toHTML();
