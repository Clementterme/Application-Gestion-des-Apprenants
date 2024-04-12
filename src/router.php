<?php

// require_once __DIR__.'/Repositories/UsersRepository.php';
require_once __DIR__.'/Controllers/HomeController.php';
require_once __DIR__.'/Controllers/ConnexionController.php';

$uri = $_SERVER['REQUEST_URI'];
$methode = $_SERVER['REQUEST_METHOD'];

$homeController = new HomeController();
$reservationController = new ConnexionController();
// $simplonController = new SimplonController();

switch ($uri) {
    case HOME_URL . "":
        $homeController->homepage();
        break;
    case HOME_URL . "connexion":
        if ($methode == 'GET') {
            $reservationController->homepage();
        } else if ($methode == 'POST') {
            $reservationController->handleFormSubmission();
        }
        break;
    case HOME_URL . "simplon":
        if ($methode == 'GET') {
            $simplonController->homepage();
        } else if ($methode == 'POST') {
            $simplonController->create();
        }
        break;
    default:
        $homeController->pageNotFound();
        break;
}
