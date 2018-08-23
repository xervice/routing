<?php


namespace Xervice\Routing\Business;


use DataProvider\RouteCollectionDataProvider;
use Symfony\Component\HttpFoundation\Request;
use Xervice\Core\Business\Model\Facade\AbstractFacade;

/**
 * @method \Xervice\Routing\Business\RoutingBusinessFactory getFactory()
 * @method \Xervice\Routing\RoutingConfig getConfig()
 */
class RoutingFacade extends AbstractFacade implements RoutingFacadeInterface
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

    /**
     * @param \Symfony\Component\HttpFoundation\Request $request
     *
     * @return array
     */
    public function matchRequest(Request $request = null): array
    {
        return $this->getFactory()->createMatcher($request)->matchRequest();
    }
}