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
                <h1><a href="#top">To drive</a></h1>
                
                <?php
                    $requete = "SELECT Cars_id, Cars_marque, Cars_nom FROM rw_cars WHERE Cars_id = {$_GET["id"]}";
                    $stmt=$db->query($requete);
                    $Cars=$stmt->fetchall(PDO::FETCH_ASSOC);
                    foreach($Cars as $cars){ ?>
                <a class="btn-nav"href="voituresinformation.php?id=<?=$cars["Cars_id"]?>"><?= $cars["Cars_marque"]?> <?= $cars["Cars_nom"]?></a>
                <?php
                }
                ?>
                <a class="btn-nav" href="voitures.php">Voitures</a>
            </nav>
    </header>
    <main id="part1">
        <form action="GET">
            <label for="prenom">Prénom</label><br>
            <input id="prenom"type="text"><br>
            <label for="nom">Nom</label><br>
            <input id="nom"type="text"><br>
            <label for="email">Email</label><br>
            <input class="email" id="email" type="text"><br>
            <label for="voiture">Réserver</label><br>
            <select name="<?=$_GET["id"]?>" id="voiture"><br>
           <?php
            $requete= "SELECT * FROM rw_cars AS cars";
            $cars = $db->query($requete);
            $result = $cars->fetchall(PDO::FETCH_ASSOC);
            foreach ($result as $row) {
                if ($_GET["id"] == $row["Cars_id"]){ $selected =' selected="selected"';} else {$selected = '';}
            ?>
            
                
                <option <?=$selected ?> value="<?= $row["Cars_id"]?>"><?= $row["Cars_marque"]?> <?= $row["Cars_nom"]?></option>
                <?php
            }
            ?>
            

            </select>
        </form>
    </main>
    <script src="form.js"></script>
</body>
</html>