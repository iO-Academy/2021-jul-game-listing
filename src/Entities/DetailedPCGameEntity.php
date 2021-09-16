<?php

use GameListing\Abstracts\GameEntityAbstract;

class DetailedPCGameEntity extends GameEntityAbstract
{
    private string $shortDescription;
    private string $platform = 'PC (Windows)';
    private string $publisher;
    private string $developer;
    private Date $releaseDate;
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

    public function getReleaseDate(): Date
    {
        return $this->releaseDate;
    }

    public function getGameUrl(): string
    {
        return $this->gameUrl;
    }
}