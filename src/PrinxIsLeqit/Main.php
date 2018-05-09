<?php

namespace PrinxIsLeqit;

use pocketmine\plugin\PluginBase;  
use pocketmine\event\Listener;
use pocketmine\item\Item;
use pocketmine\Player;

use pocketmine\item\enchantment\{
    Enchantment,
    EnchantmentInstance
};

use pocketmine\event\block\{
    SignChangeEvent,
    BlockBreakEvent,
    BlockPlaceEvent
};

use pocketmine\event\player\{
    PlayerInteractEvent,
    PlayerMoveEvent,
    PlayerDropItemEvent,
    PlayerQuitEvent,
    PlayerJoinEvent,
    PlayerExhaustEvent,
    PlayerChatEvent,
    PlayerDeathEvent,
    PlayerRespawnEvent
};

use pocketmine\event\entity\{
    EntityDamageByEntityEvent,
    EntityDamageEvent,
    EntityLevelChangeEvent
};


class Main extends PluginBase implements Listener{

    	public function onEnable(){
    	
       		$this->getServer()->getPluginManager()->registerEvents($this, $this);
        	$this->getLogger()->info("§aFFA wurde Aktiviert!");
        	
     	}
    
    	public function onJoin(PlayerJoinEvent $e){
    	
        	$player = $e->getPlayer();
        	$name = $player->getName();
        	
          	$player->sendPopup("Plugin wurde stellt von PrinxIsLeqit");
		$player->setNameTag("§7[§aPlayer§7] §2". $player->getName());
		
          	$player->getArmorInventory()->clearAll();
          	
          	/* Helm */
		$helmet = Item::get(310, 0, 1);
		
		$protection = Enchantment::getEnchantment(0);
        	$protection = new EnchantmentInstance($protection, 2);
		$helmet->addEnchantment($protection);

		$player->getArmorInventory()->setHelmet($helmet);
		
		/* Brustplatte */
		
		$brustplatte = Item::get(311, 0, 1);
		
		$protection = Enchantment::getEnchantment(0);
        	$protection = new EnchantmentInstance($protection, 2);
		$brustplatte->addEnchantment($protection);
		
		$player->getArmorInventory()->setChestplate($brustplatte);
		
		/* Hose */
		
		$hose = Item::get(312, 0, 1);
		
		$protection = Enchantment::getEnchantment(0);
        	$protection = new EnchantmentInstance($protection, 2);
		$hose->addEnchantment($protection);
		
		$player->getArmorInventory()->setLeggings($hose);
		
		/* Schuhe */
		
		$schuhe = Item::get(313, 0, 1);
		
		$protection = Enchantment::getEnchantment(0);
        	$protection = new EnchantmentInstance($protection, 2);
		$schuhe->addEnchantment($protection);
		
		$player->getArmorInventory()->setBoots($schuhe);
		
		/* Schwert */
		
		$schwert = Item::get(276, 0, 1);
		
		$sharpness = Enchantment::getEnchantment(9);
        	$sharpness = new EnchantmentInstance($sharpness, 2);
		$schwert->addEnchantment($sharpness);
		
		$player->getInventory()->addItem($schwert);
		
          	$player->getInventory()->addItem(Item::get(322, 0, 5));
          	$player->getInventory()->addItem(Item::get(364, 0, 64));
          	
    	}
    	
    	public function onRespawn(PlayerRespawnEvent $e){
           	$player = $e->getPlayer();
          	
          	$player->getArmorInventory()->clearAll();
          	
          	/* Helm */
		$helmet = Item::get(310, 0, 1);
		
		$protection = Enchantment::getEnchantment(0);
        	$protection = new EnchantmentInstance($protection, 2);
		$helmet->addEnchantment($protection);

		$player->getArmorInventory()->setHelmet($helmet);
		
		/* Brustplatte */
		
		$brustplatte = Item::get(311, 0, 1);
		
		$protection = Enchantment::getEnchantment(0);
        	$protection = new EnchantmentInstance($protection, 2);
		$brustplatte->addEnchantment($protection);
		
		$player->getArmorInventory()->setChestplate($brustplatte);
		
		/* Hose */
		
		$hose = Item::get(312, 0, 1);
		
		$protection = Enchantment::getEnchantment(0);
        	$protection = new EnchantmentInstance($protection, 2);
		$hose->addEnchantment($protection);
		
		$player->getArmorInventory()->setLeggings($hose);
		
		/* Schuhe */
		
		$schuhe = Item::get(313, 0, 1);
		
		$protection = Enchantment::getEnchantment(0);
        	$protection = new EnchantmentInstance($protection, 2);
		$schuhe->addEnchantment($protection);
		
		$player->getArmorInventory()->setBoots($schuhe);
		
		/* Schwert */
		
		$schwert = Item::get(276, 0, 1);
		
		$sharpness = Enchantment::getEnchantment(9);
        	$sharpness = new EnchantmentInstance($sharpness, 2);
		$schwert->addEnchantment($sharpness);
		
		$player->getInventory()->addItem($schwert);
		
          	$player->getInventory()->addItem(Item::get(322, 0, 5));
          	$player->getInventory()->addItem(Item::get(364, 0, 64));
          	
     	}
     	
    	public function onPlayerDeath(PlayerDeathEvent $e){
        	if($e->getEntity() instanceof Player){
            		$e->setDrops([]);
            	}
            	
		$player = $e->getPlayer();
		$causa = $player->getLastDamageCause();
		
		if($causa instanceof EntityDamageByEntityEvent){
			$killer = $causa->getDamager();
			if($killer instanceof Player){
				$killer->setHealth(20);
				$killer->sendPopup("§7--== [ §b+§c20 <3 §7] ==--");
				$e->setDeathMessage("§c".$player->getName()." §7wurde getötet von§b".$killer->getName());
			}
		}
	}
	public function onChat(PlayerChatEvent $event){
		$player = $event->getPlayer();
		$message = $event->getMessage();
		$game = $player->getGamemode();
		$name = $player->getName();
		$modes = array(0);
		if($game == 0){
			$event->setFormat("§2".$name."§7: ".$message);
		}
		if($player->isOp() && $game == 0){
			$event->setFormat("§8[§2Team§8]§a ".$name."§f: ".$message);
		}
	}
}
