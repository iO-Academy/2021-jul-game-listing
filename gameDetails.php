<?php

require 'vendor/autoload.php';

use GameListing\Hydrators\GamesHydrator;

$gameId = $_GET['id'];

$db = new PDO('mysql:host=db;dbname=games', 'root', 'password');
$game = GamesHydrator::getGameById($db, $gameId);

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
            <h3><?php echo $game->getGenre(); ?></h3>
        </div>
        <div>
            <img src="<?php echo $game->getThumbnail(); ?>">
            <div>
                <ul>
                    <li><?php echo $game->getPlatform(); ?></li>
                    <li><?php echo $game->getDeveloper(); ?></li>
                    <li><?php echo $game->getPublisher(); ?></li>
                    <li><?php echo $game->getReleaseDate(); ?></li>
                </ul>
                <a href="<?php echo $game->getGameUrl(); ?>">Play Game</a>
            </div>
        </div>
        <p><?php echo $game->getShortDescription(); ?></p>
    </div>
</body>
</html>
