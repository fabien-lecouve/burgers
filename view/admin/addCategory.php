<?php 
    $title = "Ajout d'une catégorie";
    ob_start();
?>

<!-- début container -->
<div class="container">

    <?php 
    if(isset($_SESSION["message"])){
        echo $_SESSION["message"];
        unset($_SESSION["message"]);
    }
    ?>

    <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
        <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
            <h1 class="h2">Ajout d'une catégorie</h1>
        </div>

        <form class="all_forms" action="./?path=admin&action=processingNewCategory" method="POST">
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Nom de la catégorie :</label>
                <input type="text" name="name" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
            </div>
            <button type="submit" class="btn btn-dark">Ajouter</button>
        </form>
    </main>

    

</div>
<!-- fin container -->

<?php 
    $content = ob_get_clean();
    require("view/templateAdmin.php");
?>