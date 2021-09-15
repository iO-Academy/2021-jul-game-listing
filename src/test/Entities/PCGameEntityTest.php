<?php

require_once ('../Abstracts/GameEntityAbstract.php');
require_once ('../Entities/PCGameEntityTest.php');

use PHPUnit\Framework\TestCase;

class PCGameEntityTest extends TestCase
{
    public function testGetTitle(): string
    {
        $pcGameStub = $this->createMock(\GameListing\Abstracts\GameEntityAbstract::class);
        $pcGameStub->method('getTitle')->willReturn('jonny');
        $game = new \GameListing\Entities\PCGameEntity('jonny', '', '');
        $result = $game->getTitle();
        $this->assertEquals($result, 'jonny');
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