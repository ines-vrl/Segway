<?php
require "config.php";

if ($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['term'])) {
    $search = $_GET['term'];

    $requete = $database->prepare("SELECT tweets.content, tweets.created_at, users.username 
                                FROM tweets
                                INNER JOIN users ON tweets.user_id = users.id
                                WHERE tweets.content LIKE :term");
    $requete->execute(['term' => '%' . $search . '%']);
    $tweets = $requete->fetchAll(PDO::FETCH_ASSOC);
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Twixer - Résultats de recherche</title>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
    <h1>Résultats de recherche</h1>

    <!-- Affichage des tweets correspondants à la recherche -->
    <div class="tweets">
        <?php if (!empty($tweets)): ?>
            <?php foreach ($tweets as $tweet): ?>
                <div class="tweet">
                    <p class="content"><?= $tweet['content'] ?></p>
                    <p class="user">Posté par : <?= $tweet['username'] ?> le : <? $tweet['created_at']?></p>
                </div>
            <?php endforeach; ?>
        <?php else: ?>
            <p>Aucun résultat trouvé.</p>
        <?php endif; ?>
    </div>

    <!-- Nouveau formulaire de recherche -->
    <h2>Rechercher des tweets</h2>
    <form method="get" action="search.php">
        <input type="text" name="term" placeholder="Rechercher...">
        <button type="submit">Rechercher</button>
    </form>
</body>
</html>