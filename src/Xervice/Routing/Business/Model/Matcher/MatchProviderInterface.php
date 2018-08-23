<?php

namespace Xervice\Routing\Business\Model\Matcher;

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
     * @return array
     */
    public function matchRequest(): array;
}