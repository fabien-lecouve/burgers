<?php 
    $title = "Panier";
    ob_start(); 
?>

<!-- début container -->
<div class="container">

    <h1 class="h1">Panier</h1>
    <?php 
    if(isset($_SESSION["message"])){
        echo '<p class="text-success text-center">'.$_SESSION["message"].'</p>';
        unset($_SESSION["message"]);
    }
    ?>

    <table class="table table-striped">
        <thead>
            <tr>
                <th>Nom</th>
                <th class="text-center">Quantité</th>
                <th class="text-center">Prix unitaire</th>
                <th class="text-center">Prix total</th>
            </tr>
        </thead>
        <tbody>

        <?php $result = 0;
            if( isset($_SESSION["panier"])):
                for( $i = 0; $i < count($_SESSION["panier"]); $i++ ):
                    $aProductById = $objetProductManager->fetchProductById($_SESSION["panier"][$i][0]);
        ?>
            <tr>
                <td><?= $aProductById->getName(); ?></td>
                <td class="text-center"><?= $_SESSION["panier"][$i][1]; ?></td>
                <td class="text-center"><?= $aProductById->getUnitPrice(); ?>€</td>
                <td class="text-center"><?= $totalByProduct = $_SESSION["panier"][$i][1] * $aProductById->getUnitPrice(); ?>€</td>
            </tr>
        <?php $result += $totalByProduct;
                endfor;
            endif;
        ?>

        </tbody>
        <tfoot>
            <tr class="ligne_total">
                <td>Total commande :</td>
                <td></td>
                <td></td>
                <td class="text-center"><?= $result; ?>€</td>
            </tr>
        </tfoot>
    </table>
    
    <form action="./?path=customer&action=validCart" method="POST">
        <input type="hidden" name="totalCommand" value="<?php echo $result; ?>">
        <button class="btn text-light" id="btn">Valider panier</button>
    </form>

</div>
<!-- fin container -->

<?php 
    $content = ob_get_clean();
    require("view/template.php");
?>