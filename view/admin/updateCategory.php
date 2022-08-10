<?php 
    $title = "Modification d'une catégorie";
    ob_start();
?>

<!-- début container -->
<div class="container">

    <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
        <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
            <h1 class="h2">Modification d'une catégorie</h1>
        </div>
        
        <form action="./?path=admin&action=processingUpdateCategory" method="POST">
            <input type="hidden" name="idCategory" value="<?= $aCategory->getIdCategory(); ?>">
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Nom du produit :</label>
                <input type="text" value="<?= $aCategory->getName(); ?>" name="name" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
            </div>
            <button type="submit" class="btn btn-dark">Modifier</button>
        </form>
    </main>

</div>
<!-- fin container -->

<?php 
    $content = ob_get_clean();
    require("view/templateAdmin.php");
?>