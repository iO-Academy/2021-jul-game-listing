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
        <div class="imageDetailsWrapper">
            <img src="<?php echo $game->getThumbnail(); ?>">
            <div class="gameDetails">
                <h4>Platform:</h4>
                <p><?php echo $game->getPlatform(); ?></p>
                <h4>Developer:</h4>
                <p><?php echo $game->getDeveloper(); ?></p>
                <h4>Publisher:</h4>
                <p><?php echo $game->getPublisher(); ?></p>
                <h4>Release Date:</h4>
                <p><?php echo $game->getReleaseDate(); ?></p>
                <a class="playGameButton" href="<?php echo $game->getGameUrl(); ?>" target="_blank">Play Game</a>
            </div>
        </div>
        <p class="gameDescription"><?php echo $game->getShortDescription(); ?></p>
    </div>
</body>
</html>
