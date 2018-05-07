<?php

namespace PrinxIsLeqit;

use pocketmine\plugin\PluginBase;  
use pocketmine\event\Listener;
use pocketmine\event\player\PlayerJoinEvent;
use pocketmine\event\player\PlayerRespawnEvent;
use pocketmine\item\Item;
use pocketmine\event\player\PlayerDeathEvent;
use pocketmine\event\entity\EntityDamageByEntityEvent;
use pocketmine\event\entity\EntityDamageEvent;
use pocketmine\Player;
use pocketmine\item\enchantment\Enchantment;
use pocketmine\event\player\PlayerChatEvent;

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
$casco = Item::get(Item::DIAMOND_HELMET, 0, 1);
$protection = Enchantment::getEnchantment(0);
$protection->setLevel(1);
$casco->addEnchantment($protection);
$player->getArmorInventory()->setHelmet($casco);
$peto = Item::get(Item::DIAMOND_CHESTPLATE, 0, 1);
$protection = Enchantment::getEnchantment(0);
$protection->setLevel(2);
$peto->addEnchantment($protection);
$player->getArmorInventory()->setChestplate($peto);
$pantalon = Item::get(Item::DIAMOND_LEGGINGS, 0, 1);
$protection = Enchantment::getEnchantment(0);
$protection->setLevel(2);
$pantalon->addEnchantment($protection);
$player->getArmorInventory()->setLeggings($pantalon);
$botas = Item::get(Item::DIAMOND_BOOTS, 0, 1);
$protection = Enchantment::getEnchantment(0);
$protection->setLevel(1);
$botas->addEnchantment($protection);
$player->getArmorInventory()->setBoots($botas);
$espada = Item::get(Item::DIAMOND_SWORD, 0, 1);
$sharpness = Enchantment::getEnchantment(9);
$sharpness->setLevel(2);
$espada->addEnchantment($sharpness);
$player->getInventory()->addItem($espada);
          $player->getInventory()->addItem(Item::get(322, 0, 5));
          $player->getInventory()->addItem(Item::get(364, 0, 64));
                }
    public function onRespawn(PlayerRespawnEvent $e){
           $player = $e->getPlayer();
          $player->getIArmorInventory()->clearAll();
$casco = Item::get(Item::DIAMOND_HELMET, 0, 1);
$protection = Enchantment::getEnchantment(0);
$protection->setLevel(1);
$casco->addEnchantment($protection);
$player->getArmorInventory()->setHelmet($casco);
$peto = Item::get(Item::DIAMOND_CHESTPLATE, 0, 1);
$protection = Enchantment::getEnchantment(0);
$protection->setLevel(2);
$peto->addEnchantment($protection);
$player->getArmorInventory()->setChestplate($peto);
$pantalon = Item::get(Item::DIAMOND_LEGGINGS, 0, 1);
$protection = Enchantment::getEnchantment(0);
$protection->setLevel(2);
$pantalon->addEnchantment($protection);
$player->getArmorInventory()->setLeggings($pantalon);
$botas = Item::get(Item::DIAMOND_BOOTS, 0, 1);
$protection = Enchantment::getEnchantment(0);
$protection->setLevel(1);
$botas->addEnchantment($protection);
$player->getArmorInventory()->setBoots($botas);
$espada = Item::get(Item::DIAMOND_SWORD, 0, 1);
$sharpness = Enchantment::getEnchantment(9);
$sharpness->setLevel(2);
$espada->addEnchantment($sharpness);
$player->getInventory()->addItem($espada);
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
$e->setDeathMessage("§c".$player->getName()." §7was killed by§b".$killer->getName());
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
					$event->setFormat("§8[§2Staff§8]§a ".$name."§f: ".$message);
}
}
}
