<?php
/*On lie la base de donné*/
include("connect.php");
/*On selectionne la voiture en fonction de l'id contenue dans la requete*/
$requete= "SELECT * FROM `rw_cars` WHERE Cars_id={$_GET["id"]}";
$stmt=$db->query($requete);
$Cars=$stmt->fetchall(PDO::FETCH_ASSOC);
foreach($Cars as $cars){

?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="voituresinformation.css">
    <title><?= $cars["Cars_marque"]?> <?= $cars["Cars_nom"]?> - TO Drive</title>
</head>
<body>
    <header>
        <nav>
            <h1><a href="index.php">To drive</a></h1>
            <a class="btn-nav" href="index.php">Accueil</a>
            <a class="btn-nav" href="voitures.php">Voitures</a>
        </nav>
    </header>
    <main>
        <div class="plan-site">
            <p>Accueil <span class="red-text">></span> Location <span class="red-text">></span><?= $cars["Cars_marque"]?> <?= $cars["Cars_nom"]?></p>
        </div>
        <div class="tittle-main">
            <h1 class="red-text"><?= $cars["Cars_marque"]?> <?= $cars["Cars_nom"]?></h1>
        </div>
        <div class="js-slider">
        
        <div class="js-photos">
            <div class="js-photo green-darker">
                Photo3
            </div>
            <div class="js-photo green">
                Photo1
            </div>
            <div class="js-photo green-dark">
                Photo2
            </div>
            <div class="js-photo green-darker">
                Photo3
            </div>
            <div class="js-photo green">
                Photo1
            </div>
        </div>
    </main>
    <script src="slider.js"></script>
</body>
</html>

<?php
 } 
?>