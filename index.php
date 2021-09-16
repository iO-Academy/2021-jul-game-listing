<?php

require 'vendor/autoload.php';

use GameListing\Hydrators\GamesHydrator;
use GameListing\ViewHelpers\GameViewHelper;
$db = new PDO('mysql:host=db;dbname=games', 'root', 'password');
$games = GamesHydrator::getAllGames($db);

?>

<!DOCTYPE html>
<html lang="eng">
<head>
    <title>Game Listing</title>
    <link rel="stylesheet" href="https://use.typekit.net/mpi6fsb.css">
    <link rel="stylesheet" href="normalize.css">
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <header>
        <a href="#"><img src=""></a>
    </header>
    <main id="homePage">
        <h1>Game Listing</h1>
        <div class="cardContainer">
            <?php
                foreach($games as $game) {
                    echo GameViewHelper::createGameCard($game);
                }
            ?>
        </div>
    </main>
    <footer>
        <a href="#homePage">back to top</a>
    </footer>
</body>
</html>
