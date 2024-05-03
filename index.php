<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Faster+One&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap"
        rel="stylesheet">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <title>Accueil - To Drive</title>
</head>

<body>
    <?php
    include ("connect.php")
    ?>
    <header>
        <nav>
            <h1><a href="#top">To drive</a></h1>
            <a class="btn-nav" href="voitures.php">Voitures</a>
        </nav>
        <div class="Accueil">
            <div class="Logo-and-Join">
                <img src="images/logo_test.svg" alt="">
                <a class="btn-Join-Us" href="#team">
                    Qui sommes nous ?
                    <div class="icon">
                        <span>
                            <svg xmlns="http://www.w3.org/2000/svg" width="36" height="36" viewBox="0 0 36 36"
                                fill="none">
                                <path
                                    d="M1.05403 31.6175C0.271626 32.3972 0.271626 33.6614 1.05403 34.441C1.83644 35.2207 3.10497 35.2207 3.88737 34.441L1.05403 31.6175ZM35.5599 2.05152C35.5599 0.948871 34.6629 0.0549994 33.5564 0.0549994L15.5251 0.0549994C14.4187 0.0549994 13.5217 0.948871 13.5217 2.05152C13.5217 3.15416 14.4187 4.04804 15.5251 4.04804H31.5529V20.0202C31.5529 21.1228 32.4499 22.0167 33.5564 22.0167C34.6629 22.0167 35.5599 21.1228 35.5599 20.0202L35.5599 2.05152ZM3.88737 34.441L34.9731 3.46327L32.1397 0.639766L1.05403 31.6175L3.88737 34.441Z"
                                    fill="white" />
                            </svg>
                        </span>
                    </div>
                </a>
            </div>
            <div class="Slogan hide">
                <h1 class="hide-1">La voiture plus qu'un sport <br>
                    <span class="red-background hide-4 ">UNE PASSION</span>
                </h1>
            </div>
        </div>
        <div class="trait"></div>
    </header>
    <div class="scroll-down"></div>
    <section class="part1">
        <div class="text-part1 hide">
            <h2 class="hide-1 left-transition">La location,<br> Pour plus de <span class="red-text">liberté...</span>
            </h2>
            <p class="hide-2 left-transition">Accomplissez vos rêves les plus fous avec To Drive</p>

            <div class="part1link hide-3 left-transition"><a class="btn-1" href="voitures.php">Louer une voiture</a></div>
        </div>
        <?php
        $nbtotal= "SELECT COUNT(*) AS nbcars FROM rw_cars";
        $nbcars = $db->query($nbtotal);
        $result = $nbcars->fetchall(PDO::FETCH_ASSOC);
        foreach ($result as $row) {
        ?>
        <div class="part1-number hide">
            <h3 class="hide-1 right-transition">+ <span class="number red-text"><?= $row["nbcars"] ?></span><br>Voitures disponibles</h3>
        </div>
        <?php
            };
        ?>
    </section>
    <div class="trait-blanc"></div>
    <section class="avis-list hide">
        <h2 class="hide-1">Nos <span class="red-text">Avis</span> :</h2>
        <div class="scroller hide-2" data-direction="right" data-speed="slow">
            <div class="scroller__inner">
                
                    <?php
                    $Avistotal= "SELECT * FROM rw_clients_avis AS avis";
                    $avis = $db->query($Avistotal);
                    $avisResult = $avis->fetchall(PDO::FETCH_ASSOC);
                    foreach ($avisResult as $row) {
                    ?>
                    <div class="avis-card">
                    <div class="top-card">
                    <i class="fa-solid fa-user"></i>
                        <p><?=$row["clients_avis_nom"]?> <?=$row["clients_avis_prenom"]?></p>
                    </div>
                    <div class="avis">
                        <p><?=$row["clients_avis_text"]?></p>
                    </div>
                    </div>
                    <?php 
                        }; 
                    ?>
          </div>
        </div>
          <div class="avis-btn"><a href="#avis-formulaire" class="btn-1">Votre Avis</a></div>
          <div id='avis-formulaire'class="avis-formulaire"action="">
            <h2>Votre Avis Compte !</h2>
            
        <form action="insert_avis.php" method="GET">
            <p>Tout les champs sont obligatoires</p>
            <label for="nom">Votre Nom </label><br>
            <input id="nom" type="text" required name="nom"><br>
            <label for="prenom">Votre Prénom</label><br>
            <input id="prenom" type="text" required name="prenom"><br>
            <label for="email">Votre E-mail</label><br>
            <input type="email" id="email" required name="email"><br>
            <label for="avis">Votre Avis<br>
            <textarea required id="avis" cols="30" rows="10" maxlength="150" name="avi"></textarea><br>
            <input class="submit"type="submit" value="Envoyer" name="envoyer">
            <div class="trait-blanc"></div>
        </form>
        
    </section>
    <div class="trait-blanc"></div>
    <section class="navigation">
        <div class="hide">
            <h2 class="hide-1">A vous de <span class="red-text hide-2">choisir...</span></h2>
        </div>
        <div class="list-navigation hide">
            <div class="card-explication supercars-js">
                <div class="card-wrapper hide-1 left-transition">
                    <div class="card card-voiture">
                        <div class="card-background">
                            <h3>Voitures</h3>
                        </div>
                    </div>
                </div>
                <div class="explication-off">
                    <h3 class="red-background">Supercars</h3>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Eveniet repellat incidunt, cum quas quis
                        atque. Obcaecati non reprehenderit est amet fugiat quam, nisi nesciunt, repellat repellendus
                        rerum magnam quae eveniet neque aspernatur illum molestias, delectus sint. Tenetur natus modi
                        eum maxime, quis, facere odit accusantium magnam incidunt fugiat voluptates enim.</p>
                </div>
            </div>
            <div class="card-explication limousine-js">
                <div class="card-wrapper hide-1">
                    <div class="card card-supercars">
                        <div class="card-background">
                            <h3>Supercars</h3>
                        </div>
                    </div>
                </div>
                <div class="explication-off">
                    <h3 class="red-background">Supercars</h3>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Eveniet repellat incidunt, cum quas quis
                        atque. Obcaecati non reprehenderit est amet fugiat quam, nisi nesciunt, repellat repellendus
                        rerum magnam quae eveniet neque aspernatur illum molestias, delectus sint. Tenetur natus modi
                        eum maxime, quis, facere odit accusantium magnam incidunt fugiat voluptates enim.</p>
                </div>
            </div>
            <div class="card-explication oldCars-js">
                <div class="card-wrapper hide-1 right-transition">
                    <div class="card card-moto">
                        <div class="card-background">
                            <h3>Moto</h3>
                        </div>
                    </div>
                </div>
                <div class="explication-off">
                    <h3 class="red-background">Supercars</h3>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Eveniet repellat incidunt, cum quas quis
                        atque. Obcaecati non reprehenderit est amet fugiat quam, nisi nesciunt, repellat repellendus
                        rerum magnam quae eveniet neque aspernatur illum molestias, delectus sint. Tenetur natus modi
                        eum maxime, quis, facere odit accusantium magnam incidunt fugiat voluptates enim.</p>
                </div>
            </div>

    </section>
    <div class="trait-blanc"></div>
    <section id="team" class="section-profil-card hide">
        <h2 class="hide-1 transition">L'équipe <span class="red-text">To Drive</span></h2>
        <div class="profil-list-card">
            <div class="profil-card hide-1 left-transition ">
                <img src="images/editoLouis.jpg" alt="">
                <h3 class="red-background">Louis Duhez</h3>
                <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Dicta veritatis blanditiis voluptates
                    incidunt eos, illum porro quas tempora natus. Eligendi.</p>
            </div>
            <div class="to-drive-presentation hide">
                <h3 class="hide-1 right-transition">Pourquoi <span class="red-text">To Drive</span> ?</h3>
                <p class="hide-3 right-transition">Lorem, ipsum dolor sit amet consectetur adipisicing elit. Neque optio
                    possimus quas laboriosam omnis alias eaque, fuga ut, ipsam velit recusandae consectetur itaque.
                    Perspiciatis ea aliquid maxime nemo placeat saepe, sint beatae unde cumque labore dicta veniam
                    reprehenderit at velit quia corporis ratione ex atque sit quos quidem possimus aliquam.</p>
                <div class="slider-avis hide">
                    <h2 class="red-text right-transition hide-1">FAQ</h2>
                    <details class="first-details">
                        <summary>D'ou viennent les voitures ?</summary>
                        Lorem ipsum dolor sit amet consectetur adipisicing elit. Et dolorum accusamus nobis ab unde sed odio quibusdam deleniti doloribus nam!
                    </details>
                    <details>
                        <summary>Comment ce passe la location ?</summary>
                        Lorem ipsum dolor sit amet consectetur adipisicing elit. Et dolorum accusamus nobis ab unde sed odio quibusdam deleniti doloribus nam!
                    </details>
                    <details>
                        <summary>Comment procéder au paiement ?</summary>
                        Lorem ipsum dolor sit amet consectetur adipisicing elit. Et dolorum accusamus nobis ab unde sed odio quibusdam deleniti doloribus nam!
                    </details>
                    <p>Si vous avez d'autre question n'hésité pas à nous contacter :<br> <a href="mailto:louis.duhez@gmail.com">louis.duhez@gmail.com</a></p>
                </div>
            </div>
        </div>
    </section>
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
    <script src="https://unpkg.com/counterup2@2.0.2/dist/index.js">	</script>
    <script src="allScript.js"></script>
    <script src="script.js"></script>

</body>

</html>