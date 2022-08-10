<?php 
    $title = $aCategory->getName();
    // Enclenche la temporisation de sortie
    ob_start(); 
?>

<!-- début container -->
<div class="container">

    <h1 class="h1 mb-5"><?= ucfirst($aCategory->getName()); ?>s</h1>

    <div class="row d-flex justify-content-center align-items-end">

        <?php foreach( $productsById as $aProduct ): ?>

            <div class="col col-lg-3 col-md-4 col-sm-6 col-12 mb-5">
                <img src="./public/img/<?= $aProduct->getName(); ?>.png" class="card-img-top" alt="<?= $aProduct->getName(); ?>">
                <div class="card-body text-center">
                    <h5 class="card-title"><?= $aProduct->getName(); ?></h5>
                    <a href="./?path=main&action=product&id=<?= $aProduct->getIdProduct(); ?>" class="btn text-light" id="btn">Plus d'informations</a>
                </div>
            </div>

        <?php endforeach; ?>

    </div>

</div>
<!-- fin container -->

<?php 
    // Lit le contenu courant du tampon de sortie puis l'efface
    $content = ob_get_clean();
    require("view/template.php");
?>



