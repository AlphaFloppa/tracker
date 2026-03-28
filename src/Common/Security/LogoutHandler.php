<?php

namespace App\Common\Security;

use Symfony\Component\Security\Http\Event\LogoutEvent;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;

class LogoutHandler implements EventSubscriberInterface
{
    public function onLogout(LogoutEvent $event): void
    {
        $event->setResponse(
            new JsonResponse(['success' => true])
        );
    }

    public static function getSubscribedEvents()
    {
        return [
            LogoutEvent::class => 'onLogout'
        ];
    }
}