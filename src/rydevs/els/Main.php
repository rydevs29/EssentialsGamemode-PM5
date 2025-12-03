<?php

declare(strict_types=1);

namespace rydevs\els;

use pocketmine\command\Command;
use pocketmine\command\CommandSender;
use pocketmine\player\Player;
use pocketmine\player\GameMode;
use pocketmine\plugin\PluginBase;
use pocketmine\utils\TextFormat;

class Main extends PluginBase {

    public function onEnable(): void {
        $this->getLogger()->info("EssentialsGamemode plugin has been enabled.");
    }

    public function onCommand(CommandSender $sender, Command $command, string $label, array $args): bool {
        if (!$sender instanceof Player) {
            $sender->sendMessage(TextFormat::RED . "This command can only be used in-game.");
            return true;
        }

        switch (strtolower($command->getName())) {
            case "gmc":
            // Hapus case "creative" jika Anda tidak mendaftarkannya di plugin.yml sebagai command atau alias
                $sender->setGamemode(GameMode::CREATIVE());
                $sender->sendMessage("§6Set game mode §ccreative §6for §c" . $sender->getName());
                break;

            case "gms":
            // Hapus case "survival" jika tidak ada di plugin.yml
                $sender->setGamemode(GameMode::SURVIVAL());
                $sender->sendMessage("§6Set game mode §csurvival §6for §c" . $sender->getName());
                break;

            case "gmsp":
            // Hapus case "spectator" jika tidak ada di plugin.yml
                $sender->setGamemode(GameMode::SPECTATOR());
                $sender->sendMessage("§6Set game mode §cspectator §6for §c" . $sender->getName());
                break;

            case "gma":
            // Hapus case "adventure" jika tidak ada di plugin.yml
                $sender->setGamemode(GameMode::ADVENTURE());
                $sender->sendMessage("§6Set game mode §cadventure §6for §c" . $sender->getName());
                break;
        }

        return true;
    }
}
