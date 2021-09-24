<?php
namespace GameListing\Hydrators;

use GameListing\Entities\PCGameEntity;

class GamesHydrator
{
    public static function getAllGames(\PDO $db): array
    {
        $query = $db->query('SELECT `title`, `genre`, `thumbnail` FROM `pc-games`;');
        $query->setFetchMode(\PDO::FETCH_CLASS, PCGameEntity::class);
        return $query->fetchAll();
    }
    public static function getGamesByTitle(\PDO $db, string $title): array
    {
        $userInput = trim($title);
        $saferUserInput = preg_replace('/[^A-Za-z0-9\-]/', '', $userInput);
        $query = $db->prepare("SELECT `title`, `genre`, `thumbnail` FROM `pc-games` WHERE `title` REGEXP :saferUserInput;");
        $query->bindParam(':saferUserInput', $saferUserInput);
        $query->setFetchMode(\PDO::FETCH_CLASS, PCGameEntity::class);
        $query->execute();
        return $query->fetchAll();
    }

}
