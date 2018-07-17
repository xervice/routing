<?php


namespace Xervice\Routing;


use Xervice\Core\Config\AbstractConfig;

class RoutingConfig extends AbstractConfig
{
    public const CONTEXT = 'context';

    /**
     * @return string
     */
    public function getContext(): string
    {
        return $this->get(self::CONTEXT, '/');
    }
}