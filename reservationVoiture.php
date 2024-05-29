<?php
include ("connect.php");
$nom = htmlspecialchars($_GET["nom"]);
$prenom = htmlspecialchars($_GET["prenom"]);
$email = htmlspecialchars($_GET["email"]);
$voiture = htmlspecialchars($_GET["voiture"]);
$voiture2 = htmlspecialchars($_GET["voiture2"]);
$date =($_GET["date"]);

$verifclient = "SELECT COUNT(*) AS verif FROM rw_clients WHERE Clients_nom = '$nom' AND Clients_prenom ='$prenom' AND Clients_mail ='$email'";
$verif = $db->query($verifclient);
$verifResult = $verif->fetchall(PDO::FETCH_ASSOC);
foreach ($verifResult as $result) {
echo $result["verif"];
};
if ($result["verif"] == 0) {
    $requete = "
    INSERT INTO rw_clients (Clients_nom, Clients_prenom, Clients_mail) 
    VALUES ('$nom','$prenom','$email')";
    $db->query($requete);

    $requeteLocations = "
    INSERT INTO rw_locations (fk_cars, fk_clients,loca_date_debut,loca_prix)
    VALUES ('$voiture',(SELECT Clients_id FROM rw_clients ORDER BY Clients_id DESC LIMIT 1),'$date',(SELECT Cars_prix FROM rw_cars WHERE $voiture = Cars_id))";
    $db->query($requeteLocations);
    
    if ($voiture2 =="none"){

    }
    else {
        $requeteLocations2 ="
    INSERT INTO rw_locations (fk_cars, fk_clients,loca_date_debut,loca_prix)
    VALUES ('$voiture2',(SELECT Clients_id FROM rw_clients ORDER BY Clients_id DESC LIMIT 1),'$date',(SELECT Cars_prix FROM rw_cars WHERE $voiture2 = Cars_id))";
    $db->query($requeteLocations2);
    }
    
}
else {
    $requeteLocations = "
    INSERT INTO rw_locations (fk_cars, fk_clients,loca_date_debut,loca_prix)
    VALUES ('$voiture',(SELECT Clients_id FROM rw_clients ORDER BY Clients_id DESC LIMIT 1),'$date',(SELECT Cars_prix FROM rw_cars WHERE $voiture = Cars_id))";
    $db->query($requeteLocations);
    
    if ($voiture2 =="none"){

    }
    else {
        $requeteLocations2 ="
    INSERT INTO rw_locations (fk_cars, fk_clients,loca_date_debut,loca_prix)
    VALUES ('$voiture2',(SELECT Clients_id FROM rw_clients ORDER BY Clients_id DESC LIMIT 1),'$date',(SELECT Cars_prix FROM rw_cars WHERE $voiture2 = Cars_id))";
    $db->query($requeteLocations2);
    }
}

// Mail : 
// $nbtotal= "SELECT Cars_nom, Cars_marque Cars_prix FROM rw_cars WHERE Cars_id = $_GET["voiture"]";
// $nbcars = $db->query($nbtotal);
// $result = $nbcars->fetchall(PDO::FETCH_ASSOC);
// foreach ($result as $row) {

// $destinataire = "$email";
// $sujet ="Votre réservation à bien été prise en compte !";
// $message = "<html><body>";
// $message .="<h1>Votre réservation de $row['Cars_marque'] $row['Cars_nom'] est validé</h1>";
// $message .="<p>Votre voiture vous sera livré pour un total de $row['Cars_prix']</p>";
// $message .="<p>Merci de votre confiance et à bientôt sur TO DRIVE</p>";
// $message .="</body></html>";

// $header = "From: contact@duhez.butmmi.o2switch.site\r\n";
// $header .="Reply-To:  contact@duhez.butmmi.o2switch.site\r\n";
// $header .= "Content-Type = text/html; charset=\"utf-8\"\r\n";

// //Envoie
// if(mail($destinataire, $sujet, $message, $header)) {
//     echo "L'email a été envoyé !";
// }
// else {
//     echo "Une erreur est survenue";
// }

// };
header('Location:http://localhost/SAE_RESAWEB/ReservationValid.php')
?>
