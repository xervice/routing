<?php


namespace Xervice\Routing\Business\Route;


use DataProvider\RouteCollectionDataProvider;
use Symfony\Component\Routing\Route;
use Symfony\Component\Routing\RouteCollection as SymfonyRouteCollection;

class RouteCollection implements RouteCollectionInterface
{
    /**
     * @var \Symfony\Component\Routing\RouteCollection
     */
    private $routeCollection;

    /**
     * RouteCollection constructor.
     *
     * @param \Symfony\Component\Routing\RouteCollection $routeCollection
     */
    public function __construct(SymfonyRouteCollection $routeCollection)
    {
        $this->routeCollection = $routeCollection;
    }

    /**
     * @return \Symfony\Component\Routing\RouteCollection
     */
    public function getRouteCollection()
    {
        return $this->routeCollection;
    }

    /**
     * @param \DataProvider\RouteCollectionDataProvider $dataProvider
     */
    public function addRouteCollection(RouteCollectionDataProvider $dataProvider): void
    {
        foreach ($dataProvider->getRoutes() as $route) {
            $this->routeCollection->add(
                $route->getName(),
                new Route(
                    $route->hasPath() ? $route->getPath() : '/',
                    $route->hasDefaults() ? $route->getDefaults() : [],
                    $route->hasRequirements() ? $route->getRequirements() : [],
                    $route->hasOptions() ? $route->getOptions() : [],
                    $route->hasHost() ? $route->getHost() : '',
                    $route->hasSchemes() ? $route->getSchemes() : [],
                    $route->hasMethods() ? $route->getMethods() : []
                )
            );
        }
    }
}