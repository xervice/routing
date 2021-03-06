<?php

namespace Xervice\Routing\Business\Model\Route;

use DataProvider\RouteCollectionDataProvider;

interface RouteCollectionInterface
{
    /**
     * @return mixed
     */
    public function getRouteCollection();

    /**
     * @param \DataProvider\RouteCollectionDataProvider $dataProvider
     */
    public function addRouteCollection(RouteCollectionDataProvider $dataProvider): void;
}