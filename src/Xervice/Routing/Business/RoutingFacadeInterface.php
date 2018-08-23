<?php
declare(strict_types=1);

namespace Xervice\Routing\Business;

use DataProvider\RouteCollectionDataProvider;
use Symfony\Component\HttpFoundation\Request;


/**
 * @method \Xervice\Routing\Business\RoutingBusinessFactory getFactory()
 * @method \Xervice\Routing\RoutingConfig getConfig()
 */
interface RoutingFacadeInterface
{
    /**
     * @param \DataProvider\RouteCollectionDataProvider $dataProvider
     */
    public function addRoutes(RouteCollectionDataProvider $dataProvider): void;

    /**
     * @return \Symfony\Component\Routing\RouteCollection
     */
    public function getRouteCollection();

    /**
     * @param string $url
     *
     * @return array
     */
    public function matchUrl(string $url): array;

    /**
     * @param \Symfony\Component\HttpFoundation\Request $request
     *
     * @return array
     */
    public function matchRequest(Request $request = null): array;
}