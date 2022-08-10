<?php 
    $title = "Modification d'un produit";
    ob_start();
    $objetCategoryManager = new CategoryManager($lePDO);
    $aCategory = $objetCategoryManager->fetchCategoryById($aProductById->getIdCategory());
?>

<!-- début container -->
<div class="container">

    <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
        <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
            <h1 class="h2">Modification d'un produit</h1>
        </div>
        
        <form action="./?path=admin&action=processingUpdateProduct" method="POST">
            <input type="hidden" name="idProduct" value="<?= $aProductById->getIdProduct(); ?>">
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Nom du produit :</label>
                <input type="text" value="<?= $aProductById->getName(); ?>" name="name" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
            </div>
            <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">Description du produit :</label>
                <input type="text" value="<?= $aProductById->getDescription(); ?>" name="description" class="form-control" id="exampleInputPassword1">
            </div>
            <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">Prix du produit :</label>
                <input type="number" value="<?= $aProductById->getUnitPrice(); ?>" min="0" max="10" step="0.01" name="unitPrice" class="form-control" id="exampleInputPassword1">
            </div>
            <div class="mb-3">
            <select class="form-select" name="idCategory" aria-label="Default select example">

                <option selected value="<?= $aCategory->getIdCategory(); ?>"><?= ucfirst($aCategory->getName()); ?></option>

                <?php foreach($allCategories as $category): ?>
                    <?php if ( $category != $aCategory): ?>
                        <option value="<?= $category->getIdCategory(); ?>"><?= ucfirst($category->getName()); ?></option>
                    <?php endif; ?>
                <?php endforeach; ?>

            </select>
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