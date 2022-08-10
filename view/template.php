<!doctype html>
<html lang="en">
    <head>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <!-- Lien Google Font -->
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&family=Source+Serif+Pro:wght@400;700&display=swap" rel="stylesheet">

        <!-- Lien font awesome -->
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css" integrity="sha384-DyZ88mC6Up2uqS4h/KRgHuoeGwBcD4Ng9SiP4dIRy0EXTlnuz47vAwmeGwVChigm" crossorigin="anonymous">

        <!-- Bootstrap CSS -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">

        <!-- Lien CSS -->
        <link rel="stylesheet" href="./public/css/style.css">

        <!-- Description du site -->
        <meta name="description" content="Burger King, parfois abrégé en son acronyme BK, est une grande chaîne de restauration rapide américaine qui compte plus de 13 000 lieux de vente dans 88 pays, dont les deux tiers aux États-Unis, et beaucoup au Canada. En Australie, les trois cents restaurants Burger King portent le nom de Hungry Jack's. Le siège social de Burger King est situé à 5505 Blue Lagoon Drive, Miami-Dade County, en Floride, près de Miami, le lieu d'origine du restaurant. Burger King est, depuis 2014, une filiale de la société canadienne Tim Hortons du groupe Restaurant Brands International basée à Toronto.">

        <!-- Mots clés pour le référencement -->
        <meta name="keywords" content="burger king burger queen fast-food">

        <title><?= $title; ?></title>
    </head>
    <body>
            
        <?php include('menu.php'); ?>

        <?= $content; ?>
        
        <?php include('footer.php'); ?>