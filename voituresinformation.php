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
    <a href="#main" class="skip">Skip to main content</a>
        <nav>
            <h1><a href="index.php">To drive</a></h1>
            <a class="btn-nav" href="index.php">Accueil</a>
            <a class="btn-nav" href="voitures.php">Voitures</a>
        </nav>
    </header>
    <main id="main">
        <div>
            <div class="plan-site">
                <p><a href="index.php">Accueil</a> <span class="red-text">></span> <a href="voitures.php"> Voitures</a> <span class="red-text">></span><?= $cars["Cars_marque"]?> <?= $cars["Cars_nom"]?></p>
            </div>
            <div class="title-slider">
                <div class="tittle-main">
                    <h1 class="red-text"><?= $cars["Cars_marque"]?> <?= $cars["Cars_nom"]?></h1>
                    <div class="bloc-info">
                <div class="info">
                <p>02/2023</p>
                <div class="traitRouge"></div>
                <p>6950km</p>
                <div class="traitRouge"></div>
                <p>Automatique</p>

            </div>
            <div class="bloc-prix">
                <p>Prix : <span class="red-text number"><?=$cars["Cars_prix"]?></span> € /Jour</p>
            </div>
            <div class="btn-reserv"><a class="reserv-cars" href="Reservation.php?id=<?=$cars["Cars_id"]?>">Réserver <?= $cars["Cars_marque"]?> <?= $cars["Cars_nom"]?> </a></div>
        </div>
                </div>
                <div class="js-slider">
            
                <div class="js-photos">
                    <div class="js-photo green-darker">
                        <img src="images/<?= $cars["Cars_image"]?>" alt="">
                    </div>
                    <div class="js-photo green">
                    <img src="images/<?= $cars["Cars_image"]?>" alt="">
                    </div>
                    <div class="js-photo green-dark">
                    <img src="images/<?= $cars["Cars_image"]?>" alt="">
                    </div>
                    <div class="js-photo green-darker">
                    <img src="images/<?= $cars["Cars_image"]?>" alt="">
                    </div>
                    <div class="js-photo green">
                    <img src="images/<?= $cars["Cars_image"]?>" alt="">
                    </div>
                </div>
            </div>
            </div>
        </div>
    </div>
    <div class="information-voiture-bloc">
        
        <div class="desc">
            <table>
                <caption><h3>Caractéristiques techniques :</h3></caption>
                <tr>
                    <th>Marques :</th>
                    <td><?= $cars["Cars_marque"]?></td>
                </tr>
                <tr>
                    <th>Modèles :</th>
                    <td><?= $cars["Cars_nom"]?></td>
                </tr>
                <tr>
                    <th>Kilométrage :</th>
                    <td><?= $cars["Cars_kilo"]?></td>
                </tr>
                <tr>
                    <th>Nombre de place :</th>
                    <td><?= $cars["Cars_place"]?></td>
                </tr>
                <tr>
                    <th>Puissance DIN :</th>
                    <td><?= $cars["Cars_ch"]?></td>
                </tr>
                <tr>
                    <th>Boite de vitesse :</th>
                    <td><?= $cars["Cars_boite"]?></td>
                </tr>
                <tr>
                    <th>Carburant :</th>
                    <td><?= $cars["Cars_carburant"]?></td>
                </tr>
                <tr>
                    <th>Couleur</th>
                    <td><?= $cars["Cars_couleur"]?></td>
                </tr>
            </table>
        </div>
        <div class="image image1">
            <img src="images/<?= $cars["Cars_image2"]?>" alt="">
        </div>
        <div class="image image2">
        <img src="images/<?= $cars["Cars_image3"]?>" alt="">
        </div>
        <div class="caracteristique">
            <h2><span class="red-text">Histoire</span></h2>
            <p><?=$cars["Cars_desc"]?></p>
        </div>
        
    </div>
    <div class="btn-reserv"><a class="reserv-cars" href="Reservation.php?id=<?=$cars["Cars_id"]?>">Réserver <?= $cars["Cars_marque"]?> <?= $cars["Cars_nom"]?> </a></div>
    </main>
    
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
    <?php
 } 
?>
<script src="https://unpkg.com/counterup2@2.0.2/dist/index.js">	</script>
<script src="allScript.js"></script>
<script src="slider.js"></script>
</body>
</html>

