<?php
namespace GameListing\ViewHelpers;
use GameListing\Abstracts\GameEntityAbstract;

class GameViewHelper
{
  public static function createGameCard(GameEntityAbstract $game): string
  {
      return '<a class="cardWrapper" href="gameDetails.php?id=' . $game->getId() . '"><img src="' . $game->getThumbnail() . '" alt="Image of ' . $game->getTitle() . '"><h2>' .
          $game->getTitle() . '</h2><h3>' . $game->getGenre() . '</h3></a>';
  }
}