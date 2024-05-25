<?php
include ("connect.php");

$nom = htmlspecialchars($_GET["nom"]);
$prenom = htmlspecialchars($_GET["prenom"]);
$email = htmlspecialchars($_GET["email"]);
$avi = htmlspecialchars($_GET["avi"]);

$requete = "
INSERT INTO rw_clients (Clients_nom, Clients_prenom, Clients_mail) 
VALUES ('$nom','$prenom','$email')";
$db->query($requete);

$requeteAvis = "
INSERT INTO rw_clients_avis (Numclients, clients_avis_text)
VALUES (
    (SELECT Clients_id FROM rw_clients ORDER BY Clients_id DESC LIMIT 1), '$avi'
)";
echo "$requeteAvis";
$db->query($requeteAvis);
header('Location:http://localhost/SAE_RESAWEB/index.php?#avis-formulaire')
?>

