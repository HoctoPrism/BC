<?php
if(!empty($_SERVER['REQUEST_URI'])){
    $aParam = explode('/', $_SERVER['REQUEST_URI']); // coupe les éléments séparés par un / 
    switch ($_SERVER['REQUEST_URI']) {
        
        case '/BC/':
            include("view/main.php");
            break;
        
        case '/BC/main':
            include("view/main.php");
            break;
        
        case '/BC/product':
            include("view/product.php");
            break;

        case '/BC/signin':
            include("view/signin.php");
            break;

        case '/BC/signup':
            include("view/signup.php");
            break;

        case '/BC/CGU':
            include("view/CGU.php");
            break;
        
        case '/BC/contact':
            include("view/contact.php");
            break;

        case '/BC/mentions':
            include("view/mentions.php");
            break;

        case '/BC/userAccount':
            include("view/userAccount.php");
            break;

        default:
            include("view/404.php");
            break;
    }
} 
?>
