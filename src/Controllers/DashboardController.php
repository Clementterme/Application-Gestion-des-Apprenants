<?php

require_once __DIR__ . '/../Services/Render.php';

class DashboardController
{
    use Render;

    public function homepage()
    {
        $this->render("dashboardFormateur");
    }

    public function create()
    {
        $request = file_get_contents('php://input');

        if ($request) {
            $decodedRequest = json_decode($request);

            if ($decodedRequest) {
                $nomPromo = htmlspecialchars($decodedRequest->nomPromo);
                $dateDebut = htmlspecialchars($decodedRequest->dateDebut);
                $dateFin = htmlspecialchars($decodedRequest->dateFin);
                $places = htmlspecialchars($decodedRequest->places);

                $FormationRepository = new FormationRepository();
                $FormationRepository->create($nomPromo, $dateDebut, $dateFin, $places);

                include_once __DIR__ . '/../Views/connexion.php';
            }
        }
    }
}
