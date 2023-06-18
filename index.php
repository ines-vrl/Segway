<?php
session_start();
require "config.php";

// Afficher les tweets du plus récent au plus ancien
$requete = $database->prepare("SELECT * FROM tweets INNER JOIN users ON tweets.user_id = users.id ORDER BY created_at DESC");
$requete->execute();
$tweets = $requete->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Acceuil</title>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
    <header>
        <div class="segway">
            <h1>SEGWAY</h1>
        </div>
    
    
        <!-- Formulaire de recherche -->
        <div class="recherche-form">
            <form method="get" action="search.php">
                <input type="text" name="term" placeholder="Recherche">
                <button class="search-btn" type="submit">Rechercher</button>
            </form>
        </div>

    </header>
    
    
    <nav>
        <ul>
            <div class="ul-nav">
                <li><a href="#">Accueil</a></li>
                <li><a href="./profil.php">Profil</a></li>
                <li><a href="#">Messages</a></li>
                <li><a href="#">Inscription/Connexion</a></li>
            </div>
        </ul>
    </nav>
    
    
    <main>
            <div class="blog-title">
                <p>Blogs stars</p>
                <article class="blogs">
                    <ul>
                        <div class="ul-blogs">
    
                            <li><a href="https://www.justjared.com/2023/05/20/kim-kardashian-discusses-emotional-challenge-of-being-a-single-parent-recalls-crying-herself-to-sleep-some-nights/">
                                Kim Kardashian en tant que mère célibataire.</a>
                                <img src="images/kim-kardashian.jpg" alt="Picture">
                            </li>
                                
                            <li><a href="https://www.justjared.com/2023/05/21/taylor-swift-tells-fans-shes-never-been-this-happy-in-my-life-amid-matty-healy-romance-rumors/">
                                Taylor Swift n'a "jamais été aussi heureuse".</a>
                                <img src="images/taylor-swift-life-update.jpg" alt="Picture">
                            </li>
    
                            <li><a href="https://www.justjared.com/2023/03/08/cole-sprouse-reveals-what-happened-at-the-end-of-lili-reinhart-split-who-ended-things-how-they-get-along-today-the-age-he-lost-his-virginity-his-relationship-with-ari-fournier-more-on-call/">
                            Cole Sprouse sur sa rupture avec Lili Reinhart</a>
                            <img src="images/cole-sprouse-call-her-daddy.jpg">
                            </li>
    
                            <li><a href="https://www.justjared.com/2023/03/08/kendall-jenner-bad-bunny-hug-seemingly-kiss-after-sushi-meal-amid-dating-rumors">
                            Bad Bunny et Kendall Jenner en couple ?</a>
                            <img src="images/bad-bunny-kendall.jpg">
    
                            </li>                   
                        </div>
                    </ul>
                </article>
            </div>      
    
    </main>

<!-- Formulaire pour créer un nouveau twix -->
<p class="create-blog"> Créer un nouveau blog</p>
<form method="post" action="add_tweet.php">
    <textarea name="content" placeholder="Quoi de neuf ?"></textarea>
    <input type="hidden" name="user_id" value="1">
    <button class="submit-btn" type="submit">Envoyer</button>
</form>

    <!-- Affichage des tweets -->
    <div class="tweets">
        <?php foreach ($tweets as $tweet): ?>
            <div class="tweet">
                <p class="content"><?= $tweet['content'] ?></p>
                <p class="user">Posté par : <?= $tweet['username'] . " " ?> <img src="/projet/images/'<?= $tweet['photo'] ?>"
                 alt="Photo de l'utilisateur"> le <?= $tweet['created_at']; ?></p>
                <form method="post" action="delete_tweet.php">
                    <input type="hidden" name="tweet_id" value="<?= $tweet['tweet_id'] ?>">
                    <button type="submit" class="delete-btn">Supprimer</button>
                </form>
            </div>
        <?php endforeach; ?>
    </div>



        <footer>
            <div class="contact">
                <p>Nous contacter</p>
            </div>
            
            <ul class="ulfooter">
                <li><button class="facebook" type="button"><a href="https://fr-fr.facebook.com">Facebook</a></button></li>
                <li><button class="instagram" type="button"><a href="https://www.instagram.com">Instagram</a></button></li>
                <li><button class="twitter" type="button"><a href="https://twitter.com">Twitter</a></button></li>
                <li><button class="linkedin" type="button"><a href="https://fr.linkedin.com">LinkedIn</a></button></li>
            </ul>
        </footer>

</body>
</html>
