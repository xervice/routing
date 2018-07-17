<?php


namespace Xervice\Routing;


use DataProvider\RouteCollectionDataProvider;
use Xervice\Core\Facade\AbstractFacade;

/**
 * @method \Xervice\Routing\RoutingFactory getFactory()
 * @method \Xervice\Routing\RoutingConfig getConfig()
 */
class RoutingFacade extends AbstractFacade
{
    /**
     * @param \DataProvider\RouteCollectionDataProvider $dataProvider
     */
    public function addRoutes(RouteCollectionDataProvider $dataProvider): void
    {
        $this->getFactory()->getRouteCollection()->addRouteCollection($dataProvider);
    }

    /**
     * @return \Symfony\Component\Routing\RouteCollection
     */
    public function getRouteCollection()
    {
        return $this->getFactory()->getRouteCollection()->getRouteCollection();
    }

    /**
     * @param string $url
     *
     * @return array
     */
    public function matchUrl(string $url): array
    {
        return $this->getFactory()->createMatcher()->match($url);
    }
}