<?php declare(strict_types=1);

namespace PouleR\SpotifyChartsAPI;

use PouleR\SpotifyChartsAPI\Entity\SpotifyChart;
use PouleR\SpotifyChartsAPI\Exception\SpotifyChartsAPIException;
use PouleR\SpotifyLogin\SpotifyLogin;
use Psr\Log\LoggerInterface;
use Psr\Log\NullLogger;
use Symfony\Component\Serializer\NameConverter\CamelCaseToSnakeCaseNameConverter;
use Symfony\Component\Serializer\Normalizer\ObjectNormalizer;
use Throwable;

/**
 * Class SpotifyChartsAPI
 */
class SpotifyChartsAPI
{
    protected SpotifyChartsAPIClient $client;
    protected SpotifyLogin $spotifyLogin;
    protected ?LoggerInterface $logger = null;
    protected ObjectNormalizer $normalizer;

    /**
     * @param SpotifyChartsAPIClient $client
     * @param SpotifyLogin           $spotifyLogin
     * @param LoggerInterface|null   $logger
     */
    public function __construct(SpotifyChartsAPIClient $client, SpotifyLogin $spotifyLogin, LoggerInterface $logger = null)
    {
        $this->client = $client;
        $this->spotifyLogin = $spotifyLogin;
        $this->logger = $logger;

        if (!$logger) {
            $this->logger = new NullLogger();
        }

        $this->normalizer = new ObjectNormalizer(null, new CamelCaseToSnakeCaseNameConverter());
    }

    /**
     * @param string $accessToken
     */
    public function setAccessToken(string $accessToken): void
    {
        $this->client->setAccessToken($accessToken);
    }


    /**
     * @param string $country Allowed values are 'global' or the ISO 3166-1 alpha-2 country code
     * @param string $period  Allowed values are 'daily' or 'weekly'
     * @param string $date    Allowed values are 'latest' or 'YYYY-MM-DD'
     * @param string $genre   Could be empty or as specified by Spotify
     *
     * @return SpotifyChart|null
     */
    public function getRegionalTopSongs(string $country = 'global', string $period = 'daily', string $date = 'latest', string $genre = ''): ?SpotifyChart
    {
        $path = sprintf('regional-%s-%s/%s', $country, $period, $date);

        if(!empty($genre)) {
            $path = sprintf('genresongs-%s-%s/%s', $genre, $period, $date);
        }

        try {
            $response = $this->client->apiRequest('GET', $path);

            return $this->normalizer->denormalize($response, SpotifyChart::class);
        } catch (\Exception | \Throwable $exception) {
            $this->logError(__FUNCTION__, $exception);
        }

        return null;
    }

    /**
     * @param string $city City
     * @param string $type Allowed values are 'top' or 'pulse'
     * @param string $date Allowed values are 'latest' or 'YYYY-MM-DD'
     *
     * @return SpotifyChart|null
     */
    public function getCityTopSongs(string $city, string $type = 'top', string $date = 'latest'): ?SpotifyChart
    {
        $path = sprintf('city%strack-%s-weekly/%s', $type, $city, $date);

        try {
            $response = $this->client->apiRequest('GET', $path);

            return $this->normalizer->denormalize($response, SpotifyChart::class);
        } catch (\Exception | \Throwable $exception) {
            $this->logError(__FUNCTION__, $exception);
        }

        return null;
    }

    /**
     * @param string $country Allowed values are 'global' or the ISO 3166-1 alpha-2 country code
     * @param string $period  Allowed values are 'daily' or 'weekly'
     * @param string $date    Allowed values are 'latest' or 'YYYY-MM-DD'
     *
     * @return SpotifyChart|null
     */
    public function getTopArtists(string $country = 'global', string $period = 'daily', string $date = 'latest'): ?SpotifyChart
    {
        $path = sprintf('artist-%s-%s/%s', $country, $period, $date);

        try {
            $response = $this->client->apiRequest('GET', $path);

            return $this->normalizer->denormalize($response, SpotifyChart::class);
        } catch (\Exception | \Throwable $exception) {
            $this->logError(__FUNCTION__, $exception);
        }

        return null;
    }

    /**
     * @param string     $method
     * @param Throwable $exception
     */
    private function logError(string $method, Throwable $exception)
    {
        $this->logger->error('Error during API Request', [
            'method' => $method,
            'message' => $exception->getMessage(),
            'code' => $exception->getCode(),
        ]);
    }
}
