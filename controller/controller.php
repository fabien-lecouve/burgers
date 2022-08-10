<?php

// Je récupère les fichiers nécessaires au bon fonctionnement du site
require('model/manager/categoryManager.php');
require('model/manager/productManager.php');
require('model/manager/customerManager.php');
require('model/manager/adminManager.php');

// J'injecte dans l'URL une nouvelle clé "action" dont la valeur servira à la redirection des pages
if(!isset($_GET['action']))
{
    $action = "home";
}
else
{
    $action = filter_var($_GET['action'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
}
// var_dump($action);

// J'utilise un switch pour permettre au controller de rediriger vers les pages correspondantes
switch($action)
{
    case "home":
        require("view/home.php");
        break;

    case "category":
        // Ligne 29-30-31 : Je récupère l'id stockée dans l'url et je le filtre. Puis je crée un objet instancié à partir de la classe CategoryManager. Enfin, je crée une variable dans laquelle je vais stocker le résultat de la méthode fetchAllProductsByIdCategory() issu de l'ojet créé précdemment et qui prendra comme argument l'id de l'url
        $idCategory = filter_var($_GET['id'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
        $objetCategoryManager = new CategoryManager($lePDO);
        $aCategory = $objetCategoryManager->fetchCategoryById($idCategory);

        $objetProductManager = new ProductManager($lePDO);
        $productsById = $objetProductManager->fetchAllProductsByIdCategory($idCategory);
        // echo '<pre>';
        // var_dump($productsById);
        // echo '</pre>';
        require("view/category/category.php");
        break;

    case "product":
        $idProduct = filter_var($_GET['id'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
        
        $objetProductManager = new ProductManager($lePDO);
        $aProductById = $objetProductManager->fetchProductById($idProduct);
        
        require('view/product/product.php');
        break;

    case "registration":
        require('view/customer/registration.php');
        break;

    case "processingRegistration":
        $firstname = filter_var($_POST['firstname'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
        $lastname = filter_var($_POST['lastname'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
        $email = filter_var($_POST['email'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
        $password = filter_var($_POST['password'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
        $password = hash("sha256", $password);
        $address = filter_var($_POST['address'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
        $city = filter_var($_POST['city'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
        $postalCode = filter_var($_POST['postalCode'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);

        $champs_vide = false;

        foreach( $_POST as $key => $value)
        {
            $_SESSION['post'][$key] = $value;
            if( empty( $value ))
            {
                $_SESSION["erreur"][$key] = "Le champ " . $key . " est vide";
                $champs_vide = true;
            }
        }
        if( $champs_vide )
        {
            header("location: ./?path=main&action=registration");
            exit;
        }

        $objetCustomerManager = new CustomerManager($lePDO);
        $objetCustomerManager->addNewCustomer($firstname, $lastname, $email, $password, $address, $city, $postalCode);
        $_SESSION["message"] = "Enregistrement effectué avec succès, vous pouvez à présent vous connecter";
        header("location: ./?path=main&action=login");
        break;

    case "login":
        require('view/customer/login.php');
        break;

    case "processingLogin":
        $email = filter_var($_POST['email'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
        $password = filter_var($_POST['password'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
        $password = hash("sha256", $password);
        
        $objetCustomerManager = new CustomerManager($lePDO);
        $customer = $objetCustomerManager->fetchCustomerByEmailAndPassword($email, $password);
        $objetAdminManager = new AdminManager($lePDO);
        $admin = $objetAdminManager->fetchAdminByEmailAndPassword($email, $password);

        if( $admin )
        {
            $_SESSION["firstname"] = $admin->getFirstname();
            $_SESSION["role"] = "admin";
            header("location: ./?path=main&action=home");
        }
        else if( $customer )
        {
            $_SESSION["id"] = $customer->getIdCustomer();
            $_SESSION["email"] = $customer->getEmail();
            $_SESSION["firstname"] = $customer->getFirstname();
            $_SESSION["role"] = "customer";
            header("location: ./?path=main&action=home");  
        }
        else
        {
            $_SESSION["erreur"] = "Problème de connexion, vérifiez votre mail et votre mot de passe";
            header("location: ./?path=main&action=login");
        }
        break;

    case "logout":
        session_unset();
        session_destroy();
        header("location: ./?path=main&action=login");

    default:
        require("view/error404.php");
        break;
}

?>