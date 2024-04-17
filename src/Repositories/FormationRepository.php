<?php

class FormationRepository
{
    public function create(
        $nomPromo,
        $dateDebut,
        $dateFin,
        $places
    ) {
        $database = new Database();

        $query = $database->getDb()->prepare('
            INSERT INTO promotion (Nom, Date_debut, Date_fin, Places) 
            VALUES (:nomPromo, :dateDebut, :dateFin, :places)
        ');

        $query->execute([
            'nomPromo' => $nomPromo,
            'dateDebut' => $dateDebut,
            'dateFin' => $dateFin,
            'places' => $places
        ]);
    }
}
