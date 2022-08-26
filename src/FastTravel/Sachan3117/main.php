<?php

namespace FastTravel\Sachan3117;

use pocketmine\plugin\PluginBase;
use pocketmine\events\Listener;
use pocketmine\player\Player;
use pocketmine\Server;

use pocketmine\command\Command;
use pocketmine\command\CommandSender;

use jojoe77777\FormAPI\SimpleForm;
class Main extends PluginBase {

    public function onEnable(): void {
        $this->getLogger()->info("Plugin Enabled!");
    }
    public function onDisable(): void {
        $this->getLogger()->info("Plugin Disabled!");
    }
    public function onCommand(CommandSender $sender, Command $command, string $label, array $args): bool {

        if($command->getName() == "fasttravel"){
            if($sender instanceof Player){
                $this->newSimpleForm($sender);
            } else {
                $sender->sendMessage("bruh Server can't open Forms reasson Machine's Can't handle a Form with Local Machine and supported forms UI System for Web");
            }
        }

        return true;
    }

    public function newSimpleForm($player){
        $form = new SimpleForm(function(Player $player, int $data = null){
            if($data === null){
                return true;
            }

            switch($data){
                case 0:
                    $this->getServer()->dispatchCommand($player, "hub");
                break;
   
                case 1:
                    $this->getServer()->dispatchCommand($player, "farm");
                break;
   
                case 2:
                    $this->getServer()->dispatchCommand($player, "mine");
                break;

                case 3:
                    $this->getServer()->dispatchCommand($player, "forest");
                break;
   
                case 4:
                    $this->getServer()->dispatchCommand($player, "nether");
                break;
   
                case 5:
                    $this->getServer()->dispatchCommand($player, "spiderden");
                break;
   
                case 6:
                    $this->getServer()->dispatchCommand($player, "end");
                break;                
            }

        });
        $form->setTitle("§l§6Fast Travel Menu");
        $form->setContent("§6Press the button to Teleport", 0, );
        $form->addButton("§l§3Hub\n§l§9»» §r§oTap to Teleport", 0, "texture/ui/hub");
        $form->addButton("§l§3Farm\n§l§9»» §r§oTap to Teleport", 0, "texture/ui/farm_map");
        $form->addButton("§l§3Mine\n§l§9»» §r§oTap to Teleport", 0, "texture/ui/mine_map");
        $form->addButton("§l§3Forest\n§l§9»» §r§oTap to Teleport", 0, "texture/ui/Forest_map");
        $form->addButton("§l§3Nether\n§l§9»» §r§oTap to Teleport", 0, "texture/ui/unkown_map2");
        $form->addButton("§l§3Spider Den\n§l§9»» §r§oTap to Teleport", 0, "texture/ui/den_map");
        $form->addButton("§l§3End \n§l§9»» §r§oTap to Teleport", 0, "texture/ui/unkown_map");
        $form->sendToPlayer($player);
        return $form;
    }

}
