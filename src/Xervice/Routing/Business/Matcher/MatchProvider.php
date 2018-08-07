<?php


namespace Xervice\Routing\Business\Matcher;


use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Matcher\UrlMatcher;

class MatchProvider implements MatchProviderInterface
{
    /**
     * @var \Symfony\Component\Routing\Matcher\UrlMatcher
     */
    private $urlMatcher;

    /**
     * @var \Symfony\Component\HttpFoundation\Request
     */
    private $request;

    /**
     * MatchProvider constructor.
     *
     * @param \Symfony\Component\Routing\Matcher\UrlMatcher $urlMatcher
     * @param \Symfony\Component\HttpFoundation\Request $request
     */
    public function __construct(UrlMatcher $urlMatcher, Request $request)
    {
        $this->urlMatcher = $urlMatcher;
        $this->request = $request;
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

    /**
     * @return array
     */
    public function matchRequest(): array
    {
        return $this->urlMatcher->matchRequest($this->request);
    }
}