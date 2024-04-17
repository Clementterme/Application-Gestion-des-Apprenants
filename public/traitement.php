<?php

if (!empty(file_get_contents('php://input'))) {
    $data = json_decode(file_get_contents('php://input'));

    header('Content-Type: application/json');
    echo json_encode("La promotion " . $data->nomPromo . " a bien été crée, elle commencera le " . $data->dateDebut . " ,finira le " . $data->dateFin . " et comportera " . $data->placesPromo . " place(s).<br>");

    // Enregistrement dans la base de données
    // $promoNom = json_encode($data->nomPromo);
    // $debutDate = json_encode($data->dateDebut);
    // $finDate = json_encode($data->dateFin);
    // $nbPlaces = json_encode($data->placesPromo);

    // $bdd = new PDO("mysql:host=" . DB_HOST . ";dbname=" . DB_NAME . ";charset=utf8;", DB_USER, DB_PWD);

    // $insertPromo = $bdd->prepare("INSERT INTO promotion(Nom, Date_debut, Date_fin, Places) VALUES(?, ?, ?, ?)");
    // $insertPromo->execute(array($promoNom, $debutDate, $finDate, $nbPlaces));
}
