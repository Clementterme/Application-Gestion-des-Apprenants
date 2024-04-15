<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Application Gestion des Apprenants</title>
    <link rel="stylesheet" href="/assets/style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<nav class="navbar bg-body-tertiary">
    <div class="container-fluid d-flex">
        <a class="navbar-brand" href="">SIMPLON</a>
    <?php if (isset($_SESSION['connecté'])) { ?>
        <!-- Affichage du role -->
        <p><?php echo $_SESSION["role"] ?></p>
        <a href="deconnexion"><button class="btn btn-outline-success" type="submit">Déconnexion</button></a>
    <?php } ?>
    </div>
</nav>

<body>