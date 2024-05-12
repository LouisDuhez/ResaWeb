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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link
    href="https://fonts.googleapis.com/css2?family=Faster+One&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap"
    rel="stylesheet"> 
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
        <div>
            <div class="plan-site">
                <p>Accueil <span class="red-text">></span> Location <span class="red-text">></span><?= $cars["Cars_marque"]?> <?= $cars["Cars_nom"]?></p>
            </div>
            <div class="tittle-main">
                <h1 class="red-text"><?= $cars["Cars_marque"]?> <?= $cars["Cars_nom"]?></h1>
            </div>
        </div>
        <div class="voiture_information">
            <div class="text_information">
                <div class="text">
                    <p><?= $cars["Cars_desc"]?></p>
                </div>
                <div class="number">
                    <p><?= $cars["Cars_ch"]?>&nbsp;Ch</p>
                    <p><?= $cars["Cars_vitesse"]?>&nbsp;Km/h</p>
                </div>
        
            </div>
            <div class="js-slider">
            
                <div class="js-photos">
                    <div class="js-photo green-darker">
                        <img src="<?= $cars["Cars_image"]?>" alt="">
                    </div>
                    <div class="js-photo green">
                    <img src="<?= $cars["Cars_image"]?>" alt="">
                    </div>
                    <div class="js-photo green-dark">
                    <img src="<?= $cars["Cars_image"]?>" alt="">
                    </div>
                    <div class="js-photo green-darker">
                    <img src="<?= $cars["Cars_image"]?>" alt="">
                    </div>
                    <div class="js-photo green">
                    <img src="<?= $cars["Cars_image"]?>" alt="">
                    </div>
                </div>
            </div>
        </div>
    </main>
    <script src="slider.js"></script>
    <footer class="hide">
        <div class="trait"></div>
        <div class="list-footer">
            <div class="contact hide-1">
                <h2><a href="ML.php#contact">Contact</a></h2>
                <p> 2 Rue Albert Einstein,<br> 77420 Champs-sur-Marne</p>
                <p>Tél :07 89 00 09 21</p>
                <p>louis.duhez@gmail.com</p>
            </div>
            <div class="information hide-2">
                <h2 ><a href="ML.php#information">Informations</a></h2>
                <p><a href="ML.php#location">Location</a></p>
                <p><a href="ML.php#tarifs">Tarifs</a></p>
                <p><a href="ML.php#Mentions-légales">Mentions Légales</a></p>
                <p><a href="ML.php#politique">Politique de confidentialité</a></p>
            </div>
            
            <div class="reseaux hide-3">
                <h2>Réseaux sociaux</h2>
                <div class="reseaux-icon">
                    <p><a href="instagram.com"><i class="fa-brands fa-instagram"></i></a></p>
                    <p><a href="youtube.com"><i class="fa-brands fa-youtube"></i></a></p>
                    <p><a href="facebook.com"><i class="fa-brands fa-facebook"></i></a></p>
                </div>
                <div class="plan-site">
                    <a href="ML.php#plan-du-site">Plan du site</a>
                </div>
            </div>
        </div>


    </footer>
</body>
</html>

<?php
 } 
?>