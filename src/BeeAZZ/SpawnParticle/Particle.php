<?php


namespace BeeAZZ\SpawnParticle;

use pocketmine\world\particle\HeartParticle;
use pocketmine\math\Vector3;
use BeeAZZ\SpawnParticle\Main;
use pocketmine\scheduler\Task;
use pocketmine\world\World;
use pocketmine\color\Color;

class Particle extends Task {

    protected $plugin;
    public int $r = 0;
    
    public function __construct(Main $plugin){
        $this->plugin = $plugin;
    }
    
    public function onRun(): void{
        $spawn = $this->plugin->getServer()->getWorldManager ()->getDefaultWorld()->getSafeSpawn();
        $x = $spawn->getX();
        $y = $spawn->getY();
        $z = $spawn->getZ();
        $world = $spawn->getWorld();
        $hypo = 0.8;
    $a = cos(deg2rad($this->r/0.09))* $hypo;
    $b = sin(deg2rad($this->r/0.09))* $hypo;
    $time = (int) (microtime(true) - $this->plugin->getServer()->getStartTime());
    $seconds = floor($time % 15);
    $up = $seconds/5;
    $pos1 = new Vector3($x - $a, $y + $up, $z - $b);
    $pos2 = new Vector3($x - $b, $y + $up, $z - $a);
    $effect1 = new HeartParticle(3);
    $effect2 = new HeartParticle(3);
    $world->addParticle($pos1, $effect1);
    $world->addParticle($pos2, $effect2);
    $this->r++;
        }
    }
