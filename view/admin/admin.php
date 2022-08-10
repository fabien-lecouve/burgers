<?php 
    $title = "Administration";
    ob_start(); 
?>

<!-- début container -->
<div class="container">

    <!-- <h1>Administration</h1> -->

    <?php 
    if(isset($_SESSION["message"])){
        echo $_SESSION["message"];
        unset($_SESSION["message"]);
    }
    ?>

    <!-- <div class="row text-center">
        <div class="col">
            <h4>Gestion des produits</h4>
            <a class="btn btn-success" href="./?path=admin&action=addProduct">Ajouter un produit</a>
            <a class="btn btn-warning" href="./?path=admin&action=manageProduct">Gérer les produits</a>
        </div>
        <div class="col">
            <h4>Gestion des catégories</h4>
            <a class="btn btn-success" href="./?path=admin&action=addCategory">Ajouter une catégorie</a>
            <a class="btn btn-warning" href="./?path=admin&action=manageCategory">Gérer les catégories</a>
        </div>
        <div class="col">
            <h4>Gestion des clients et des administrateurs</h4>
            <a class="btn btn-warning" href="./?path=admin&action=manageCustomer">Gérer les clients</a>
            <a class="btn btn-success" href="./?path=admin&action=addAdmin">Ajouter un administrateur</a>
            <a class="btn btn-warning mt-1" href="./?path=admin&action=manageAdmin">Gérer les administrateurs</a>
        </div>
    </div> -->

    <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
        <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
            <h1 class="h2">Administration</h1>
        </div>
    </main>

    

</div>
<!-- fin container -->

<?php 
    $content = ob_get_clean();
    require("view/templateAdmin.php");
    unset($_SESSION["post"]);
?>