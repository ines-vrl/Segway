<?php
require "config.php";

//Je récupère les valeurs de content et user_id, je les insère et je les lie aux colonnes de ma bdd
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $content = $_POST['content'];
    $user_id = $_POST['user_id'];

    // Insérer le nouveau tweet dans la base de données
    $statement = $database->prepare("INSERT INTO tweets (content, user_id) VALUES (:content, :user_id)");
    $statement->bindParam(':content', $content);
    $statement->bindParam(':user_id', $user_id);
    $statement->execute();

    header("Location: index.php");
    exit();
}
?>