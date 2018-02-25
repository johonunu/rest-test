<?php

namespace App\EventSubscriber;

use Symfony\Component\EventDispatcher\EventSubscriberInterface;
use Symfony\Component\HttpKernel\Event\FilterResponseEvent;
use Knp\Component\Pager\Paginator;

class PaginationSubscriber implements EventSubscriberInterface
{
    public function onKernelView(FilterResponseEvent $event)
    {
        $request = $event->getRequest();

        $response = $event->getResponse();
        $response->headers->add([
                'Demo' => 'AAAAAAAAAA'
            ]);

        if (($data = $request->attributes->get('data')) && $data instanceof Paginator) {
            $response = $event->getResponse();
            $response->headers->add([
                'Demo' => 'AAAAAAAAAA'
            ]);
        }
    }

    public static function getSubscribedEvents()
    {
        return [
           'kernel.response' => 'onKernelView',
        ];
    }
}
