<?php 
    $title = 'Accueil';
    ob_start(); 
?>

<!-- début container -->
<div class="container">

    <h1 class="h1">Error 404 : Page introuvable</h1>

</div>
<!-- fin container -->


<?php 
    $content = ob_get_clean();
    require("view/template.php");
?>



