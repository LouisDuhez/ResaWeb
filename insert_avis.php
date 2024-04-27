<?php
include ("connect.php");

$nom = $_GET["nom"];
$prenom = $_GET["prenom"];
$email = $_GET["email"];
$avi = $_GET["avi"];
$requete = ("INSERT INTO `rw_clients_avis`(`clients_avis_nom`, `clients_avis_prenom`, `clients_avis_email`, `clients_avis_text`) VALUES ('$nom','$prenom','$email','$avi')");
$db->query($requete);
header('Location:http://localhost/SAE_RESAWEB/index.php#avis-formulaire');
?>

