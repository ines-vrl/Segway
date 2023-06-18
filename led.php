<?php

require 'config.php';

$requete = $base->prepare("SELECT * FROM tweets ORDER BY created_at DESC LIMIT 1");
$requete->execute();

$requete = $requete->fetch(PDO::FETCH_ASSOC);
echo json_encode($requete);

?>