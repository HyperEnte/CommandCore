<?php

namespace HyperEnte\CommandCore\commands;

use HyperEnte\CommandCore\CommandCore;
use pocketmine\command\PluginCommand;
use pocketmine\command\CommandSender;
use pocketmine\Player;

class FlyCommand extends PluginCommand {

    public function __construct(){
        parent::__construct("fly", CommandCore::getMain());
        $this->setDescription("Turn on Flight Mode");
        $this->setPermission("cmd.fly");
    }

    public function execute(CommandSender $sender, string $commandLabel, array $args){
        if(!$sender instanceof Player) return false;
        if(!$sender->hasPermission($this->getPermission())){
            $sender->sendMessage(CommandCore::NOPERM);
            return false;
        }
        if($sender->getAllowFlight()){
            $sender->setAllowFlight(false);
            $sender->setFlying(false);
            $sender->sendMessage(CommandCore::PREFIX."§cFlight Mode deactivated");
        }else{
            $sender->setAllowFlight(true);
            $sender->sendMessage(CommandCore::PREFIX."§aFlight Mode activated");
        }
        return true;
    }


}
