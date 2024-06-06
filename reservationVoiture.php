<?php
include ("connect.php");

// Utilisation de prepared statements pour sécuriser les entrées utilisateur
$nom = htmlspecialchars($_GET["nom"]);
$prenom = htmlspecialchars($_GET["prenom"]);
$email = htmlspecialchars($_GET["email"]);
$voiture = htmlspecialchars($_GET["voiture"]);
$voiture2 = htmlspecialchars($_GET["voiture2"]);
$date = htmlspecialchars($_GET["date"]);

// Vérification de l'existence du client
$verifclient = $db->prepare("SELECT COUNT(*) AS verif FROM rw_clients WHERE Clients_nom = :nom AND Clients_prenom = :prenom AND Clients_mail = :email");
$verifclient->execute([':nom' => $nom, ':prenom' => $prenom, ':email' => $email]);
$verifResult = $verifclient->fetch(PDO::FETCH_ASSOC);
$clientExists = $verifResult['verif'];

// Si le client n'existe pas, insertion du nouveau client
if ($clientExists == 0) {
    $requete = $db->prepare("
        INSERT INTO rw_clients (Clients_nom, Clients_prenom, Clients_mail) 
        VALUES (:nom, :prenom, :email)");
    $requete->execute([':nom' => $nom, ':prenom' => $prenom, ':email' => $email]);

    // Récupérer l'ID du client nouvellement créé
    $clientId = $db->lastInsertId();
} else {
    // Récupérer l'ID du client existant
    $requeteClientId = $db->prepare("SELECT Clients_id FROM rw_clients WHERE Clients_nom = :nom AND Clients_prenom = :prenom AND Clients_mail = :email");
    $requeteClientId->execute([':nom' => $nom, ':prenom' => $prenom, ':email' => $email]);
    $client = $requeteClientId->fetch(PDO::FETCH_ASSOC);
    $clientId = $client['Clients_id'];
}

// Insérer la location pour la première voiture
$requeteLocations = $db->prepare("
    INSERT INTO rw_locations (fk_cars, fk_clients, loca_date_debut, loca_prix)
    VALUES (:voiture, :clientId, :date, (SELECT Cars_prix FROM rw_cars WHERE Cars_id = :voiture))");
$requeteLocations->execute([':voiture' => $voiture, ':clientId' => $clientId, ':date' => $date]);

// Insérer la location pour la deuxième voiture si nécessaire
if ($voiture2 != "none") {
    $requeteLocations2 = $db->prepare("
        INSERT INTO rw_locations (fk_cars, fk_clients, loca_date_debut, loca_prix)
        VALUES (:voiture2, :clientId, :date, (SELECT Cars_prix FROM rw_cars WHERE Cars_id = :voiture2))");
    $requeteLocations2->execute([':voiture2' => $voiture2, ':clientId' => $clientId, ':date' => $date]);
}

// Préparer l'email de confirmation
$nbtotal = $db->prepare("SELECT Cars_nom, Cars_marque, Cars_prix FROM rw_cars WHERE Cars_id = :voiture OR Cars_id = :voiture2");
$nbtotal->execute([':voiture' => $voiture, ':voiture2' => $voiture2]);
$result = $nbtotal->fetchAll(PDO::FETCH_ASSOC);

// Informations de l'email
$destinataire = $email;
$sujet = "Votre réservation a bien été prise en compte !";
$prixTotal = 0;

// Message HTML
$message = "<html><body>";
$message .= "<h1>Votre réservation est validée</h1>";
$message .= "<p>Merci $nom $prenom pour avoir réservé chez nous</p>";
foreach ($result as $row) {
    $message .= "<p>Vous pouvez récupérer votre {$row['Cars_marque']} {$row['Cars_nom']} le $date pour un prix de {$row['Cars_prix']} €</p>";
    $prixTotal += $row['Cars_prix'];
}
$message .= "<p>Votre réservation a pour total $prixTotal €</p>";
$message .= "<p>Merci de votre confiance et à bientôt sur TO DRIVE</p>";
$message .= "</body></html>";

// Headers
$headers = "From: contact@resaweb.duhez.butmmi.o2switch.site\r\n";
$headers .= "Reply-To: contact@resaweb.duhez.butmmi.o2switch.site\r\n";
$headers .= "Content-Type: text/html; charset=\"utf-8\"\r\n";

// Envoi de l'email
if (mail($destinataire, $sujet, $message, $headers)) {
    echo "L'email a été envoyé !";
} else {
    echo "Une erreur est survenue";
}

// Redirection
header('Location:http://localhost/SAE_RESAWEB/ReservationValid.php');
exit();
?>