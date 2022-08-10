<?php 
    $title = "Connection administrateur";
    ob_start();
?>

<!-- début container -->
<div class="container">

    <h1>Connexion administrateur</h1>
    <?php
        if(isset($_SESSION["erreur"]))
        {
            echo $_SESSION["erreur"];
            unset($_SESSION["erreur"]);
        }

    ?>

    <form class="all_forms" action="./?path=admin&action=processingLoginAdmin" method="POST">
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Email :</label>
            <input type="text" name="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
        </div>
        <div class="mb-3">
            <label for="exampleInputPassword1" class="form-label">Mot de passe :</label>
            <input type="password" name="password" class="form-control" id="exampleInputPassword1">
        </div>
        <button type="submit" class="btn btn-primary">Se connecter</button>
    </form>

</div>
<!-- fin container -->

<?php 
    $content = ob_get_clean();
    require("view/template.php");
    unset($_SESSION["post"]);
?>