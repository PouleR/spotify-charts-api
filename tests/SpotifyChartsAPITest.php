<?php declare(strict_types=1);

namespace PouleR\SpotifyChartsAPI\Tests;

use PHPUnit\Framework\MockObject\MockObject;
use PouleR\SpotifyChartsAPI\Entity\SpotifyChart;
use PouleR\SpotifyChartsAPI\SpotifyChartsAPI;
use PouleR\SpotifyChartsAPI\SpotifyChartsAPIClient;
use PHPUnit\Framework\TestCase;
use Symfony\Contracts\HttpClient\ResponseInterface;

/**
 * Class SpotifyChartsAPITest
 */
class SpotifyChartsAPITest extends TestCase
{
    /**
     * @var MockObject|SpotifyChartsAPIClient
     */
    private $apiClient;

    /**
     * @var MockObject|ResponseInterface
     */
    private $response;
    private SpotifyChartsAPI $spotifyCharts;

    /**
     * @return void
     */
    public function setUp(): void
    {
        $this->apiClient = $this->createMock(SpotifyChartsAPIClient::class);
        $this->spotifyCharts = new SpotifyChartsAPI($this->apiClient);
        $this->response = $this->createMock(ResponseInterface::class);
        $this->response->expects(self::any())
            ->method('getContent')
            ->willReturn('');
    }

    /**
     * @return void
     */
    public function testExceptionDuringRequest(): void
    {
        $this->apiClient->expects(self::once())
            ->method('apiRequest')
            ->willThrowException(new \Exception('Ooops', 502));

        self::assertNull($this->spotifyCharts->getRegionalTopSongs());
    }

    /**
     * @return void
     */
    public function testRegionalTopSongs(): void
    {
        $this->apiClient->expects(self::exactly(3))
            ->method('apiRequest')
            ->withConsecutive(
                ['GET', 'regional-global-daily/latest'],
                ['GET', 'regional-uk-weekly/2022-01-01'],
                ['GET', 'genresongs-dance-weekly/2022-01-02'],
            )->willReturn($this->response);

        self::assertInstanceOf(SpotifyChart::class, $this->spotifyCharts->getRegionalTopSongs());
        self::assertInstanceOf(SpotifyChart::class, $this->spotifyCharts->getRegionalTopSongs('uk', 'weekly', '2022-01-01'));
        self::assertInstanceOf(SpotifyChart::class, $this->spotifyCharts->getRegionalTopSongs('us', 'weekly', '2022-01-02', 'dance'));
    }

    /**
     * @return void
     */
    public function testCityTopSongs(): void
    {
        $this->apiClient->expects(self::exactly(2))
            ->method('apiRequest')
            ->withConsecutive(
                ['GET', 'citytoptrack-amsterdam-weekly/latest'],
                ['GET', 'citypulsetrack-berlin-weekly/2021-12-31'],
            )->willReturn($this->response);

        self::assertInstanceOf(SpotifyChart::class, $this->spotifyCharts->getCityTopSongs('amsterdam'));
        self::assertInstanceOf(SpotifyChart::class, $this->spotifyCharts->getCityTopSongs('berlin', 'pulse', '2021-12-31'));
    }

    /**
     * @return void
     */
    public function testTopArtists(): void
    {
        $this->apiClient->expects(self::exactly(2))
            ->method('apiRequest')
            ->withConsecutive(
                ['GET', 'artist-global-daily/latest'],
                ['GET', 'artist-nl-weekly/2021-12-31'],
            )->willReturn($this->response);

        self::assertInstanceOf(SpotifyChart::class, $this->spotifyCharts->getTopArtists());
        self::assertInstanceOf(SpotifyChart::class, $this->spotifyCharts->getTopArtists('nl', 'weekly', '2021-12-31'));
    }

    /**
     * @return void
     */
    public function testTopAlbums(): void
    {
        $this->apiClient->expects(self::exactly(2))
            ->method('apiRequest')
            ->withConsecutive(
                ['GET', 'album-global-weekly/latest'],
                ['GET', 'album-de-weekly/2021-11-31'],
            )->willReturn($this->response);

        self::assertInstanceOf(SpotifyChart::class, $this->spotifyCharts->getTopAlbums());
        self::assertInstanceOf(SpotifyChart::class, $this->spotifyCharts->getTopAlbums('de', '2021-11-31'));
    }

    /**
     * @return void
     */
    public function testViralSongs(): void
    {
        $this->apiClient->expects(self::exactly(2))
            ->method('apiRequest')
            ->withConsecutive(
                ['GET', 'viral-global-daily/latest'],
                ['GET', 'viral-nl-daily/2021-10-31'],
            )->willReturn($this->response);

        self::assertInstanceOf(SpotifyChart::class, $this->spotifyCharts->getViralSongs());
        self::assertInstanceOf(SpotifyChart::class, $this->spotifyCharts->getViralSongs('nl', '2021-10-31'));
    }
}
