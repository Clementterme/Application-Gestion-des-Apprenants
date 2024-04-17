<?php

require_once __DIR__ . "/../Includes/header.php";

?>
<div class="nav-list">
    <ul class="nav nav-tabs">
        <li class="nav-item">
            <a id="ongletAccueil" class="nav-link active" aria-current="page" href="#">Accueil</a>
        </li>
        <li class="nav-item">
            <a id="ongletPromotions" class="nav-link" href="#">Promotions</a>
        </li>
    </ul>
</div>


<div id="accueil">
    <h3>Cours du jour</h3>

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


<div id="creationPromo" class="hidden">
    <h3>Création d'une promotion</h3>

    <div class="rectangleGris">
        <form>
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Nom de la promotion</label>
                <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
            </div>
            <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">Date de début</label>
                <input type="date" class="form-control" id="exampleInputPassword1">
            </div>
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Date de fin</label>
                <input type="date" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
            </div>
            <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">Place(s) disponible(s)</label>
                <input type="number" class="form-control" id="exampleInputPassword1" value="1" min="1">
            </div>
            <div class="d-flex justify-content-between">
            <button class="btn btn-primary" type="submit" id="retourCreationPromo">Retour</button>
            <button class="btn btn-primary" type="submit">Sauvegarder</button>
            </div>
        </form>
    </div>
</div>

<?php

require_once __DIR__ . "/../Includes/footer.php";
