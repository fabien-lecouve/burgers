<?php 
    $title = "Commande";
    ob_start(); 
?>

<!-- début container -->
<div class="container">

    <h1 class="h1">Mes commandes</h1>
    <?php 
    if(isset($_SESSION["message"])){
        echo $_SESSION["message"];
        unset($_SESSION["message"]);
    }
    ?>

    <div class="row d-flex justify-content-center">

        <?php foreach( $allCommands as $aCommand ): ?>
            <div class="command col col-12 col-lg-5 col-md-5 col-sm-12 mx-3 mt-3 p-3">
                <h4>Commande délivrée le <?= date("d/m/y à H:i", strtotime($aCommand->getDateCommand())); ?></h4>

                <?php $commandLines = $objetProductManager->fetchAllProductsByIdCommand( $aCommand->getIdCommand() ); ?>

                <ul>
                    <?php foreach( $commandLines as $aLine ): ?>
                        <li><?= $aLine->quantityProduct; ?> <?= $aLine->getName(); ?></li>
                    <?php endforeach; ?>
                </ul>

                <p>Total commande : <?= $aCommand->getTotalCommand(); ?>€</p>
            </div>
        <?php endforeach; ?>
        
    </div>

</div>
<!-- fin container -->

<?php 
    $content = ob_get_clean();
    require("view/template.php");
?>