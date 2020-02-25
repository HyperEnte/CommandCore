<?php

namespace HyperEnte\CommandCore\forms;

use HyperEnte\CommandCore\CommandCore;
use jojoe77777\FormAPI\CustomForm;
use pocketmine\Player;
use pocketmine\item\Item;

class SizeForm extends CustomForm {

    public function __construct() {

        $callable = function (Player $player, $data) {

            if ($data == null) return;

                $player->setScale($data[0]);

        };

        parent::__construct($callable);

        $this->setTitle("Change Size");

        $this->addSlider("Chose your Size", 1, 4, 1);

    }

}