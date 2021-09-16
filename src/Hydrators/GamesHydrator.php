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
        $regexPattern = '/.*' . $userInput . '.*/';
        $query = $db->query('SELECT `title`, `genre`, `thumbnail` FROM `pc-games` WHERE `title` REGEXP ' . $regexPattern . ';');
        $query->setFetchMode(\PDO::FETCH_CLASS, PCGameEntity::class);
        return $query->fetchAll();
    }

}
