<?php

$request = curl_init("https://www.freetogame.com/api/games?platform=pc");
curl_setopt($request, CURLOPT_RETURNTRANSFER, 1);
$response = curl_exec($request);
$data = json_decode($response, true);

$db = new PDO('mysql:host=127.0.0.1; dbname=games', 'root', 'password');
$db->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
$query = $db->prepare('INSERT INTO `pc-games` (`title`, `thumbnail`, `shortDescription`, `gameUrl`, `genre`, `platform`, `publisher`, `developer`, `releaseDate`, `freetogameProfileUrl`) VALUES (:title, :thumbnail, :shortDescription, :gameUrl, :genre, :platform, :publisher, :developer, :releaseDate, :freetogameProfileUrl);');

foreach ($data as $game ) {
    $query->bindParam(':title', $game['title']);
    $query->bindParam(':thumbnail', $game['thumbnail']);
    $query->bindParam(':shortDescription', $game['short_description']);
    $query->bindParam(':gameUrl', $game['game_url']);
    $query->bindParam(':genre', $game['genre']);
    $query->bindParam(':platform', $game['platform']);
    $query->bindParam(':publisher', $game['publisher']);
    $query->bindParam(':developer', $game['developer']);
    $query->bindParam(':releaseDate', $game['release_date']);
    $query->bindParam(':freetogameProfileUrl', $game['freetogame_profile_url']);

    $query->execute();
}
