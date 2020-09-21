<?php

/**
 * @name BP
 * @version α1
 * @main BP\BP
 * @api 3.0.0
 * @author ChaNu
 */

namespace BP;

use pocketmine\plugin\PluginBase;
use pocketmine\event\Listener;
use pocketmine\event\block\BlockPlaceEvent;

class BP extends PluginBase implements Listener
{
    public function onEnable()
    {
        $this->getServer()->getPluginManager()->registerEvents($this, $this);
    }

    public function onPlace(BlockPlaceEvent $event)
    {
        $p = $event->getPlayer();
        $n = $p->getName();
        $b = $event->getBlock();
        $i = $b->getId();
        if ($i == 46) {
            if ($p->isOp()) {
                $p->sendTip("유저였음 킥이야");
            } else {

                $p->broadcastMessage("{$n}님께서 {$b}블럭을 설치 하셨습니다");
                $p->kick("테러하지마");
                $event->setCancelled(true);
            }
        }
    }
}