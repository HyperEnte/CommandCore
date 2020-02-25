<?php

namespace HyperEnte\CommandCore;

use HyperEnte\CommandCore\commands\HeadOrNumberCommand;
use pocketmine\plugin\PluginBase;
use HyperEnte\CommandCore\commands\SizeCommand;
use HyperEnte\CommandCore\forms\SizeForm;
use pocketmine\Server;

class CommandCore extends PluginBase{
    public const PREFIX = "§3CommandCore §8>> §r";
    public const NOPERM = self::PREFIX."§cDazu hast du keine Berechtigung";
    private static $main;

    public function onEnable()
    {
        self::$main = $this;
        $this->getServer()->getCommandMap()->registerAll("CommandCore", [new SizeCommand(), new HeadOrNumberCommand()]);
    }
    public static function getMain(): self{
        return self::$main;
    }
}
