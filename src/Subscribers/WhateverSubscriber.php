<?php

namespace App\Subscribers;

use EasyCorp\Bundle\EasyAdminBundle\Event\EasyAdminEvents;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;
use Symfony\Component\EventDispatcher\GenericEvent;

class WhateverSubscriber implements EventSubscriberInterface
{
    public static function getSubscribedEvents()
    {
        return [
            EasyAdminEvents::PRE_UPDATE => ['preUpdate']
        ];
    }

    public function preUpdate(GenericEvent $event)
    {
        if (method_exists($event->getSubject(), 'setUpdatedAt')) {
            $event->getSubject()->setUpdatedAt(new \DateTime());
        }
    }
}