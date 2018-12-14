<?php
namespace Hackathon\PlayerIA;
use Hackathon\Game\Result;
/**
 * Class LovePlayer
 * @package Hackathon\PlayerIA
 * @author Meshufr
 */
class IssamPlayer extends Player
{
    protected $mySide;
    protected $opponentSide;
    protected $result;
    public function mirrorFoe()
    {
      $opponentActions = $this->result->getChoicesFor($this->opponentSide);
      $opponentLastAction = $this->result->getLastChoiceFor($this->opponentSide);
      if (!$opponentLastAction)
        return parent::foeChoice();
      return $opponentLastAction;
    }
    public function bastardMove()
    {
      $roundNb = $this->result->getNbRound();
      $opponentStats = $this->result->getStatsFor($this->opponentSide);
      if ($opponentStats['foe'] == $this->result->getNbRound() && $this->result->getNbRound())
      {
        return parent::foeChoice();
      }
      else if ($roundNb > 8 || $this->result->getLastChoiceFor($this->opponentSide))
        return parent::foeChoice();
      return parent::friendChoice();
    }
    public function getChoice()
    {
        return $this->bastardMove();
        // -------------------------------------    -----------------------------------------------------
        // How to get my Last Choice           ?    $this->result->getLastChoiceFor($this->mySide) -- if 0 (first round)
        // How to get the opponent Last Choice ?    $this->result->getLastChoiceFor($this->opponentSide) -- if 0 (first round)
        // -------------------------------------    -----------------------------------------------------
        // How to get my Last Score            ?    $this->result->getLastScoreFor($this->mySide) -- if 0 (first round)
        // How to get the opponent Last Score  ?    $this->result->getLastScoreFor($this->opponentSide) -- if 0 (first round)
        // -------------------------------------    -----------------------------------------------------
        // How to get all the Choices          ?    $this->result->getChoicesFor($this->mySide)
        // How to get the opponent Last Choice ?    $this->result->getChoicesFor($this->opponentSide)
        // -------------------------------------    -----------------------------------------------------
        // How to get my Last Score            ?    $this->result->getLastScoreFor($this->mySide)
        // How to get the opponent Last Score  ?    $this->result->getLastScoreFor($this->opponentSide)
        // -------------------------------------    -----------------------------------------------------
        // How to get the stats                ?    $this->result->getStats()
        // How to get the stats for me         ?    $this->result->getStatsFor($this->mySide)
        //          array('name' => value, 'score' => value, 'friend' => value, 'foe' => value
        // How to get the stats for the oppo   ?    $this->result->getStatsFor($this->opponentSide)
        //          array('name' => value, 'score' => value, 'friend' => value, 'foe' => value
        // -------------------------------------    -----------------------------------------------------
        // How to get the number of round      ?    $this->result->getNbRound()
        // -------------------------------------    -----------------------------------------------------
        // How can i display the result of each round ? $this->prettyDisplay()
        // -------------------------------------    -----------------------------------------------------
    }
 
};
