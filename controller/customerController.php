<?php

require('model/manager/productManager.php');
require('model/manager/commandManager.php');

if( !isset($_GET['action']) )
{
    $action = "customer";
}
else
{
    $action = filter_var($_GET['action'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
}

switch($action)
{
    case "cart":
        $objetProductManager = new ProductManager($lePDO);
        require("view/customer/cart.php");
        break;

    case "processingCart":
        $idProduct = filter_var( $_POST["idProduct"], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
        $quantityProduct = filter_var( $_POST["quantityProduct"], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
        if( !isset($_SESSION["panier"]) )
        {
            $_SESSION["panier"] = [];
        }
        else
        {
            for( $i = 0; $i < count($_SESSION["panier"]); $i++)
            {
                $line = $_SESSION["panier"][$i];
                if( $idProduct == $line[0] )
                {
                    $quantityProduct += $line[1];
                    $_SESSION["panier"][$i][1] = $quantityProduct;
                    header("location: ./?path=customer&action=cart");
                    exit;
                }
            }
        }
        array_push($_SESSION["panier"], [$idProduct, $quantityProduct]);
        
        header("location: ./?path=customer&action=cart");
        break;

    case "validCart":
        $totalCommand = filter_var( $_POST["totalCommand"], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
        
        $objetCommandManager = new CommandManager($lePDO);
        $objetCommandManager->createCommand( $totalCommand );
        unset($_SESSION["panier"]);
        $_SESSION["message"] = "Votre commande a bien été enregistrée";
        header("location: ./?path=customer&action=cart");
        break;

    case "command":
        $objetCommandManager = new CommandManager($lePDO);
        $objetProductManager = new ProductManager($lePDO);

        $allCommands = $objetCommandManager->fetchAllCommandsByIdCustomer( $_SESSION["id"] );
        // echo '<pre>';
        // var_dump($allCommands);
        // echo '</pre>';
        require("view/customer/command.php");
        break;

    default:
        require("view/error404.php");
        break;
}