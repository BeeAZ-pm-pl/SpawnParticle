<?php

namespace BeeAZZ\SpawnParticle;

use pocketmine\player\Player;
use pocketmine\Server;
use pocketmine\event\Listener;
use pocketmine\plugin\PluginBase;
use BeeAZZ\SpawnParticle\Particle;

class Main extends PluginBase implements Listener {
    
    public function onEnable(): void{
        $this->getServer()->getPluginManager()->registerEvents($this, $this);
      $this->getScheduler()->scheduleRepeatingTask(new Particle($this), 1);
}
}
