<?php
include ("connect.php");

$nom = htmlspecialchars($_GET["nom"]);
$prenom = htmlspecialchars($_GET["prenom"]);
$email = htmlspecialchars($_GET["email"]);
$avi = htmlspecialchars($_GET["avi"]);
$requete = ("INSERT INTO `rw_clients_avis`(`clients_avis_nom`, `clients_avis_prenom`, `clients_avis_email`, `clients_avis_text`) VALUES ('$nom','$prenom','$email','$avi')");
$db->query($requete);
header('Location:http://localhost/SAE_RESAWEB/index.php?#avis-formulaire');
?>

