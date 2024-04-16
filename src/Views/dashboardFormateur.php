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

    <div class="cours">
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

    <div class="cours">
        <div class="d-flex justify-content-between">
            <h3>DWWM3 - après-midi</h3>
            <p>01-01-2024</p>
        </div>
        <p>15 participants</p>
        <form method="POST">
            <div class="d-flex justify-content-end">
                <button type="submit" class="btn btn-success" name="valider">Signatures recueillies</button>
            </div>
        </form>
    </div>
</div>



<div id="pomotions" class="hidden">
    <div class="d-flex justify-content-between p-20">
        <h3>Toutes les promotions</h3>
        <button type="submit" class="btn btn-success" name="ajouterPromo">Ajpouter promotion</button>
    </div>
    <p>tableau des promotions de Simplon</p>

    <table class="table">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">First</th>
                <th scope="col">Last</th>
                <th scope="col">Handle</th>
            </tr>
        </thead>
        <tbody class="table-group-divider">
            <tr>
                <th scope="row">1</th>
                <td>Mark</td>
                <td>Otto</td>
                <td>@mdo</td>
            </tr>
            <tr>
                <th scope="row">2</th>
                <td>Jacob</td>
                <td>Thornton</td>
                <td>@fat</td>
            </tr>
            <tr>
                <th scope="row">3</th>
                <td colspan="2">Larry the Bird</td>
                <td>@twitter</td>
            </tr>
        </tbody>
    </table>
</div>

<?php

require_once __DIR__ . "/../Includes/footer.php";
