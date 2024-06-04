<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link
        href="https://fonts.googleapis.com/css2?family=Faster+One&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap"
        rel="stylesheet">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
        <link rel="stylesheet" href="reservation.css">
        <link rel="icon" href="images/SVG/Todrive.svg" />
    <title>Réserver - To drive</title>
</head>
<body>
<?php
    include ("connect.php")
    ?>
    <header>
        <a href="#part1" class="skip">Skip to main content</a>
            <nav>
                <h1><a href="index.php">To drive</a></h1>
                <a class="btn-nav" href="voitures.php">Voitures</a>
                <a class="btn-nav" href="index.php#team">À propos</a>
            </nav>
    </header>
    <main id="part1">
    <div class="plan-site hide">
            <p class="hide-1 left-transition"><a href="index.php">Accueil</a> <span class="red-text">></span> <a href="voitures.php">Voitures</a> <span class="red-text">></span>
            <?php
                    $requete = "SELECT Cars_id, Cars_marque, Cars_nom FROM rw_cars WHERE Cars_id = {$_GET["id"]}";
                    $stmt=$db->query($requete);
                    $Cars=$stmt->fetchall(PDO::FETCH_ASSOC);
                    foreach($Cars as $cars){ 
                ?>
                <a href="voituresinformation.php?id=<?= $cars["Cars_id"]?>"><?= $cars["Cars_marque"]?> <?= $cars["Cars_nom"]?></a>
                
                <?php
                }
                ?>
                <span class="red-text">></span>
                <a href="#top">Louer</a>
        </p>
        </div>
        <?php
        $nbtotal= "SELECT COUNT(*) AS nbcars FROM rw_cars";
        $nbcars = $db->query($nbtotal);
        $result = $nbcars->fetchall(PDO::FETCH_ASSOC);
        foreach ($result as $row) {
        ?>
        <div class="tittle-main hide">
            <h1 class="red-text hide-1 left-transition">Véhicules à louer</h1>
            <p class="location-voiture hide-2 left-transition">Découvrer notre stock disponible de <span class="red-text number"><?= $row["nbcars"]?></span> voitures</p>
        </div>
        <?php
        }
        ?>
        <h2>Réserver la <span class="red-text">voiture</span> de vos <span class="red-text">rêves</span> !</h2>

        <form action="reservationVoiture.php" method="GET">
                    
                    <h3>Qui êtes vous ?</h3>
                    <p>Tous les champs sont obligatoires</p>
                    <label for="prenom">Votre Prénom</label><br>
                    <input id="prenom"type="text" name="prenom"required><br>
                    <label for="nom">Votre Nom</label><br>
                    <input id="nom"type="text" name="nom" required><br>
                    <label for="email">Email <span class="emailtest"></span></label><br>
                    <input class="email" id="email" type="text" name="email"required><br>
                    <p class="erreur"></p>
                    <div class="form-top-voiture">
                        <h3>Quel voiture ?</h3>
                        <p>
                            Prix : <span class="prix-voiture">
                                <?php
                                $requete= "SELECT Cars_prix FROM rw_cars WHERE Cars_id = {$_GET["id"]}";
                                $cars = $db->query($requete);
                                $result = $cars->fetchall(PDO::FETCH_ASSOC);
                                foreach ($result as $row) {
                                ?>
                                    <?= $row["Cars_prix"]?>
                                <?php
                                };
                                ?>
                            </span>€
                            
                        </p>
                    </div>
                    <label for="voiture" >Réserver</label><br>
                    <select name="voiture" id="voiture" required><br>
                               <?php
                    $requete= "SELECT * FROM rw_cars AS cars";
                    $cars = $db->query($requete);
                    $result = $cars->fetchall(PDO::FETCH_ASSOC);
                    foreach ($result as $row) {
                        if ($_GET["id"] == $row["Cars_id"]){ $selected =' selected="selected"';} else {$selected = '';}
                    ?>
                
                
                        <option <?=$selected ?> value="<?= $row["Cars_id"]?>" data-prix="<?= $row["Cars_prix"]?>"><?= $row["Cars_marque"]?> <?= $row["Cars_nom"]?></option>
                        <?php
                    }
                    ?>
                    
                    </select>
                    <p id="Ajoutvoiture">Ajouter +</p><br>
                    <div class="voiture2">
                        <label for="voiture2" >Réserver une deuxième voiture</label><br>
                        <select  name="voiture2" id="voiture2" required><br>
                        <option selected="selected" value="none" data-prix="0"></option>
                                   <?php
                        $requete= "SELECT * FROM rw_cars AS cars";
                        $cars = $db->query($requete);
                        $result = $cars->fetchall(PDO::FETCH_ASSOC);
                        foreach ($result as $row) {
                            if ($_GET["id"] == $row["Cars_id"]){ $selected =' selected="selected"';} else {$selected = '';}
                        ?>
                            <option value="<?= $row["Cars_id"]?>" data-prix="<?= $row["Cars_prix"]?>"><?= $row["Cars_marque"]?> <?= $row["Cars_nom"]?></option>
                            <?php
                        }
                        ?>
                        </select>
                    </div>
                    <label for="date">Date</label>
                    <input name="date" id="date"type="date">
                    <br>
                    <input class="submit" type="submit" value="Envoyer le formulaire">
            <div class="trait-blanc"></div>
        </form>
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
                    <p><i class="fa-brands fa-instagram"></i></p>
                    <p><i class="fa-brands fa-youtube"></i></p>
                    <p><i class="fa-brands fa-facebook"></i></p>
                </div>
                <div class="plan-site">
                    <a href="ML.php#plan-du-site">Plan du site</a>
                </div>
            </div>
        </div>


    </footer>
    <script src="https://unpkg.com/counterup2@2.0.2/dist/index.js"></script>
    <script src="form.js"></script>
    <script src="allScript.js"></script>
    
</body>
</html>