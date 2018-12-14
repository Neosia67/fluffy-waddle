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
        $rd = $this->result->getNbRound();
        $opp_name = $this->result->getStatsFor($this->opponentSide)['name'];

        // Gang du T99, les seuls, les vrais.
        $gangDuT99 = array("Mattiashell", "Santost", "Paultato", "Vcollette");
        // On merite pas leur travail
        $ennemis = array('Akatsuki95', 'Vegan60');
        
        // Technique ancestrale du T99
        if ($rd === 99) {
            // On sauce les freres, TMTC
            if (in_array($opp_name, $gangDuT99))
                return parent::friendChoice();
            // Les autres on les tape
            return parent::foeChoice();
        }

        // Pour evacuer sa frustration
        if (in_array($opp_name, $ennemis))
            return parent::foeChoice();

        // Le premier tour
        if ($rd == 0)
            return parent::friendChoice();

        // Oeil pour oeil
        if ($this->result->getLastChoiceFor($this->opponentSide) == parent::foeChoice())
            return parent::foeChoice();

        if ($rd > 1){
            // Recup des 2 derniers tours
            $op_ch = $this->result->getChoicesFor($this->mySide);
            $last = $op_ch[$rd - 1];
            $two = $op_ch[$rd - 2];
            // Je lui mets une double couche pour marquer le coup
            if ($last == parent::foeChoice() && $two == parent::friendChoice())
                return parent::foeChoice();
        }
        
        // Faut bien être gentil de temps en temps 
        return parent::friendChoice();
    }
 
};