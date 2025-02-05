<?php

declare(strict_types=1);

namespace rydevs\els;

use pocketmine\command\Command;
use pocketmine\command\CommandSender;
use pocketmine\player\Player;
use pocketmine\player\GameMode;
use pocketmine\plugin\PluginBase;

class Main extends PluginBase {

    public function onEnable(): void {
        $this->getLogger()->info("EssentialsGamemode plugin has been enabled.");
    }

    public function onCommand(CommandSender $sender, Command $command, string $label, array $args): bool {
        if (!$sender instanceof Player) {
            $sender->sendMessage("This command can only be used in-game.");
            return true;
        }

        switch (strtolower($command->getName())) {
            case "gmc":
            case "creative":
                $sender->setGameMode(GameMode::CREATIVE);
                $sender->sendMessage("§6Set game mode §ccreative §6for §c" . $sender->getName());
                break;

            case "gms":
            case "survival":
                $sender->setGameMode(GameMode::SURVIVAL);
                $sender->sendMessage("§6Set game mode §csurvival §6for §c" . $sender->getName());
                break;

            case "gmsp":
            case "spectator":
                $sender->setGameMode(GameMode::SPECTATOR);
                $sender->sendMessage("§6Set game mode §cspectator §6for §c" . $sender->getName());
                break;

            case "gma":
            case "adventure":
                $sender->setGameMode(GameMode::ADVENTURE);
                $sender->sendMessage("§6Set game mode §cadventure §6for §c" . $sender->getName());
                break;
        }

        return true;
    }
}