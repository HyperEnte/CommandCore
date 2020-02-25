<?php

namespace HyperEnte\CommandCore\commands;

use pocketmine\command\PluginCommand;
use HyperEnte\CommandCore\CommandCore;
use pocketmine\command\CommandSender;
use onebone\economyapi\EconomyAPI;
use pocketmine\plugin\Plugin;
use pocketmine\Player;

class HeadOrNumberCommand extends PluginCommand{
    public function __construct()
    {
        parent::__construct("headornumber", CommandCore::getMain());
        $this->setDescription("Play HeadOrNumber");
        $this->setAliases(["hon"]);
    }
    public function execute(CommandSender $sender, string $commandLabel, array $args)
    {
        if(!$sender instanceof Player){
            $sender->sendMessage("Please use this Command Ingame");
        }
        if(count($args) < 1){
            $sender->sendMessage(CommandCore::PREFIX."§cPlease use head or number");
            return false;
        }
        $money = EconomyAPI::getInstance()->myMoney($sender);
        if($money < 100){
            $sender->sendMessage(CommandCore::PREFIX."§cYou don't have 100$");
            return false;
        }
        if($money >= 100){
            $words = ["head", "number"];
            $word = array_rand($words);
            if (strtolower($args[0]) === $word){
                $sender->sendMessage(CommandCore::PREFIX."§aYou won!");
                EconomyAPI::getInstance()->addMoney($sender, 100);
                return false;
            }
            if (!strtolower($args[0]) === $word){
                $sender->sendMessage(CommandCore::PREFIX."§4You lose!");
                EconomyAPI::getInstance()->reduceMoney($sender, 100);
                return false;
            }
            return false;
        }
        return true;
    }
}