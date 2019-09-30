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
		$this->getLogger()->info("Wild has been enabled!");
	}

    public function onCommand(CommandSender $sender, Command $cmd, string $label, array $param ) :bool{
		switch(strtolower($cmd->getName())){
			case "wild":
				if($sender->hasPermission("WildTP.wild")) {
					if($sender instanceof Player) {
						$x = rand(1,3500);
						$z = rand(1,3500);
						$sender->teleport($sender->getLevelByName("factionspawn")->getSafeSpawn(new Vector3($x, 128, $z)));
						$sender->addTitle("§6§lWILDERNESS");
						$sender->sendMessage("§c§lWARNING§7 Be careful, Pvp is enabled");
					}
					else {
						$sender->sendMessage("Thiscommand can only be run in-game!");
					}
				}
				else {
					$sender->sendMessage("§cYou do not have permission to run this command!");
				}
				return true;
			break;

		}
	}
	public function onDisable() {
		$this->getLogger()->info("Wild has been disabled!");
	}

}
