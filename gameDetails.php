<?php

require 'vendor/autoload.php';
use GameListing\Hydrators\GamesHydrator;

$db = new PDO('mysql:host=db;dbname=games', 'root', 'password');
$valid_ids_query = $db->query('SELECT COUNT(id) FROM `pc-games`;');
$valid_ids = $valid_ids_query->fetch()[0];
$gameId = $_GET['id'];

if (!isset($_GET['id']) || $_GET['id'] < 0 | $_GET['id'] > $valid_ids){
    header('Location: index.php');
} else {
    $game = GamesHydrator::getGameById($db, $gameId);
}
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
