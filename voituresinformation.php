<?php
/*On lie la base de donné*/
include("connect.php");
/*On selectionne la voiture en fonction de l'id contenue dans la requete*/
if(isset($_GET["valider"])) {
    $str = htmlspecialchars($_GET["keywords"]);
    $requete = "SELECT * FROM rw_cars WHERE Cars_nom LIKE '$str'";
    
}
else {
    $requete= "SELECT * FROM `rw_cars` WHERE Cars_id={$_GET["id"]}";
};

$stmt=$db->query($requete);
$Cars=$stmt->fetchall(PDO::FETCH_ASSOC);
if (count($Cars)===0) {
    header("Location: error.php");
    exit();
};

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
    <link rel="icon" href="images/SVG/Todrive.svg" />
    <title><?= $cars["Cars_marque"]?> <?= $cars["Cars_nom"]?> - TO Drive</title>
</head>
<body>
    <header>
    <a href="#main" class="skip">Skip to main content</a>
        <nav>
            <h1><a href="index.php">To drive</a></h1>
            <a class="btn-nav" href="voitures.php">Voitures</a>
            <a class="btn-nav" href="index.php#team">À propos</a>
        </nav>
    </header>
    <main id="main">
        <div>
            <div class="plan-site hide">
                <p class="hide-1 left-transition"><a href="index.php">Accueil</a> <span class="red-text">></span> <a href="voitures.php"> Voitures</a> <span class="red-text">></span><?= $cars["Cars_marque"]?> <?= $cars["Cars_nom"]?></p>
            </div>
                <div class="tittle-main hide">
                    <h1 class="red-text hide-2 left-transition"><?= $cars["Cars_marque"]?> <?= $cars["Cars_nom"]?></h1>
            <div class="bloc-info hide-3 left-transition">
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
                
            </div>
            </div>
        </div>
    </div>
    <div class="scroll-down"></div>
    <div class="information-voiture-bloc hide">
        
        <div class="desc hide-1 left-transition">
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
                    <td><?= $cars["Cars_kilo"]?> km</td>
                </tr>
                <tr>
                    <th>Nombre de place :</th>
                    <td><?= $cars["Cars_place"]?></td>
                </tr>
                <tr>
                    <th>Puissance DIN :</th>
                    <td><?= $cars["Cars_ch"]?>ch</td>
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
        <div class="image image1 hide-1 right-transition">
            <img src="images/<?= $cars["Cars_image2"]?>" alt="">
        </div>
        <div class="image image2 hide-2 left-transition">
        <img src="images/<?= $cars["Cars_image3"]?>" alt="">
        </div>
        <div class="caracteristique hide-2 right-transition">
            <h2><span class="red-text">Histoire</span></h2>
            <p><?=$cars["Cars_desc"]?></p>
        </div>
        
    </div>
    <h2 class="reserv-tittle">Réserver l'excellence :</h2>
    <div class="btn-reserv "><a class="reserv-cars" href="Reservation.php?id=<?=$cars["Cars_id"]?>">Réserver <?= $cars["Cars_marque"]?> <?= $cars["Cars_nom"]?> </a></div>
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
<!-- <script src="slider.js"></script> -->
</body>
</html>

