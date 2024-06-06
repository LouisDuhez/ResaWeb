<?php
header("refresh:5;url=index.php");
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Erreur - To Drive</title>
    <link rel="stylesheet" href="error.css">
</head>
<body>
    <header>
    <a href="#main" class="skip">Skip to main content</a>
        <a href="#main" class="skip">Skip to main content</a>
            <nav>
                <h1><a href="index.php">To drive</a></h1>
                <a class="btn-nav red-text" href="voitures.php">Voitures</a>
                <a class="btn-nav" href="index.php#team">À propos</a>
            </nav>
        </header>
        <main id="main">
            <h1>
                Erreur dans la recherche :
            </h1>
            <p>Aucune voiture n'a été trouvé vous serez redirigé sur la page d'accueil dans quelques secondes ...</p>
        </main>
</body>
</html>