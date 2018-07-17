<?php


namespace Xervice\Routing\Business\Route;


use DataProvider\RouteCollectionDataProvider;
use DataProvider\RouteDataProvider;
use Symfony\Component\Routing\Route;
use Symfony\Component\Routing\Route as SymfonyRoute;
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
                $this->getSymfonyRouteFromDataProvider($route)
            );
        }
    }

    /**
     * @param \DataProvider\RouteDataProvider $route
     *
     * @return \Symfony\Component\Routing\Route
     */
    private function getSymfonyRouteFromDataProvider(RouteDataProvider $route): SymfonyRoute
    {
        return new Route(
            $this->getRoutePath($route),
            $this->getRouteDefaults($route),
            $this->getRouteRequirements($route),
            $this->getRouteOptions($route),
            $this->getRouteHost($route),
            $this->getRouteSchemas($route),
            $this->getRouteMethods($route)
        );
    }

    /**
     * @param \DataProvider\RouteDataProvider $route
     *
     * @return string
     */
    private function getRoutePath(RouteDataProvider $route): string
    {
        return $route->hasPath() ? $route->getPath() : '/';
    }

    /**
     * @param \DataProvider\RouteDataProvider $route
     *
     * @return array
     */
    private function getRouteDefaults(RouteDataProvider $route): array
    {
        return $route->hasDefaults() ? $route->getDefaults() : [];
    }

    /**
     * @param \DataProvider\RouteDataProvider $route
     *
     * @return array
     */
    private function getRouteRequirements(RouteDataProvider $route): array
    {
        return $route->hasRequirements() ? $route->getRequirements() : [];
    }

    /**
     * @param \DataProvider\RouteDataProvider $route
     *
     * @return array
     */
    private function getRouteOptions(RouteDataProvider $route): array
    {
        return $route->hasOptions() ? $route->getOptions() : [];
    }

    /**
     * @param \DataProvider\RouteDataProvider $route
     *
     * @return string
     */
    private function getRouteHost(RouteDataProvider $route): string
    {
        return $route->hasHost() ? $route->getHost() : '';
    }

    /**
     * @param \DataProvider\RouteDataProvider $route
     *
     * @return array
     */
    private function getRouteSchemas(RouteDataProvider $route): array
    {
        return $route->hasSchemes() ? $route->getSchemes() : [];
    }

    /**
     * @param \DataProvider\RouteDataProvider $route
     *
     * @return array
     */
    private function getRouteMethods(RouteDataProvider $route): array
    {
        return $route->hasMethods() ? $route->getMethods() : [];
    }
}
