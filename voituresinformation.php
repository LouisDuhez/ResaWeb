<?php
/*On lie la base de donné*/
include("connect.php");
/*On selectionne la voiture en fonction de l'id contenue dans la requete*/
$requete= "SELECT * FROM `rw_cars` WHERE Cars_id={$_GET["id"]}";
$stmt=$db->query($requete);
$Cars=$stmt->fetchall(PDO::FETCH_ASSOC);
foreach($Cars as $cars){

?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Information Sur <?= $cars["Cars_marque"]?> <?= $cars["Cars_nom"]?> - TO Drive</title>
</head>
<body>
    
</body>
</html>

<?php
 } 
?>