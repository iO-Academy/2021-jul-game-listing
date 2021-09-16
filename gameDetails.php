<?php

require 'vendor/autoload.php';

use GameListing\Hydrators\GamesHydrator;

$gameId = $_GET['id'];

$db = new PDO('mysql:host=db;dbname=games', 'root', 'password');
$game = GamesHydrator::getGameById($db, $gameId);
print_r($game);
?>

<!DOCTYPE html>
<html lang="eng">
<head>
    <title>Game Details</title>
    <link rel="stylesheet" href="https://use.typekit.net/mpi6fsb.css">
    <link rel="stylesheet" href="normalize.css">
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <div class="detailsCard">
        <div class="titleWrapper">
            <h2><?php echo $game->getTitle(); ?></h2>
            <h3></h3>
        </div>
        <div>
            <img src="">
            <div>
                <ul>
                    <li></li>
                    <li></li>
                    <li></li>
                    <li></li>
                </ul>
                <button>Play Game</button>
            </div>
        </div>
        <p></p>
    </div>
</body>
</html>
