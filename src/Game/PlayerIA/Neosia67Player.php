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
        $turnnum = $this->result->getNbRound();
        $opp_name = $this->result->getStatsFor($this->opponentSide)['name'];

        // Gang du T9, les seuls, les vrais.
        $gangDuT99 = array("Mattiashell", "Santost", "Paultato", "Vcollette");
        
        // Technique ancestrale du T99
        if ($turnnum === 99) {
            // On sauce les freres, TMTC
            if (in_array($opp_name, $gangDuT99))
                return parent::friendChoice();
            // Les autres on les tape
            return parent::foeChoice();
        }
        // Le premier tour
        if ($this->result->getNbRound() == 0)
            return parent::friendChoice();

        $rd = $this->result->getNbRound();
        if ($rd > 1){
            $op_ch = $this->result->getChoicesFor($this->opponentSide);
            $last = $op_ch[$rd - 1];
            $two = $op_ch[$rd - 2];
            if ($last == parent::foeChoice() && $two == parent::friendChoice())
                return parent::foeChoice();
        }
        
        if ($this->result->getLastChoiceFor($this->opponentSide) == parent::foeChoice())
            return parent::foeChoice();
        return parent::friendChoice();
    }
 
};