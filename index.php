<?php

require 'vendor/autoload.php';

use GameListing\Hydrators\GamesHydrator;
use GameListing\ViewHelpers\GameViewHelper;
$db = new PDO('mysql:host=db;dbname=games', 'root', 'password');
$games = GamesHydrator::getAllGames($db);

foreach($games as $game) {
  echo GameViewHelper::createGameCard($game);

}