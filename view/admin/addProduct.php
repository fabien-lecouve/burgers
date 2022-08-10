<?php 
    $title = "Ajout d'un produit";
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
            <h1 class="h2">Ajout d'un produit</h1>
        </div>
        
        <form class="all_forms" action="./?path=admin&action=processingNewProduct" method="POST">
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Nom du produit :</label>
                <input type="text" name="name" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
            </div>
            <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">Description du produit :</label>
                <input type="text" name="description" class="form-control" id="exampleInputPassword1">
            </div>
            <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">Prix du produit :</label>
                <input type="number" min="0" max="10" step="0.01" name="unitPrice" class="form-control" id="exampleInputPassword1">
            </div>
            <div class="mb-3">
            <select class="form-select" name="idCategory" aria-label="Default select example">
                <option selected>-- Choisissez une catégorie --</option>

                <?php foreach($allCategories as $aCategory): ?>
                    <option value="<?= $aCategory->getIdCategory(); ?>"><?= ucfirst($aCategory->getName()); ?></option>
                <?php endforeach; ?>

            </select>
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