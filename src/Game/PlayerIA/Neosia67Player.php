<?php

namespace Hackathon\PlayerIA;

use Hackathon\Game\Result;

/**
 * Class Neosia67Player
 * @package Hackathon\PlayerIA
 * @author Antoine Legrand
 */
class Neosia67Player extends Player
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
 
        $turnnum = $this->result->getNbRound();
        $opp_name = $this->result->getStatsFor($this->opponentSide)['name'];

        // Gang du T9.
        $gangDuT9 = array("Mattiashell", "Santost", "Paultato", "Vcollette");
        
        // Technique ancestrale du T9
        if ($turnnum === 9) {
            // Gentil avec la confrérie des T9
            if (in_array($opp_name, $gangDuT9))
                return parent::friendChoice();
            return parent::foeChoice();
        }
        if ($this->result->getNbRound() == 0)
            return parent::friendChoice();
        if ($this->result->getLastChoiceFor($this->mySide) == parent::foeChoice())
            return parent::foeChoice();
        if ($this->result->getLastChoiceFor($this->opponentSide) == parent::foeChoice())
            return parent::foeChoice();
        return parent::friendChoice();
    }
 
};