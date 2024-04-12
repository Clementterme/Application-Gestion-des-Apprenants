<?php

// require_once __DIR__.'/Repositories/UsersRepository.php';
require_once __DIR__.'/Controllers/HomeController.php';
require_once __DIR__.'/Controllers/ConnexionController.php';

$uri = $_SERVER['REQUEST_URI'];
$methode = $_SERVER['REQUEST_METHOD'];

$homeController = new HomeController();
$connexionController = new ConnexionController();
// $simplonController = new SimplonController();

switch ($uri) {
    case HOME_URL . "":
        $homeController->homepage();
        break;
    case HOME_URL . "connexion":
        if ($methode == 'GET') {
            $connexionController->homepage();
        } else if ($methode == 'POST') {
            $connexionController->handleFormSubmission();
        }
        break;
        case HOME_URL . "dashboard":
            if ($methode == 'GET') {
                $connexionController->homepage();
            } else if ($methode == 'POST') {
                header("location: dashboard.php");
            }
            break;
    case HOME_URL . "simplon":
        if ($methode == 'GET') {
            $simplonController->homepage();
        } else if ($methode == 'POST') {
            $simplonController->create();
        }
        break;
        case HOME_URL.'deconnexion':
            $homeController->quit();
            break;
    default:
        $homeController->pageNotFound();
        break;
}
