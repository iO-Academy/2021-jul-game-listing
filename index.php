<?php

require 'vendor/autoload.php';

use GameListing\Hydrators\GamesHydrator;
use GameListing\ViewHelpers\GameViewHelper;
$db = new PDO('mysql:host=db;dbname=games', 'root', 'password');
$games = GamesHydrator::getAllGames($db);
if(isset($_GET['query'])){
    $gamesByQuery = GamesHydrator::getGamesByTitle($db, $_GET['query']);
}
?>

<!DOCTYPE html>
<html lang="eng">
<head>
    <title>Mongoose Game Listing</title>
    <link rel="stylesheet" href="https://use.typekit.net/mpi6fsb.css">
    <link rel="stylesheet" href="normalize.css">
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <nav>
        <div class="searchContainer">
            <form>
                <input type="search" name="query" placeholder="search by title" aria-label="search by title"
                       role="search" value="<?php if(isset($_GET['query'])) {echo $_GET['query'];} ?>">
                <button type="submit">Search</button>
            </form>
            <a href="index.php"><button>Clear</button></a>
        </div>
    </nav>
    <main id="homePage">
        <h1>Mongoose Game Listing</h1>
        <div class="cardContainer">
            <?php
            if (isset($_GET['query']) && !empty($_GET['query'])) {
                foreach ($gamesByQuery as $game) {
                    echo GameViewHelper::createGameCard($game);
                }
            } else {
                foreach($games as $game) {
                    echo GameViewHelper::createGameCard($game);
                }
            }
            ?>
        </div>
    </main>
    <footer>
        <a href="#homePage">back to top</a>
    </footer>
</body>
</html>
