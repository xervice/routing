<?php
declare(strict_types=1);

namespace Xervice\Routing\Business;

use DataProvider\RoutingContextDataProvider;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Matcher\UrlMatcher;
use Symfony\Component\Routing\RequestContext;
use Xervice\Routing\Business\Model\Matcher\MatchProviderInterface;
use Xervice\Routing\Business\Model\Route\RouteCollectionInterface;


/**
 * @method \Xervice\Routing\RoutingConfig getConfig()
 */
interface RoutingBusinessFactoryInterface
{
    /**
     * @param \Symfony\Component\HttpFoundation\Request|null $request
     *
     * @return \Xervice\Routing\Business\Model\Matcher\MatchProviderInterface
     */
    public function createMatcher(Request $request = null): MatchProviderInterface;

    /**
     * @return \Symfony\Component\Routing\Matcher\UrlMatcher
     */
    public function createUrlMatcher(): UrlMatcher;

    /**
     * @return \Symfony\Component\Routing\RequestContext
     */
    public function createRequestContext(): RequestContext;

    /**
     * @return \Symfony\Component\HttpFoundation\Request
     */
    public function createRequest(): Request;

    /**
     * @return \DataProvider\RoutingContextDataProvider
     */
    public function createContext(): RoutingContextDataProvider;

    /**
     * @return \Xervice\Routing\Business\Model\Route\RouteCollectionInterface
     */
    public function createRouteCollection(): RouteCollectionInterface;

    /**
     * @return \Xervice\Routing\Business\Model\Route\RouteCollectionInterface
     */
    public function getRouteCollection(): RouteCollectionInterface;
}