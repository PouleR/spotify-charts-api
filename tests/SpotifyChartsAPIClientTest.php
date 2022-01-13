<?php declare(strict_types=1);

namespace PouleR\SpotifyChartsAPI\Tests;

use PHPUnit\Framework\MockObject\MockObject;
use PouleR\SpotifyChartsAPI\Exception\SpotifyChartsAPIException;
use PouleR\SpotifyChartsAPI\SpotifyChartsAPIClient;
use PHPUnit\Framework\TestCase;
use Symfony\Contracts\HttpClient\HttpClientInterface;
use Symfony\Contracts\HttpClient\ResponseInterface;

/**
 * Class SpotifyChartsAPIClientTest
 */
class SpotifyChartsAPIClientTest extends TestCase
{
    /**
     * @var MockObject|HttpClientInterface
     */
    private $httpClient;
    private SpotifyChartsAPIClient $apiClient;

    /**
     * @return void
     */
    public function setUp(): void
    {
        $this->httpClient = $this->createMock(HttpClientInterface::class);
        $this->apiClient = new SpotifyChartsAPIClient($this->httpClient);
        $this->apiClient->setAccessToken('access.token');
    }

    /**
     * @return void
     *
     * @throws SpotifyChartsAPIException
     */
    public function testApiRequest(): void
    {
        $response = $this->createMock(ResponseInterface::class);
        $response->expects(self::once())
            ->method('getContent')
            ->willReturn(json_encode(['response' => 'data']));

        $this->httpClient->expects(self::once())
            ->method('request')
            ->with(
                'POST',
                'https://charts-spotify-com-service.spotify.com/auth/v0/charts/songs/test',
                [
                    'headers' => [
                            'unit' => 'test',
                            'Authorization' => 'Bearer access.token',
                            'Accept' => 'application/json',
                            'Content-Type' => 'application/json',
                    ],
                    'body' => 'data',
                ])
            ->willReturn($response);

        $apiResponse = $this->apiClient->apiRequest('POST','songs/test', ['unit' => 'test'],'data');
        self::assertEquals(['response' => 'data'], $apiResponse);
    }

    /**
     * @return void
     */
    public function testApiRequestException(): void
    {
        $this->httpClient->expects(self::once())
            ->method('request')
            ->willThrowException(new \Exception('Error!', 501));

        $this->expectException(SpotifyChartsAPIException::class);
        $this->expectExceptionMessage('API request: (albums/test), Error!');
        $this->expectExceptionCode(501);

        $this->apiClient->apiRequest('GET','albums/test');
    }
}
