<?php

// Je démarre une session pour pouvoir utiliser la super globale $_SESSION sur l'ensemble de mes pages concernées
session_start();

// Je récupère la page servant à la connexion à la base de données
require("model/bdd.php");

// Je stocke la fonction me servant à la connection à la base de données dans une variable qui me servira dans mes class
$lePDO = connectToBdd();

// J'injecte dans l'URL des clés dont les valeurs me serviront à définir le chemin entre mes différentes pages
if(!isset($_GET['path']))
{
    $path = "main";
}
else
{
    $path = filter_var($_GET['path'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
}


// En fonction du chemin choisi, je redirige vers la page controller appropriée
switch($path)
{
    case "main":
        require("controller/controller.php");
        break;

    case "customer":
        if($_SESSION["role"] == "customer")
        {
            require("controller/customerController.php");
            break;
        }
        else
        {
            require("view/error404.php");
            break;
        }
        

    case "admin":
        if($_SESSION["role"] == "admin")
        {
            require("controller/adminController.php");
            break;
        }
        else
        {
            require("view/error404.php");
            break;
        }
    
    default:
        require("view/error404.php");
        break;
}

?>