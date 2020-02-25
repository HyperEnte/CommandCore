<?php

namespace HyperEnte\CommandCore\commands;

use pocketmine\command\PluginCommand;
use HyperEnte\CommandCore\CommandCore;
use HyperEnte\CommandCore\provider\AnnounceProvider;
use pocketmine\command\CommandSender;
use pocketmine\plugin\Plugin;
use pocketmine\Player;

class AnnounceCommand extends PluginCommand
{
    public function __construct()
    {

        $this->setPermission("cmd.announce");

        parent::__construct("announce", CommandCore::getMain());

        $this->setDescription("Make an announcement");

    }

    public function execute(CommandSender $sender, string $commandLabel, array $args)
    {

        if ($sender instanceof Player && $sender->hasPermission("cmd.announce")) {

            if (isset($args[0])) {

                if (AnnounceProvider::hasAdvertised($sender)) {

                    $sender->sendMessage(CommandCore::PREFIX . "§cYou must wait 4 hours to announce again");

                    return;

                }

                AnnounceProvider::advertise($sender, $args);

            } else {

                $sender->sendMessage("§cPlease write a message");

            }

        }

    }
}
