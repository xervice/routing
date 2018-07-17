<?php

namespace Xervice\Routing\Business\Matcher;

interface MatchProviderInterface
{
    /**
     * @param string $url
     *
     * @return array
     */
    public function match(string $url): array;
}