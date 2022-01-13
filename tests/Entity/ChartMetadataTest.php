<?php declare(strict_types=1);

namespace PouleR\SpotifyChartsAPI\Tests\Entity;

use PHPUnit\Framework\TestCase;
use PouleR\SpotifyChartsAPI\Entity\ChartMetadata;
use PouleR\SpotifyChartsAPI\Entity\Dimensions;

/**
 * Class ChartMetadataTest
 */
class ChartMetadataTest extends TestCase
{
    private ChartMetadata $chartMetadata;

    /**
     * @return void
     */
    public function setUp(): void
    {
        $this->chartMetadata = new ChartMetadata();
        $this->chartMetadata->setUri('chart.uri');
        $this->chartMetadata->setAlias('alias');
        $this->chartMetadata->setBackgroundColor('#000');
        $this->chartMetadata->setDimensions(['country' => 'nl', 'chartType' => 'viral']);
        $this->chartMetadata->setEntityType('test');
        $this->chartMetadata->setReadableTitle('Test Chart');
        $this->chartMetadata->setTextColor('#fff');
    }

    /**
     * @return void
     */
    public function testUri(): void
    {
        self::assertEquals('chart.uri', $this->chartMetadata->getUri());
    }

    /**
     * @return void
     */
    public function testAlias(): void
    {
        self::assertEquals('alias', $this->chartMetadata->getAlias());
    }

    /**
     * @return void
     */
    public function testBackgroundColor(): void
    {
        self::assertEquals('#000', $this->chartMetadata->getBackgroundColor());
    }

    /**
     * @return void
     */
    public function testDimensions(): void
    {
        $dimensions = $this->chartMetadata->getDimensions();
        self::assertInstanceOf(Dimensions::class, $dimensions);
        self::assertEquals('nl', $dimensions->getCountry());
        self::assertEquals('viral', $dimensions->getChartType());
    }

    /**
     * @return void
     */
    public function testEntityType(): void
    {
        self::assertEquals('test', $this->chartMetadata->getEntityType());
    }

    /**
     * @return void
     */
    public function testReadableTitle(): void
    {
        self::assertEquals('Test Chart', $this->chartMetadata->getReadableTitle());
    }

    /**
     * @return void
     */
    public function testTextColor(): void
    {
        self::assertEquals('#fff', $this->chartMetadata->getTextColor());
    }
}
