<?php

namespace Jackaboi\WildTP;

use pocketmine\plugin\PluginBase;
use pocketmine\event\Listener;
use pocketmine\command\Command;
use pocketmine\command\CommandSender;
use pocketmine\Server;
use pocketmine\Player;
use pocketmine\level\{Level,Position,ChunkManager};
use pocketmine\math\Vector3;

class Main extends PluginBase {

	public function onEnable() {
		$this->getLogger()->info("WildTP has been enabled!");
	}

    public function onCommand(CommandSender $sender, Command $cmd, string $label, array $param ) :bool{
		switch(strtolower($cmd->getName())){
			case "wild":
				if($sender->hasPermission("WildTP.wild")) {
					if($sender instanceof Player) {
						$x = rand(1,350000);
            					$y = rand(1,256);
						$z = rand(1,350000);
						$sender->teleport($sender->getLevel()->getSafeSpawn(new Vector3($x, $y, $z)));
						$sender->sendTip("§b[WildTP] You have been teleported somewhere in the wild!");
						$sender->sendMessage("§b[WildTP] teleporting to: $x, $y, $z");
					}
					else {
						$sender->sendMessage("[WildTP] This command can only be run in-game!");
					}
				}
				else {
					$sender->sendMessage("[WildTP] You do not have permission to run this command!");
				}
				return true;
			break;

		}
	}
	public function onDisable() {
		$this->getLogger()->info("WildTP has been disabled!");
	}

}
