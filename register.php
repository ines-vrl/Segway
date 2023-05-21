<?php
require "config.php";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    //Je vais récupérer les donnees de l’utilisateur depuis le formulaire d’inscription et je les stockent dans des variables
    $name = $_POST['name'];
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $photo = $_POST['photo'];

    // Insérer le nouvel utilisateur dans la base de données
    $requete = $database->prepare("INSERT INTO users (name, username, email, password, photo) VALUES (:name, :username, :email, :password, :photo)");
    $requete->bindParam(':name', $name);
    $requete->bindParam(':username', $username);
    $requete->bindParam(':email', $email);
    $requete->bindParam(':password', $password);
    $requete->bindParam(':photo', $photo);
    $requete->execute();

    header("Location : index.php");

    exit();
}

?>