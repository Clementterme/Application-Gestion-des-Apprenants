<?php

require_once __DIR__ . "/../Includes/header.php";

$bdd = new PDO("mysql:host=" . DB_HOST . ";dbname=" . DB_NAME . ";charset=utf8;", DB_USER, DB_PWD);

if (isset($_POST["envoi"])) {
    if (!empty($_POST["email"]) && !empty($_POST["mdp"])) {
        $email = htmlspecialchars($_POST['email']);
        $mdp = htmlspecialchars($_POST['mdp']);

        $selectUser = $bdd->prepare("SELECT * FROM utilisateur WHERE Email = ? AND Mdp = ?");
        $selectUser->execute(array($email, $mdp));

        if ($selectUser->rowCount() > 0) {
            $_SESSION["email"] = $email;
            $_SESSION["mdp"] = $mdp;

            $_SESSION["role"] = $selectUser->fetch()["Id_Role"];

            $_SESSION['connecté'] = TRUE;

            if ($_SESSION["role"] == 0) {
                $_SESSION["role"] = "Apprenant";
                header("location: dashboard");
            }
             else if ($_SESSION["role"] == 1) {
                $_SESSION["role"] = "Formateur";
                header("location: dashboardFormateur");
            }
        } else {
            echo "Email ou mot de passe incorrect";
        }
    } else {
        echo "Veuillez remplir tous les champs.";
    }
}

?>

<div class="d-flex justify-content-center">
    <div class="carregris">
        <h2>Bienvenue</h2>
        <form method="POST">
            <div class="mb-3">
                <label for="inputEmail" class="form-label">E-mail</label>
                <input type="email" class="form-control" id="inputEmail" name="email">
            </div>
            <div class="mb-3">
                <label for="inputMdp" class="form-label">Mot de passe</label>
                <input type="password" class="form-control" id="inputMdp" name="mdp">
            </div>
            <div class="d-flex justify-content-center">
                <button type="submit" class="btn btn-primary" name="envoi">Connexion</button>
            </div>
        </form>
    </div>
</div>

<?php

require_once __DIR__ . "/../Includes/footer.php";
