<?php

require_once ('../../Abstracts/GameEntityAbstract.php');
require_once ('../../ViewHelpers/GameViewHelper.php');


use PHPUnit\Framework\TestCase;
use GameListing\Abstracts\GameEntityAbstract;
use GameListing\ViewHelpers\GameViewHelper;

class GameViewHelperTest extends TestCase
{
	public function testGameViewHelperSuccess()
	{
		$gameStub = $this->createMock(GameEntityAbstract::class);
		$gameStub->method('getTitle')->willReturn('Title');
		$gameStub->method('getThumbnail')->willReturn('Thumbnail');
		$gameStub->method('getGenre')->willReturn('Genre');
        $gameStub->method('getId')->willReturn(1);
		$expectedOutput = '<a class="cardWrapper" href="gameDetails.php?id=1"><img src="Thumbnail" alt="Image of Title"><h2>Title</h2><h3>Genre</h3></a>';
		$actualOutput = GameViewHelper::createGameCard($gameStub);
		$this->assertEquals($expectedOutput, $actualOutput);
	}

	public function testGameViewHelperMalformed()
	{
		$this->expectException(TypeError::class);
		GameViewHelper::createGameCard(22);
	}
}