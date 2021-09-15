<?php
namespace GameListing\Entities;

use GameListing\Abstracts\GameEntityAbstract;

class PCGameEntity extends GameEntityAbstract
{
    public function __construct(string $title, string $thumbnail, string $genre)
    {
        $this->title = $title;
        $this->thumbnail = $thumbnail;
        $this->genre = $genre;
    }
}
