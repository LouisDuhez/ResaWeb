<?php
include ("connect.php");
$nom = htmlspecialchars($_GET["nom"]);
$prenom = htmlspecialchars($_GET["prenom"]);
$email = htmlspecialchars($_GET["email"]);
$voiture = htmlspecialchars($_GET["voiture"]);

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
    INSERT INTO rw_locations (fk_cars, fk_clients)
    VALUES ('$voiture',(SELECT Clients_id FROM rw_clients ORDER BY Clients_id DESC LIMIT 1))";
    $db->query($requeteLocations);
}
else {
    $requeteLocations = "
    INSERT INTO rw_locations (fk_cars, fk_clients)
    VALUES ('$voiture',(SELECT Clients_id FROM rw_clients ORDER BY Clients_id DESC LIMIT 1))";
    $db->query($requeteLocations);
}



header('Location:http://localhost/SAE_RESAWEB/index.php?#avis-formulaire')
?>
