<?php
namespace GameListing\Hydrators;

use GameListing\Entities\PCGameEntity;
use GameListing\Entities\DetailedPCGameEntity;

class GamesHydrator
{
    public static function getAllGames(\PDO $db): array
    {
        $query = $db->query('SELECT `title`, `genre`, `thumbnail`, `id` FROM `pc-games`;');
        $query->setFetchMode(\PDO::FETCH_CLASS, PCGameEntity::class);
        return $query->fetchAll();
    }

    public static function getGameById(\PDO $db, int $id): DetailedPCGameEntity
    {
        $query = $db->query('SELECT `id`, `title`, `genre`, `thumbnail`, `shortDescription`, `gameUrl`,
       `genre`, `platform`, `publisher`, `developer`, `releaseDate`, `freetogameProfileUrl`
        FROM `pc-games` WHERE `id` = :id;');
        $query->bindParam(':id', $id);
        $query->setFetchMode(\PDO::FETCH_CLASS, DetailedPCGameEntity::class);
        return $query->fetch();
    }
}
