<?php

require_once ('../../Abstracts/GameEntityAbstract.php');
require_once ('../../Entities/PCGameEntity.php');

use PHPUnit\Framework\TestCase;
use GameListing\Entities\PCGameEntity;
use GameListing\Abstracts\GameEntityAbstract;

class PCGameEntityTest extends TestCase
{
    public function testGetTitleSuccess()
    {
        $pcGameStub = $this->createMock(GameEntityAbstract::class);
        $pcGameStub->method('getTitle')->willReturn('jonny');
        $game = new PCGameEntity('jonny', '', '');
        $this->assertEquals($game->getTitle(), 'jonny');
    }

	public function testGetGenreSuccess()
	{
		$pcGameStub = $this->createMock(GameEntityAbstract::class);
		$pcGameStub->method('getGenre')->willReturn('Sci-fi');
		$game = new PCGameEntity('', '', 'Sci-fi');
		$this->assertEquals($game->getGenre(), 'Sci-fi');
	}

	public function testGetThumbnailSuccess()
	{
		$pcGameStub = $this->createMock(GameEntityAbstract::class);
		$pcGameStub->method('getThumbnail')->willReturn('bloop');
		$game = new PCGameEntity('', 'bloop', '');
		$this->assertEquals($game->getThumbnail(), 'bloop');
	}
}