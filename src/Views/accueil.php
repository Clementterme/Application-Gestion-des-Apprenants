<?php 

require_once __DIR__."/../Includes/header.php";

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

            $_SESSION['connecté'] = TRUE;

            header("location: dashboard");
        } else {
            echo "Email ou mot de passe incorrect";
        }
    } else {
        echo "Veuillez remplir tous les champs.";
    }
}

?>

<!-- <div class="d-flex justify-content-center">
<div class="carregris">
<h2>Bienvenue</h2>
<form method="POST">
  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">Email *</label>
    <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="email">
  </div>
  <div class="mb-3">
    <label for="exampleInputPassword1" class="form-label" name="mdp">Mot de passe *</label>
    <input type="password" class="form-control" id="exampleInputPassword1">
  </div>
  <div class="d-flex justify-content-center">
  <button type="submit" class="btn btn-primary" name="envoi">Connexion</button>
  </div>
</form>
</div>
</div> -->



<form method="POST">
        <div class="d-flex justify-content-center">
            <div class="list-group">
                <div class="col-12">
                    <label for="inputAddress2" class="form-label">E-mail</label>
                    <input type="email" class="form-control" id="inputAddress2" name="email">
                </div>
                <div class="col-12">
                    <label for="inputAddress" class="form-label">Mot de passe</label>
                    <input type="password" class="form-control" id="inputAddress" name="mdp">
                </div>
                <div class="d-flex justify-content-end">
                    <button type="submit" class="btn btn-primary" name="envoi">Connexion</button>
                </div>
            </div>
        </div>
    </form>


<?php

require_once __DIR__."/../Includes/footer.php";