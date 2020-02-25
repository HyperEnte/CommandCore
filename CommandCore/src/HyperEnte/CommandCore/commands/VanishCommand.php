<?php

namespace HyperEnte\CommandCore\commands;

use HyperEnte\CommandCore\CommandCore;
use pocketmine\command\PluginCommand;
use pocketmine\command\CommandSender;
use pocketmine\Player;

class VanishCommand extends PluginCommand {

    public static $vanished = [];

    public function __construct(){
        parent::__construct("vanish", CommandCore::getMain());
        $this->setDescription("Makes you invisible");
        $this->setPermission("cmd.vanish");
    }

    public function execute(CommandSender $sender, string $commandLabel, array $args){
        if(!$sender instanceof Player) return false;
        if(!$sender->hasPermission($this->getPermission())){
            $sender->sendMessage(CommandCore::NOPERM);
            return false;
        }
        if($sender->isInvisible()){
        $sender->setInvisible(false);
        $sender->setNameTagVisible(true);
        $sender->sendMessage(CommandCore::PREFIX."§aVanish Mode deactivated");
        return true;
        }
        if(!$sender->isInvisible()){
            $sender->setInvisible(true);
            $sender->setNameTagVisible(false);
            $sender->sendMessage(CommandCore::PREFIX."§aVanish Mode activated");
        }
        return true;
    }
}