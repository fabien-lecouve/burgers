<?php 
    $title = $aProductById->getName();
    ob_start(); 
    $objetCategoryManager = new CategoryManager($lePDO);
    $aCategory = $objetCategoryManager->fetchCategoryById($aProductById->getIdCategory());
?>

<!-- début container -->
<div class="container">

    <h1 class="h1 mb-5"><?= ucfirst($aProductById->getName()); ?></h1>

    <div class="row d-flex justify-content-around align-items-center mx-auto col-lg-10 col-md-10 col-sm-12">

        <div class="col col-lg-6 col-md-12 col-sm-12 col-12">
            <img style="width: 90%" src="./public/img/<?= $aProductById->getName(); ?>.png" alt="<?= $aProductById->getName(); ?>">
        </div>

        <div class="col col-lg-6 col-md-12 col-sm-12 col-12">
            <p class="text_description"><?= $aProductById->getDescription(); ?></p>
            <p>Prix : <?= $aProductById->getUnitPrice(); ?>€</p>

        <!-- début du formulaire -->
        <?php if( empty($_SESSION['role']) || $_SESSION['role'] != "customer" ): ?>

            <form novalidate class="form_product" action="./?path=main&action=login" method="post">
            
        <?php else: ?>

            <form class="form_product" action="./?path=customer&action=processingCart" method="post">

        <?php endif; ?>

            <h3 value="<?= $aCategory->getIdCategory(); ?>">Commander <?= $aCategory->getName(); ?> :</h3>
                <input type="hidden" name="idProduct" value="<?= $aProductById->getIdProduct(); ?>">
                <label for="">Quantité :</label>
                <input type="number" value="1" name="quantityProduct" min="0" max="20" required>
                <button class="btn text-light" id="btn">Ajouter au panier</button>
                
            </form>
        <!-- fin du formulaire -->

        </div>

    </div>

</div>
<!-- fin container -->

<?php 
    $content = ob_get_clean();
    require("view/template.php");
?>



