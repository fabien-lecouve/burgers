<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.88.1">
    <title><?= $title; ?></title>

    <!-- Lien font awesome -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css" integrity="sha384-DyZ88mC6Up2uqS4h/KRgHuoeGwBcD4Ng9SiP4dIRy0EXTlnuz47vAwmeGwVChigm" crossorigin="anonymous">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">

    <style>
        .bd-placeholder-img {
            font-size: 1.125rem;
            text-anchor: middle;
            -webkit-user-select: none;
            -moz-user-select: none;
            user-select: none;
        }

        @media (min-width: 768px) {
            .bd-placeholder-img-lg {
                font-size: 3.5rem;
            }
        }
    </style>


    <!-- Lien CSS -->
    <link href="./public/css/dashboard.css" rel="stylesheet">
</head>

<body>

    <header class="navbar navbar-dark sticky-top bg-dark flex-md-nowrap p-0 shadow">
        <a class="navbar-brand text-center col-md-3 col-lg-2 me-0 px-3" href="./?path=main&action=home">Vers le site</a>
        <button class="navbar-toggler position-absolute d-md-none collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#sidebarMenu" aria-controls="sidebarMenu" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <input class="form-control form-control-dark w-100" type="text" placeholder="Search" aria-label="Search">
        <div class="navbar-nav">
            <div class="nav-item text-nowrap">
                <a class="nav-link px-3" href="./?path=main&action=logout">Se déconnecter</a>
            </div>
        </div>
    </header>

    <div class="container-fluid">
        <div class="row">
            <nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse text-center">
                <div class="position-sticky pt-3">
                    <h4 class="mt-5">Produits</h4>
                    <ul class="nav flex-column mb-5">
                        <li class="nav-item">
                            <a class="nav-link" href="./?path=admin&action=addProduct">Ajouter un produit</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="./?path=admin&action=manageProduct">Gérer les produits</a>
                        </li>
                    </ul>
                    <h4>Catégories</h4>
                    <ul class="nav flex-column mb-5">
                        <li class="nav-item">
                            <a class="nav-link" href="./?path=admin&action=addCategory">Ajouter une catégorie</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="./?path=admin&action=manageCategory">Gérer les catégories</a>
                        </li>
                    </ul>
                    <h4>Utilisateurs</h4>
                    <ul class="nav flex-column">
                        <li class="nav-item">
                            <a class="nav-link" href="./?path=admin&action=manageCustomer">Gérer les clients</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="./?path=admin&action=addAdmin">Ajouter un administrateur</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="./?path=admin&action=manageAdmin">Gérer les administrateurs</a>
                        </li>
                    </ul>
                </div>
            </nav>

            <?= $content; ?>

        </div>
    </div>

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-/bQdsTh/da6pkI1MST/rWKFNjaCP5gBSY4sEBT38Q/9RBh9AH40zEOg7Hlq2THRZ" crossorigin="anonymous"></script>

</body>

</html>