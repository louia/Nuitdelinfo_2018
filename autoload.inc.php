<?php
// Niveau d'erreur maximal pour développer
error_reporting(E_ALL | E_STRICT) ;
// Fuseau horaire par défaut pour ne pas avoir de problème avec les fonctions sur dates
date_default_timezone_set('Europe/Paris') ;

// Tentative de chargement magique du fichier contenant la classe non définie
spl_autoload_register(function ($nom_classe /** Nom de la classe dont la définition manque */) {
    // Nom du fichier = nom_de_la_classe.class.php
    $fichier = strToLower($nom_classe).'.class.php' ;
    // Existe ?
    if (file_exists($fichier))
        // Oui : l'inclure
        require_once($fichier) ;
    // Pour être compatible avec le système de gestion des corrections
    if (file_exists('../' . $fichier))
        // Oui : l'inclure
        require_once($fichier) ;
    if (file_exists('class_php/' . $fichier))
        // Oui : l'inclure
        require_once('class_php/' . $fichier) ;
        }
) ;