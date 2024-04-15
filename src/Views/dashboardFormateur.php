<?php

require_once __DIR__ . "/../Includes/header.php";

?>
<div class="nav-list">
    <ul class="nav nav-tabs">
        <li class="nav-item">
        <a class="nav-link active" aria-current="page" href="#">Accueil</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="#">Promotions</a>
        </li>
    </ul>
</div>

<h3>Cours du jour</h3>

<div class="cours">
    <div class="d-flex justify-content-between">
        <h3>DWWM3</h3>
        <p>01-01-2024</p>
    </div>
    <p>15 participants</p>
    <form method="POST">
            <div class="d-flex justify-content-end">
                <button type="submit" class="btn btn-primary" name="valider">Valider présence</button>
            </div>
        </form>
</div>

<?php

require_once __DIR__ . "/../Includes/footer.php";
