<?php

require_once ('../Abstracts/GameEntityAbstract.php');
require_once ('../Entities/PCGameEntityTest.php');

use PHPUnit\Framework\TestCase;

class PCGameEntityTest extends TestCase
{
    public function testGetTitle(): string
    {
        $pcGameStub = $this->createMock(\GameListing\Entities\PCGameEntity::class);
        $pcGameStub->method('getTitle')->willReturn()
        return $this->title;
    }

    public function testGetGenre(): string
    {
        return $this->genre;
    }

    public function testGetThumbnail(): string
    {
        return $this->thumbnail;
    }
}