<?php declare(strict_types=1);

namespace PouleR\SpotifyChartsAPI\Tests\Entity;

use PHPUnit\Framework\TestCase;
use PouleR\SpotifyChartsAPI\Entity\DisplayChart;
use PouleR\SpotifyChartsAPI\Entity\SpotifyChart;

/**
 * Class SpotifyChartTest
 */
class SpotifyChartTest extends TestCase
{
    private SpotifyChart $spotifyChart;

    /**
     * @return void
     */
    public function setUp(): void
    {
        $this->spotifyChart = new SpotifyChart();
        $this->spotifyChart->setCountryFilters([['code' => 'us']]);
        $this->spotifyChart->setDisplayChart(['description' => 'test']);
        $this->spotifyChart->setEntries([]);
        $this->spotifyChart->setHighlights([['text' => 'highlight']]);
    }

    /**
     * @return void
     */
    public function testCountryFilters(): void
    {
        $filters = $this->spotifyChart->getCountryFilters();
        self::assertCount(1, $filters);
        self::assertEquals('us', $filters[0]->getCode());
    }

    /**
     * @return void
     */
    public function testDisplayChart(): void
    {
        $chart = $this->spotifyChart->getDisplayChart();
        self::assertInstanceOf(DisplayChart::class, $chart);
        self::assertEquals('test', $chart->getDescription());
    }

    /**
     * @return void
     */
    public function testEntries(): void
    {
        self::assertCount(0, $this->spotifyChart->getEntries());
    }

    /**
     * @return void
     */
    public function testHighlights(): void
    {
        $highlights = $this->spotifyChart->getHighlights();
        self::assertCount(1, $highlights);
        self::assertEquals('highlight', $highlights[0]->getText());
    }
}
