<?php declare(strict_types=1);

namespace PouleR\SpotifyChartsAPI\Tests\Entity;

use PHPUnit\Framework\TestCase;
use PouleR\SpotifyChartsAPI\Entity\ChartMetadata;
use PouleR\SpotifyChartsAPI\Entity\DisplayChart;

/**
 * Class DisplayChartTest
 */
class DisplayChartTest extends TestCase
{
    private DisplayChart $displayChart;

    /**
     * @return void
     */
    public function setUp(): void
    {
        $this->displayChart = new DisplayChart();
        $this->displayChart->setDate('2022-01-13');
        $this->displayChart->setDescription('test description');
        $this->displayChart->setChartMetadata(['uri' => 'test.uri', 'alias' => 'test']);
    }

    /**
     * @return void
     */
    public function testDate(): void
    {
        self::assertEquals(new \DateTime('2022-01-13'), $this->displayChart->getDate());
    }

    /**
     * @return void
     */
    public function testDescription(): void
    {
        self::assertEquals('test description', $this->displayChart->getDescription());
    }


    /**
     * @return void
     */
    public function testMetadata(): void
    {
        $metadata = $this->displayChart->getChartMetadata();
        self::assertInstanceOf(ChartMetadata::class, $metadata);
        self::assertEquals('test.uri', $metadata->getUri());
        self::assertEquals('test', $metadata->getAlias());
    }
}
