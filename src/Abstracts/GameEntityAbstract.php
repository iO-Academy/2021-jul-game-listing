<?php
namespace GameListing\Abstracts;

abstract class GameEntityAbstract
{
    protected string $title;
    protected string $genre;
    protected string $thumbnail;
    protected int $id;

    public function getTitle(): string
    {
        return $this->title;
    }

    public function getGenre(): string
    {
        return $this->genre;
    }

    public function getThumbnail(): string
    {
        return $this->thumbnail;
    }

    public function getId(): int
    {
        return $this->id;
    }
}
