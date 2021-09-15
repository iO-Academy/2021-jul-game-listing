<?php
echo "Getting data from API\n";

$request = curl_init("https://www.freetogame.com/api/games?platform=pc");
curl_setopt($request, CURLOPT_RETURNTRANSFER, 1);
$response = curl_exec($request);
$data = json_decode($response, true);

echo "Connecting to database\n";

$db = new PDO('mysql:host=127.0.0.1; dbname=games', 'root', 'password');
$db->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);

$db->query('
	DROP TABLE IF EXISTS `pc-games`;
	CREATE TABLE `pc-games` (
	`id` int(11) unsigned NOT NULL AUTO_INCREMENT,
	  `title` varchar(50) DEFAULT NULL,
	  `thumbnail` varchar(200) DEFAULT NULL,
	  `shortDescription` varchar(1000) DEFAULT NULL,
	  `gameUrl` varchar(200) DEFAULT NULL,
	  `genre` varchar(20) DEFAULT NULL,
	  `platform` varchar(200) DEFAULT NULL,
	  `publisher` varchar(100) DEFAULT NULL,
	  `developer` varchar(100) DEFAULT NULL,
	  `releaseDate` date DEFAULT NULL,
	  `freetogameProfileUrl` varchar(200) DEFAULT NULL,
	  PRIMARY KEY (`id`)
	) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;');

echo "Populating database\n";

$query = $db->prepare(
    'INSERT INTO `pc-games` (`title`, `thumbnail`, `shortDescription`, `gameUrl`, `genre`, `platform`, 
                        `publisher`, `developer`, `releaseDate`, `freetogameProfileUrl`) 
                        VALUES (:title, :thumbnail, :shortDescription, :gameUrl, :genre, :platform, :publisher, 
                                :developer, :releaseDate, :freetogameProfileUrl);');

foreach ($data as $game) {
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

echo "Complete\n";
