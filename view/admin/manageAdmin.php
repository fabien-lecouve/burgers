<?php 
    $title = "Gestion des administrateurs";
    ob_start(); 
?>

<!-- début container -->
<div class="container">
    
    <?php 
    if(isset($_SESSION["message"])){
        echo $_SESSION["message"];
        unset($_SESSION["message"]);
    }
    ?>

    <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
        <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
            <h1 class="h2">Gestion des administrateurs</h1>
        </div>

        <table class="table table-striped">
            <thead>
                <tr>
                    <th>Id Administrateur</th>
                    <th>Prénom</th>
                    <th>Nom</th>
                    <th>Email</th>
                    <th>Gestion</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach($allAdmins as $aAdmin): ?>
                <tr>
                    <td><?= $aAdmin->getIdAdmin(); ?></td>
                    <td><?= ucfirst($aAdmin->getFirstname()); ?></td>
                    <td><?= strtoupper($aAdmin->getLastname()); ?></td>
                    <td><?= $aAdmin->getEmail(); ?></td>
                    <td>
                        <form action="./?path=admin&action=deleteAdmin" method="POST">
                            <input type="hidden" name="idAdmin" value="<?= $aAdmin->getIdAdmin(); ?>">
                            <input type="hidden" name="lastname" value="<?= $aAdmin->getLastname(); ?>">
                            <button class="btn btn-danger close"><i class="fas fa-trash-alt"></i></button>
                        </form>
                    </td>
                </tr>
                <?php endforeach; ?>

            </tbody>
        </table>
    </main>
    

    

</div>
<!-- fin container -->

<?php 
    $content = ob_get_clean();
    require("view/templateAdmin.php");
?>