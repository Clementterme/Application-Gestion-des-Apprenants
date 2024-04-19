<?php

require_once __DIR__ . "/../Includes/header.php";

?>
<div class="nav-list">
    <ul class="nav nav-tabs">
        <li class="nav-item">
            <a id="ongletAccueil" class="nav-link active" aria-current="page">Accueil</a>
        </li>
        <li class="nav-item">
            <a id="ongletPromotions" class="nav-link">Promotions</a>
        </li>
    </ul>
</div>


<div id="accueil">
    <div class="paddingBase">
        <h3>Cours du jour</h3>
    </div>

    <div class="rectangleGris">
        <div class="d-flex justify-content-between">
            <h3>DWWM3 - matin</h3>
            <!-- Date du jour dynamique -->
            <div id="current_date">
                <script>
                    date = new Date();
                    year = date.getFullYear();
                    month = date.getMonth() + 1;
                    day = date.getDate();
                    document.getElementById("current_date").innerHTML = day + " - " + month + " - " + year;
                </script>
            </div>
        </div>
        <p>15 participants</p>
        <div class="d-flex justify-content-end">
            <div>
                <div id="code" class="text-end"></div>
                <button id="boutonCode" class="btn btn-primary" name="code">Valider présence</button>
            </div>
        </div>
    </div>

    <div class="rectangleGris">
        <div class="d-flex justify-content-between">
            <h3>DWWM3 - après-midi</h3>
            <p>01-01-2024</p>
        </div>
        <p>15 participants</p>
        <div class="d-flex justify-content-end">
            <button class="btn btn-success" name="valider">Signatures recueillies</button>
        </div>
    </div>
</div>



<div id="pomotions" class="hidden">
    <div class="d-flex justify-content-between p-20">
        <h3>Toutes les promotions</h3>
        <button type="submit" id="ajouterPromo" class="btn btn-success" name="ajouterPromo">Ajouter promotion</button>
    </div>
    <p>tableau des promotions de Simplon</p>

    <table class="table">
        <thead>
            <tr>
                <th scope="col">Promotion</th>
                <th scope="col">Début</th>
                <th scope="col">Fin</th>
                <th scope="col">Places</th>
                <th></th>
            </tr>
        </thead>
        <tbody class="table-group-divider">

            <?php
            // Afficher les promotions existantes
            $bdd = new PDO("mysql:host=" . DB_HOST . ";dbname=" . DB_NAME . ";charset=utf8;", DB_USER, DB_PWD);

            $requete = "SELECT * FROM promotion;";
            $resultat = $bdd->query($requete);
            while ($ligne = $resultat->fetch()) {
                echo '<tr>
                <td>' . $ligne['Nom'] . '</td>
                <td>' . $ligne['Date_debut'] . '</td>
                <td>' . $ligne['Date_fin'] . '</td>
                <td>' . $ligne['Places'] . '</td>
                <td class="crudTableau"><a>Voir</a><a>Editer</a><a>Supprimer</a></td>
            </tr>';
            } ?>
        </tbody>
    </table>
</div>

<div id="body">
    <div id="creationPromo" class="hidden">
        <div class="paddingBase">
            <h3>Création d'une promotion</h3>
            <div id="response" class="alert alert-success hidden"></div>
        </div>
        <div class="rectangleGris">
            <form>
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Nom de la promotion</label>
                    <input type="text" class="form-control" id="nomPromo" name="nomPromo">
                </div>
                <div class="mb-3">
                    <label for="exampleInputPassword1" class="form-label">Date de début</label>
                    <input type="date" class="form-control" id="dateDebut" name="dateDebut">
                </div>
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Date de fin</label>
                    <input type="date" class="form-control" id="dateFin" name="dateFin">
                </div>
                <div class="mb-3">
                    <label for="exampleInputPassword1" class="form-label">Place(s) disponible(s)</label>
                    <input type="number" class="form-control" id="placesPromo" value="1" min="1" name="placesPromo">
                </div>
                <div class="d-flex justify-content-between">
                    <div class="btn btn-primary" id="retourCreationPromo">Retour</div>
                    <button class="btn btn-primary" id="sauvegarderCreationPromo" name="sauvegarderCreationPromo" onclick="appelAjax()">Sauvegarder</button>
                </div>
            </form>
        </div>
    </div>
</div>

<script>
    let response = document.getElementById('response');

    function appelAjax() {

        response.classList.remove("hidden");

        let nomPromo = document.getElementById('nomPromo').value;
        let dateDebut = document.getElementById('dateDebut').value;
        let dateFin = document.getElementById('dateFin').value;
        let placesPromo = document.getElementById('placesPromo').value;
        const request = new XMLHttpRequest();

        request.open('POST', 'traitement.php', true);

        request.setRequestHeader('content-type', 'application/json');

        request.send(JSON.stringify({
            'nomPromo': nomPromo,
            'dateDebut': dateDebut,
            'dateFin': dateFin,
            'placesPromo': placesPromo
        }));

        request.onreadystatechange = function() {
            if (request.readyState === 4 && request.status === 200) {
                response.innerHTML += JSON.parse(request.responseText);
            }
        }
    }
</script>

<?php

require_once __DIR__ . "/../Includes/footer.php";
