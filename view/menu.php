<?php
    require_once('model/manager/categoryManager.php');
    $objetCategoryManager = new CategoryManager($lePDO);
    $allCategories = $objetCategoryManager->fetchAllCategories();
?>

<!-- navbar-dark bg-dark  -->
<nav class="navbar navbar-dark navbar-expand-lg p-1" id="nav">
    <div class="container-fluid">
        <a id="logo_burger" class="navbar-brand"  href="./?path=main&action=home">
            <img id="img" src="" style="height: 80px;" alt="logo de la marque">
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <div class="d-flex justify-content-between w-100">

            <ul class="navbar-nav mb-2 mb-lg-0">
                
                <!-- boucle pour inclure les catégories -->
                <?php if(isset($allCategories)): ?>
                    <?php foreach( $allCategories as $aCategory ): ?>
                        <li class="nav-item">
                            <a class="nav-link" aria-current="page" 
                            href="./?path=main&action=category&id=<?= $aCategory->getIdCategory(); ?>">
                            <?= ucfirst($aCategory->getName()); ?>s</a>
                        </li>
                    <?php endforeach; ?>
                <?php endif; ?>
                <!-- fin boucle des catégories -->
                
            </ul>


            <ul class="navbar-nav mb-2 mb-lg-0">
                
            <?php 
                if(isset($_SESSION["role"])):
                    if($_SESSION["role"] == "customer"): 
            ?>
                <li class="nav-item">
                    <a class="nav-link" aria-current="page" href="./?path=customer&action=cart"><i class="fas fa-shopping-cart"></i></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" aria-current="page" href="./?path=customer&action=command">Mes commandes</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" aria-current="page" href="./?path=main&action=logout">Se déconnecter</a>
                </li>
            <?php   
                    elseif($_SESSION["role"] == "admin"):
            ?>
                <li class="nav-item">
                    <a class="nav-link" aria-current="page" href="./?path=admin&action=admin">Gestion Admin</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" aria-current="page" href="./?path=main&action=logout">Se déconnecter</a>
                </li>
            <?php 
                    endif;
                else: 
            ?>
                <li class="nav-item">
                    <a class="nav-link" aria-current="page" href="./?path=main&action=login">Se connecter</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" aria-current="page" href="./?path=main&action=registration">S'inscrire</a>
                </li>
            <?php endif; ?>
                
            </ul>
            </div>
        </div>
        
    </div>
</nav>

