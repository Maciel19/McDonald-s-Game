<?php

use App\Controller\AdminController;
use App\Controller\MainController;

require "../vendor/autoload.php";

@ob_start();
session_start();

if (($_GET['clear'] ?? false) == true) {
    $_SESSION['user'] = null;
    $_SESSION['finish'] = false;
    header("Location: /");
}

if ($_SERVER['REQUEST_URI'] == '/admin') {
    $adminController = new AdminController();
    $adminController->admin();
} else if ($_SERVER['REQUEST_URI'] == '/finish') {
    $mainController = new MainController();
    $mainController->finish();
} else {
    $mainController = new MainController();
    if (empty($_SESSION['user'] ?? null)) {
        $mainController->identifier();
    } else {
        $mainController->game();
    }
}

