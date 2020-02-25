<?php

namespace HyperEnte\CommandCore\commands;

use pocketmine\command\PluginCommand;
use HyperEnte\CommandCore\CommandCore;
use pocketmine\command\CommandSender;
use HyperEnte\CommandCore\forms\SizeForm;
use pocketmine\plugin\Plugin;
use pocketmine\Player;
use jojoe77777\FormAPI\FormAPI;

class SizeCommand extends PluginCommand{
    public function __construct()
    {
        parent::__construct("size", CommandCore::getMain());
        $this->setDescription("Change your Size");
    }
    public function execute(CommandSender $sender, string $commandLabel, array $args)
    {
        if(!$sender instanceof Player){
            $sender->sendMessage("Please use this Command Ingame");
        }
        $sender->sendForm(new SizeForm());
    }
}