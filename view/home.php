<?php 
    $title = 'Accueil';
    ob_start(); 
?>

<!-- début container -->
<div class="container">

<?php if ( isset($_SESSION['firstname'])): ?>
    <?php if($_SESSION["role"] == "customer"): ?>

        <h1 class="h1">Bienvenue <?= ucfirst(strtolower($_SESSION['firstname'])); ?></h1>

    <?php else: ?>

        <h1 class="h1">Bienvenue <?= ucfirst(strtolower($_SESSION['firstname'])); ?>, vous êtes dans la partie administration</h1>

    <?php endif; ?>

<?php else: ?>

    <h1 class="h1">Bienvenue</h1>

<?php endif; ?>

    <div class="text-center mt-5">
        <p>Choisissez votre thème :</p>
        <select name="" id="theme">
            <option id="bk" value="burgerKing">Burger King</option>
            <option id="bq" value="burgerQueen">Burger Queen</option>
        </select>
    </div>

</div>
<!-- fin container -->

<?php 
    $content = ob_get_clean();
    require("view/template.php");
?>



