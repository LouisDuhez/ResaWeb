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
                
                <?php
                    $requete = "SELECT Cars_id, Cars_marque, Cars_nom FROM rw_cars WHERE Cars_id = {$_GET["id"]}";
                    $stmt=$db->query($requete);
                    $Cars=$stmt->fetchall(PDO::FETCH_ASSOC);
                    foreach($Cars as $cars){ 
                ?>
                <a class="btn-nav" href="voituresinformation.php?id=<?= $cars["Cars_id"]?>"><?= $cars["Cars_marque"]?> <?= $cars["Cars_nom"]?></a>
                <?php
                }
                ?>
                <a class="btn-nav" href="voitures.php">Voitures</a>
            </nav>
    </header>
    <main id="part1">
        
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
                    <div class="form-top-voiture">
                        <h3>Quel voiture ?</h3>
                        <p>
                            Prix : <span class=" red-text prix-voiture">
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
                    <label for="date">Date</label>
                    <input name="date" id="date"type="date">
                    <br>
                    <input class="submit" type="submit">
            <div class="trait-blanc"></div>
        </form>
    </main>
    <script src="form.js"></script>
</body>
</html>