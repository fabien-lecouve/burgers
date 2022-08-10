<?php 
    $title = "Inscription";
    ob_start();
?>

<!-- début container -->
<div class="container">

    <h1 class="h1">Inscription</h1>
    <?php
        if(isset($_SESSION["erreur"]))
        {
            foreach( $_SESSION["erreur"] as $value )
            {
                echo '<p class="text-danger text-center" style="font-weight: 700;">'.$value.'</p>';
            }
            unset($_SESSION["erreur"]);
        }
    ?>

    <form  class="all_forms mb-5" action="./?path=main&action=processingRegistration" method="POST">
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
        <div class="mb-3">
            <label for="exampleInputPassword1" class="form-label">Adresse :</label>
            <input type="text" value="<?= isset($_SESSION['post']) ? $_SESSION['post']["address"]: "" ; ?>" name="address" class="form-control" id="exampleInputPassword1">
        </div>
        <div class="mb-3">
            <label for="exampleInputPassword1" class="form-label">Ville :</label>
            <input type="text" value="<?= isset($_SESSION['post']) ? $_SESSION['post']["city"]: "" ; ?>" name="city" class="form-control" id="exampleInputPassword1">
        </div>
        <div class="mb-3">
            <label for="exampleInputPassword1" class="form-label">Code Postal :</label>
            <input type="number" value="<?= isset($_SESSION['post']) ? $_SESSION['post']["postalCode"]: "" ; ?>" name="postalCode" class="form-control" id="exampleInputPassword1">
        </div>
        <button type="submit" class="btn text-light" id="btn">S'enregistrer</button>
    </form>

</div>
<!-- fin container -->

<?php 
    $content = ob_get_clean();
    require("view/template.php");
    unset($_SESSION["post"]);
?>