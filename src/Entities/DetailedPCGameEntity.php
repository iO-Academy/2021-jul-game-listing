<?php
namespace GameListing\Entities;

use GameListing\Abstracts\GameEntityAbstract;

class DetailedPCGameEntity extends GameEntityAbstract
{
    private string $shortDescription;
    private string $platform = 'PC (Windows)';
    private string $publisher;
    private string $developer;
    private string $releaseDate;
    private string $gameUrl;

    public function getShortDescription(): string
    {
        return $this->shortDescription;
    }

    public function getPlatform(): string
    {
        return $this->platform;
    }

    public function getPublisher(): string
    {
        return $this->publisher;
    }

    public function getDeveloper(): string
    {
        return $this->developer;
    }

    public function getReleaseDate(): string
    {
        return $this->releaseDate;
    }

    public function getGameUrl(): string
    {
        return $this->gameUrl;
    }
}