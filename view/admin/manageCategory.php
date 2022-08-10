<?php 
    $title = "Gestion des catégories";
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
            <h1 class="h2">Gestion des catégories</h1>
        </div>

        <table class="table table-striped">
            <thead>
                <tr>
                    <th>Id catégorie</th>
                    <th>Nom</th>
                    <th>Gestion</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach($allCategories as $aCategory): ?>
                <tr>
                    <td><?= $aCategory->getIdCategory(); ?></td>
                    <td><?= $aCategory->getName(); ?></td>
                    <td>
                        <a class="btn btn-secondary mb-1" href="./?path=admin&action=updateCategory&id=<?= $aCategory->getIdCategory(); ?>"><i class="fas fa-pen"></i></a>
                        <form action="./?path=admin&action=deleteCategory" method="POST">
                            <input type="hidden" name="idCategory" value="<?= $aCategory->getIdCategory(); ?>">
                            <input type="hidden" name="name" value="<?= $aCategory->getName(); ?>">
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