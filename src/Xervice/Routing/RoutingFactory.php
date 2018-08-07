<?php


namespace Xervice\Routing;


use DataProvider\RoutingContextDataProvider;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Matcher\UrlMatcher;
use Symfony\Component\Routing\RequestContext;
use Symfony\Component\Routing\RouteCollection as SymfonyRouteCollection;
use Xervice\Core\Factory\AbstractFactory;
use Xervice\Routing\Business\Matcher\MatchProvider;
use Xervice\Routing\Business\Matcher\MatchProviderInterface;
use Xervice\Routing\Business\Route\RouteCollection;
use Xervice\Routing\Business\Route\RouteCollectionInterface;

/**
 * @method \Xervice\Routing\RoutingConfig getConfig()
 */
class RoutingFactory extends AbstractFactory
{
    /**
     * @var \Xervice\Routing\Business\Route\RouteCollectionInterface
     */
    private $routeCollection;

    /**
     * @return \Xervice\Routing\Business\Matcher\MatchProvider
     */
    public function createMatcher(): MatchProviderInterface
    {
        return new MatchProvider(
            $this->createUrlMatcher(),
            $this->createRequest()
        );
    }

    /**
     * @return \Symfony\Component\Routing\Matcher\UrlMatcher
     */
    public function createUrlMatcher(): UrlMatcher
    {
        return new UrlMatcher(
            $this->getRouteCollection()->getRouteCollection(),
            $this->createRequestContext()
        );
    }

    /**
     * @return \Symfony\Component\Routing\RequestContext
     */
    public function createRequestContext(): RequestContext
    {
        $context = new RequestContext();
        $context->fromRequest(
            $this->createRequest()
        );

        return $context;
    }

    /**
     * @return \Symfony\Component\HttpFoundation\Request
     */
    public function createRequest(): Request
    {
        return Request::createFromGlobals();
    }

    /**
     * @return \DataProvider\RoutingContextDataProvider
     */
    public function createContext(): RoutingContextDataProvider
    {
        return (new RoutingContextDataProvider())->setContext(
            $this->getConfig()->getContext()
        );
    }

    /**
     * @return \Xervice\Routing\Business\Route\RouteCollectionInterface
     */
    public function createRouteCollection(): RouteCollectionInterface
    {
        return new RouteCollection(
            new SymfonyRouteCollection()
        );
    }

    /**
     * @return \Xervice\Routing\Business\Route\RouteCollectionInterface
     */
    public function getRouteCollection(): RouteCollectionInterface
    {
        if ($this->routeCollection === null) {
            $this->routeCollection = $this->createRouteCollection();
        }

        return $this->routeCollection;
    }
}