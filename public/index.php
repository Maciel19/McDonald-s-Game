<?php

use App\Controller\MainController;
require "vendor/autoload.php";
require "config.php";

@ob_start();
session_start();

if (($_GET['clear'] ?? false) == true) {
    $_SESSION['user'] = null;
    $_SESSION['finish'] = false;
    header("Location: /");
}

if($_SERVER['REQUEST_URI']=='/admin'){

    $adminController = new \App\Controller\AdminController();

    $adminController->amdmin();

} else if ($_SERVER['REQUEST_URI']=='/finish'){
    $mainController = new MainController();
    $mainController ->finish();
} else{
    $mainController = new MainController();
    if (empty($_SESSION['user'] ?? null)){
        $mainController->identifier();
    } else{
        $mainController->game();
    }


}

