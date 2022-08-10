<?php

/**
 * Fonction qui se connecte à la base de données
 *
 * @return void
 */
function connectToBdd()
{
    $urlSGBD = "localhost";
    $nameBDD = "burgers";
    $loginBDD = "root";
    $pwdBDD = "";

    try
    {
        // On tente d'établir la connexion à la base de données en créant une nouvelle instance de la class PDO obtenue avec la méthode construct
        // On rentre en paramètres le DSN Data Source Name, l'utilisateur, le mot de passe et un array avec les options de connexion

        $connexion = new PDO("mysql:host=$urlSGBD; dbname=$nameBDD", "$loginBDD", "$pwdBDD", array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8'));
    }
    catch( PDOException $error)
    {
        echo "Il y a un problème de connexion à la base de données<br>";
        echo $error->getMessage();
    }
    return $connexion;
    // var_dump($connexion);
}


?>