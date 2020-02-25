<?php

namespace HyperEnte\CommandCore\provider;

use HyperEnte\CommandCore\CommandCore;
use pocketmine\Player;

class AnnounceProvider {

    public static $has_advertised = [];

    public static function hasAdvertised(Player $player) : bool {

        if (array_key_exists($player->getName(), self::$has_advertised)) {

            if (self::$has_advertised[$player->getName()] > time()) {

                return true;

            }

            unset(self::$has_advertised[$player->getName()]);

            return false;

        }

        return false;

    }

    public static function advertise(Player $player, array $ad) {

        $message = implode(" ", $ad);

        if (strlen($message) > 55) {

            $player->sendMessage(CommandCore::PREFIX."§cThis Message is to long");

            return;

        }

        $header = "§8- - - §6Announcement §8| §e" . $player->getName() . " §8- - -";
        $msg = "§8- - - §6Announcement §8| §e" . $player->getName() . " §8- - -\n§f" . $message . "\n§8". str_repeat("-", strlen($header));

        $time = time() + 14400;

        self::$has_advertised[$player->getName()] = $time;

        $player->sendMessage(CommandCore::PREFIX."§aYou sent the message successfully");

        foreach (CommandCore::getMain()->getServer()->getOnlinePlayers() as $players) {

            $players->sendMessage($msg);

        }

    }

}
