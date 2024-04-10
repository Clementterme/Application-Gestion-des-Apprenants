<?php

function ChargerClasses($classe) {
    try {
        spl_autoload_register(function ($classe) {
            require_once __DIR__ . "/Models/" . $classe . ".php";
        });
        $url = '';
        if(isset($_GET['url'])) {
            $url = explode('/', filter_var($_GET['url'], FILTER_SANITIZE_URL));

            $controller = ucfirst(strtolower($url[0]));
            $controllerClasse = "Controller" . $controller;
            $controllerFile = "Controllers/" . $controllerClasse . ".php";

            if(file_exists($controllerFile)) {
                require_once $controllerFile;
                new $controllerClasse($url);
            }
            else {
                throw new Exception('Page introuvable');
            }
        }
            else {
                require_once('Controllers/ControllerAccueil.php');
                // new ControllerAccueil($url);
            }
        }
     catch (Exception $e) {
        echo $e->getMessage();
        require_once('/Views/404.php');
    }
}
