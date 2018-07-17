<?php


namespace Xervice\Routing\Business\Matcher;


use Symfony\Component\Routing\Matcher\UrlMatcher;

class MatchProvider implements MatchProviderInterface
{
    /**
     * @var \Symfony\Component\Routing\Matcher\UrlMatcher
     */
    private $urlMatcher;

    /**
     * Matcher constructor.
     *
     * @param \Symfony\Component\Routing\Matcher\UrlMatcher $urlMatcher
     */
    public function __construct(UrlMatcher $urlMatcher)
    {
        $this->urlMatcher = $urlMatcher;
    }

    /**
     * @param string $url
     *
     * @return array
     */
    public function match(string $url): array
    {
        return $this->urlMatcher->match($url);
    }
}