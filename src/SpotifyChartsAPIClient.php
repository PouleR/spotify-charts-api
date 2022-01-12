<?php declare(strict_types=1);

namespace PouleR\SpotifyChartsAPI;

use PouleR\SpotifyChartsAPI\Exception\SpotifyChartsAPIException;
use Symfony\Contracts\HttpClient\Exception\ClientExceptionInterface;
use Symfony\Contracts\HttpClient\Exception\RedirectionExceptionInterface;
use Symfony\Contracts\HttpClient\Exception\ServerExceptionInterface;
use Symfony\Contracts\HttpClient\Exception\TransportExceptionInterface;
use Symfony\Contracts\HttpClient\HttpClientInterface;

/**
 * Class SpotifyChartsAPIClient
  */
class SpotifyChartsAPIClient
{
    private const CHARTS_API_URL = 'https://charts-spotify-com-service.spotify.com/auth/v0/charts/';
    protected HttpClientInterface $httpClient;
    protected string $accessToken = '';

    /**
     * @param HttpClientInterface $httpClient
     */
    public function __construct(HttpClientInterface $httpClient)
    {
        $this->httpClient = $httpClient;
    }

    /**
     * @param string $accessToken
     */
    public function setAccessToken(string $accessToken): void
    {
        $this->accessToken = $accessToken;
    }

    /**
     * @param string                                      $method
     * @param string                                      $service
     * @param array                                       $headers
     * @param array|string|resource|\Traversable|\Closure $body
     *
     * @return object
     *
     * @throws SpotifyChartsAPIException
     */
    public function apiRequest(string $method, string $service, array $headers = [], $body = null)
    {
        $requestUrl = sprintf('%s%s', self::CHARTS_API_URL, $service);

        try {
            $headers = array_merge($headers, $this->getDefaultHeaders());
            $response = $this->httpClient->request($method, $requestUrl, ['headers' => $headers, 'body' => $body]);

            return json_decode($response->getContent(), true);
        } catch (ServerExceptionInterface | ClientExceptionInterface | RedirectionExceptionInterface | TransportExceptionInterface | \Exception $exception) {
            throw new SpotifyChartsAPIException(
                'API request: (' . $service . '), ' . $exception->getMessage(),
                $exception->getCode()
            );
        }
    }

    /**
     * @return string[]
     */
    private function getDefaultHeaders(): array
    {
        return [
            'Authorization' => 'Bearer ' . $this->accessToken,
            'Accept' => 'application/json',
            'Content-Type' => 'application/json',
        ];
    }
}
