<?php 
    $title = "Ajout nouvel administrateur";
    ob_start();
?>

<!-- début container -->
<div class="container">

    <?php
        if(isset($_SESSION["erreur"]))
        {
            foreach( $_SESSION["erreur"] as $value )
            echo $value . "<br>";
            unset($_SESSION["erreur"]);
        }
    ?>

    <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
        <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
            <h1 class="h2">Ajout nouvel administrateur</h1>
        </div>

        <form class="all_forms" action="./?path=admin&action=processingAdmin" method="POST">
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Prénom :</label>
                <input type="text" value="<?= isset($_SESSION['post']) ? $_SESSION['post']["firstname"]: "" ; ?>" name="firstname" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
            </div>
            <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">Nom :</label>
                <input type="text" value="<?= isset($_SESSION['post']) ? $_SESSION['post']["lastname"]: "" ; ?>" name="lastname" class="form-control" id="exampleInputPassword1">
            </div>
            <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">Email :</label>
                <input type="email" value="<?= isset($_SESSION['post']) ? $_SESSION['post']["email"]: "" ; ?>" name="email" class="form-control" id="exampleInputPassword1">
            </div>
            <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">Mot de passe :</label>
                <input type="password" name="password" class="form-control" id="exampleInputPassword1">
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