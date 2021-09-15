<?php

require_once ('../../Abstracts/GameEntityAbstract.php');
require_once ('../../ViewHelpers/GameViewHelper.php');


use PHPUnit\Framework\TestCase;
use GameListing\Abstracts\GameEntityAbstract;
use GameListing\ViewHelpers\GameViewHelper;

class ViewHelperTest extends TestCase
{
	public function testViewHelperSuccess()
	{
		$gameStub = $this->createMock(GameEntityAbstract::class);
		$gameStub->title = 'Title';
		$gameStub->thumbnail = 'Thumbnail';
		$gameStub->genre = 'Genre';
		$expectedOutput = '<div><img src="Thumbnail" alt="Image of Title"><h2>Title</h2><h3>Genre</h3></div>';
		$actualOutput = GameViewHelper::createGameCard($gameStub);
		$this->assertEquals($expectedOutput, $actualOutput);
	}
}