<?php

namespace Xervice\Routing\Business\Matcher;

use Symfony\Component\HttpFoundation\Request;

interface MatchProviderInterface
{
    /**
     * @param string $url
     *
     * @return array
     */
    public function match(string $url): array;

    /**
     * @param \Symfony\Component\HttpFoundation\Request $request
     *
     * @return array
     */
    public function matchRequest(Request $request): array;
}