<?php

namespace HyperEnte\CommandCore;

use HyperEnte\CommandCore\commands\HeadOrNumberCommand;
use pocketmine\plugin\PluginBase;
use HyperEnte\CommandCore\commands\SizeCommand;
use HyperEnte\CommandCore\commands\AnnounceCommand;
use HyperEnte\CommandCore\commands\FlyCommand;
use HyperEnte\CommandCore\commands\VanishCommand;
use HyperEnte\CommandCore\forms\SizeForm;
use pocketmine\Server;

class CommandCore extends PluginBase{
    public const PREFIX = "§3CommandCore §8>> §r";
    public const NOPERM = self::PREFIX."§cYou have no permission doing this";
    public static $main;

    public function onEnable()
    {
        self::$main = $this;
        $this->getServer()->getCommandMap()->registerAll("CommandCore", [new SizeCommand(), new HeadOrNumberCommand(), new AnnounceCommand(), new FlyCommand(), new VanishCommand()]);
    }
    public static function getMain(): self{
        return self::$main;
    }
}
