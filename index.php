<?php

require 'vendor/autoload.php';

use GameListing\Hydrators\GamesHydrator;

$db = new PDO('mysql:host=db;dbname=games', 'root', 'password');
$games = GamesHydrator::getAllGames($db);

print_r($games);