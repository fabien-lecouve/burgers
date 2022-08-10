<?php 

require('model/manager/productManager.php');
require('model/manager/categoryManager.php');
require('model/manager/customerManager.php');
require('model/manager/adminManager.php');

if(!isset($_GET['action']))
{
    $action = "admin";
}
else
{
    $action = filter_var($_GET['action'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
}

switch($action)
{
    // ----------PARTIE PRODUITS----------
    case "manageProduct":
        $objetProductManager = new ProductManager($lePDO);
        $allProducts = $objetProductManager->fetchAllProducts();
        require("view/admin/manageProduct.php");
        break;

    case "addProduct":
        $objetCategoryManager = new CategoryManager($lePDO);
        $allCategories = $objetCategoryManager->fetchAllCategories();
        require('view/admin/addProduct.php');
        break;

    case "processingNewProduct":
        // Filtrage des données
        $name = filter_var($_POST['name'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
        $description = filter_var($_POST['description'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
        $unitPrice = filter_var($_POST['unitPrice'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
        $idCategory = filter_var($_POST['idCategory'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);

        $objetProductManager = new ProductManager($lePDO);
        $product =$objetProductManager->fetchProductByName($name);

        if ($product) // Si le produit existe déjà, je redirige vers le formulaire
        {
            $_SESSION['message'] = "Ce produit existe déjà";
            header("location: ./?path=admin&action=addProduct");
            exit;
        } 
        else
        {
            $empty_field = false;

            // Je stocke chaque valeur du formulaire dans $_SESSION
            foreach ($_POST as $key => $value) {
                $_SESSION['post'][$key] = $value;

                // Si un champ est vide
                if (empty($value)) {
                    $empty_field = true;
                }
            }
            if ( $empty_field ) {
                $_SESSION["error_event"]['empty'] = "Veuillez remplir tous les champs";
                header("location: ./?path=admin&action=addProduct");
                exit;
            }
        }

        $objetProductManager->addNewProduct($name, $description, $unitPrice, $idCategory);
        
        $_SESSION["message"] = 'Produit "' . $name . '" ajouté';
        header("location: ./?path=admin&action=addProduct");
        break;

    case "deleteProduct":
        $idProduct = filter_var($_POST['idProduct'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
        $name = filter_var($_POST['name'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
        // var_dump($idProduct);
        $objetProductManager = new ProductManager($lePDO);
        $objetProductManager->deleteProduct($idProduct);

        $_SESSION["message"] = 'Produit "' . $name . '" supprimé';
        header("location: ./?path=admin&action=manageProduct");
        break;

    case "updateProduct":
        $idProduct = filter_var($_GET['id'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
        $objetProductManager = new ProductManager($lePDO);
        $aProductById = $objetProductManager->fetchProductById($idProduct);

        $objetCategoryManager = new CategoryManager($lePDO);
        $allCategories = $objetCategoryManager->fetchAllCategories();
        require('view/admin/updateProduct.php');
        break;

    case "processingUpdateProduct":
        $idProduct = filter_var($_POST['idProduct'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
        // var_dump($idProduct);
        $name = filter_var($_POST['name'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
        $description = filter_var($_POST['description'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
        $unitPrice = filter_var($_POST['unitPrice'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
        $idCategory = filter_var($_POST['idCategory'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);

        $objetProductManager = new ProductManager($lePDO);
        $objetProductManager->updateProduct($idProduct, $name, $description, $unitPrice, $idCategory);

        $_SESSION["message"] = 'Produit "' . $name . '" modifié';
        header("location: ./?path=admin&action=manageProduct");
        break;

    // ----------PARTIE CATEGORIES----------
    case "manageCategory":
        $objetCategoryManager = new CategoryManager($lePDO);
        $allCategories = $objetCategoryManager->fetchAllCategories();
        require("view/admin/manageCategory.php");
        break;

    case "addCategory":
        require('view/admin/addCategory.php');
        break;

    case "processingNewCategory":
        $name = filter_var($_POST['name'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);

        $objetCategoryManager = new CategoryManager($lePDO);
        $objetCategoryManager->addNewCategory($name);
        
        $_SESSION["message"] = 'Catégorie "' . $name . '" ajoutée';
        header("location: ./?path=admin&action=addCategory");
        break;

    case "deleteCategory":
        $idCategory = filter_var($_POST['idCategory'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
        $name = filter_var($_POST['name'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
        
        $objetCategoryManager = new CategoryManager($lePDO);
        $objetCategoryManager->deleteCategory($idCategory);

        $_SESSION["message"] = 'Catégorie "' . $name . '" supprimée';
        header("location: ./?path=admin&action=manageCategory");
        break;

    case "updateCategory":
        $idCategory = filter_var($_GET['id'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
        $objetCategoryManager = new CategoryManager($lePDO);
        $aCategory = $objetCategoryManager->fetchCategoryById($idCategory);

        require('view/admin/updateCategory.php');
        break;

    case "processingUpdateCategory":
        $idCategory = filter_var($_POST['idCategory'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
        $name = filter_var($_POST['name'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);

        $objetCategoryManager = new CategoryManager($lePDO);
        $objetCategoryManager->updateCategory($idCategory, $name);

        $_SESSION["message"] = 'Catégorie "' . $name . '" modifiée';
        header("location: ./?path=admin&action=manageCategory");
        break;

    // ----------PARTIE CUSTOMERS----------
    case "manageCustomer":
        $objetCustomerManager = new CustomerManager($lePDO);
        $allCustomers = $objetCustomerManager->fetchAllCustomers();
        require('view/admin/manageCustomer.php');
        break;

    case "deleteCustomer":
        $idCustomer = filter_var($_POST['idCustomer'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
        $lastname = filter_var($_POST['lastname'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
        
        $objetCustomerManager = new CustomerManager($lePDO);
        $objetCustomerManager->deleteCustomer($idCustomer);

        $_SESSION["message"] = 'Client "' . ucfirst($lastname) . '" supprimé';
        header("location: ./?path=admin&action=manageCustomer");
        break;

    // ----------PARTIE ADMINS----------
    case "admin":
        require("view/admin/admin.php");
        break;

    case "manageAdmin":
        $objetAdminManager = new AdminManager($lePDO);
        $allAdmins = $objetAdminManager->fetchAllAdmins();
        require('view/admin/manageAdmin.php');
        break;

    case "addAdmin":
        require('view/admin/addAdmin.php');
        break;

    case "processingAdmin":
        $firstname = filter_var($_POST['firstname'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
        $lastname = filter_var($_POST['lastname'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
        $email = filter_var($_POST['email'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
        $password = filter_var($_POST['password'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
        $password = hash("sha256", $password);

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
            header("location: ./?path=admin&action=addAdmin");
            exit;
        }

        $objetAdminManager = new AdminManager($lePDO);
        $objetAdminManager->addNewAdmin($firstname, $lastname, $email, $password);
        $_SESSION["message"] = "Nouvel administrateur enregistré";
        header("location: ./?path=admin&action=admin");
        break;

    case "deleteAdmin":
        $idAdmin = filter_var($_POST['idAdmin'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
        $lastname = filter_var($_POST['lastname'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
        
        $objetAdminManager = new AdminManager($lePDO);
        $objetAdminManager->deleteAdmin($idAdmin);

        $_SESSION["message"] = 'Administrateur "' . ucfirst($lastname) . '" supprimé';
        header("location: ./?path=admin&action=manageAdmin");
        break;
    
    default:
        require("view/error404.php");
}