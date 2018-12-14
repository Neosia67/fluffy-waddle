<?php

namespace Hackathon\PlayerIA;

use Hackathon\Game\Result;

/**
 * Class DaddyPlayer
 * @package Hackathon\PlayerIA
 * @author DaddyD
 */
class DaddyPlayer extends Player
{
    protected $mySide;
    protected $opponentSide;
    protected $result;

    public function getChoice()
    {
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
 
        $p1 = 100;
        $p2 = 20;
        $p3 = 40;
        $p4 = 50;
        $rnd = rand(0, 100);
        $myLast = $this->result->getLastChoiceFor($this->mySide);
        $opLast = $this->result->getLastChoiceFor($this->opponentSide);

        if ($myLast == parent::friendChoice() && $myLast == $opLast) {
            if ($rnd < $p1)
                return parent::friendChoice();
            else
                return parent::foeChoice();
        }
        if ($myLast == parent::friendChoice() && $myLast != $opLast) {
            if ($rnd < $p2)
                return parent::friendChoice();
            else
                return parent::foeChoice();
        }
        if ($myLast == parent::foeChoice() && $myLast != $opLast) {
            if ($rnd < $p3)
                return parent::friendChoice();
            else
                return parent::foeChoice();
        }
        if ($myLast == parent::foeChoice() && $myLast == $opLast) {
            if ($rnd < $p4)
                return parent::friendChoice();
            else
                return parent::foeChoice();
        }
        return parent::friendChoice();   
    }
};
