<?php
namespace XerviceTest\Routing;

use DataProvider\RouteCollectionDataProvider;
use DataProvider\RouteDataProvider;
use Xervice\Core\Locator\Dynamic\DynamicLocator;
use Xervice\Routing\Business\Route\RouteCollection;

/**
 * @method \Xervice\Routing\RoutingFacade getFacade()
 */
class IntegrationTest extends \Codeception\Test\Unit
{
    use DynamicLocator;

    /**
     * @var \XerviceTest\XerviceTester
     */
    protected $tester;

    /**
     * @group Xervice
     * @group Routing
     * @group Integration
     *
     * @expectedException \Symfony\Component\Routing\Exception\MethodNotAllowedException
     */
    public function testRoutingWithNotAllowedMethod()
    {
        $route = new RouteDataProvider();
        $route
            ->setName('Testing')
            ->setMethods(['POST'])
            ->setPath('/test')
            ->setDefaults(
                [
                    '_controller' => function () {
                        return 'TEST';
                    }
                ]
            );

        $routeList = new RouteCollectionDataProvider();
        $routeList->addRoute($route);

        $this->getFacade()->addRoutes($routeList);

        $result = $this->getFacade()->matchUrl('/test');
    }

    /**
     * @group Xervice
     * @group Routing
     * @group Integration
     */
    public function testRouting()
    {
        $route = new RouteDataProvider();
        $route
            ->setName('Testing')
            ->setMethods(['GET'])
            ->setPath('/test2')
            ->setDefaults(
                [
                    '_controller' => function () {
                        return 'TEST';
                    }
                ]
            );

        $routeList = new RouteCollectionDataProvider();
        $routeList->addRoute($route);

        $this->getFacade()->addRoutes($routeList);

        $result = $this->getFacade()->matchUrl('/test2');

        $this->assertEquals(
            'TEST',
            $result['_controller']()
        );
    }


    /**
     * @group Xervice
     * @group Routing
     * @group Integration
     */
    public function testRoutingWithParams()
    {
        $route = new RouteDataProvider();
        $route
            ->setName('Testing')
            ->setMethods(['GET'])
            ->setPath('/test3/{param}')
            ->setDefaults(
                [
                    '_controller' => function () {
                        return 'TEST';
                    }
                ]
            );

        $routeList = new RouteCollectionDataProvider();
        $routeList->addRoute($route);

        $this->getFacade()->addRoutes($routeList);

        $result = $this->getFacade()->matchUrl('/test3/unit');

        $this->assertEquals(
            'TEST',
            $result['_controller']($result)
        );
    }

}