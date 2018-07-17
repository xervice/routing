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
     * @throws \Symfony\Component\Routing\Exception\ResourceNotFoundException
     * @throws \Symfony\Component\Routing\Exception\NoConfigurationException
     * @throws \Symfony\Component\Routing\Exception\MethodNotAllowedException
     */
    public function match(string $url): array
    {
        return $this->urlMatcher->match($url);
    }
}