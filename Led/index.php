<?php

require "db.php";

// Afficher les tweets du plus récent au plus ancien
$requete = $database->prepare("SELECT * FROM tweets ORDER BY created_at DESC LIMIT 1");
$requete->execute();

$tweets = $requete->fetch(PDO::FETCH_ASSOC);

$json = json_encode($tweets);

echo $json;
?>
