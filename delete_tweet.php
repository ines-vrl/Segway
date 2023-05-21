<?php
require "config.php";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $tweet_id = $_POST['tweet_id'];

    // Supprimer le tweet de la base de données
    $requete = $database->prepare("DELETE FROM tweets WHERE tweet_id = :tweet_id");
    $requete->bindParam(':tweet_id', $tweet_id);
    $requete->execute();

    header("Location: index.php");
    exit();
}
?>
