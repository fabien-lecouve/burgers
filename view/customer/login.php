<?php 
    $title = "Connection";
    ob_start();
?>

<!-- début container -->
<div class="container">

    <h1 class="h1 mb-3">Connexion</h1>

    <?php
        if(isset($_SESSION["erreur"]))
        {
            echo '<p class="text-danger text-center" style="font-weight: 700;">'.$_SESSION["erreur"].'</p>';
            unset($_SESSION["erreur"]);
        }
        if(isset($_SESSION["message"]))
        {
            echo '<p class="text-success text-center" style="font-weight: 700;">'.$_SESSION["message"].'</p>';
            unset($_SESSION["message"]);
        }
    ?>

    <form class="all_forms" action="./?path=main&action=processingLogin" method="POST">
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Email :</label>
            <input type="text" name="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
        </div>
        <div class="mb-3">
            <label for="exampleInputPassword1" class="form-label">Mot de passe :</label>
            <input type="password" name="password" class="form-control" id="exampleInputPassword1">
        </div>
        <button type="submit" class="btn text-light" id="btn">Se connecter</button>
    </form>

</div>
<!-- fin container -->

<?php 
    $content = ob_get_clean();
    require("view/template.php");
    unset($_SESSION["post"]);
?>