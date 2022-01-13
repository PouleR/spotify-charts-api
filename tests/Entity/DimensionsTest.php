<?php declare(strict_types=1);

namespace PouleR\SpotifyChartsAPI\Tests\Entity;

use PHPUnit\Framework\TestCase;
use PouleR\SpotifyChartsAPI\Entity\Dimensions;

/**
 * Class DimensionsTest
 */
class DimensionsTest extends TestCase
{
    private Dimensions $dimensions;

    /**
     * @return void
     */
    public function setUp(): void
    {
        $this->dimensions = new Dimensions();
        $this->dimensions->setChartType('type');
        $this->dimensions->setCountry('uk');
        $this->dimensions->setRecurrence('test');
        $this->dimensions->setEarliestDate('2010-01-01');
        $this->dimensions->setLatestDate('2030-01-01');
    }

    /**
     * @return void
     */
    public function testChartType(): void
    {
        self::assertEquals('type', $this->dimensions->getChartType());
    }

    /**
     * @return void
     */
    public function testCountry(): void
    {
        self::assertEquals('uk', $this->dimensions->getCountry());
    }

    /**
     * @return void
     */
    public function testRecurrence(): void
    {
        self::assertEquals('test', $this->dimensions->getRecurrence());
    }

    /**
     * @return void
     */
    public function testEarliestDate(): void
    {
        self::assertEquals(new \DateTime('2010-01-01'), $this->dimensions->getEarliestDate());
    }

    /**
     * @return void
     */
    public function testLatestDate(): void
    {
        self::assertEquals(new \DateTime('2030-01-01'), $this->dimensions->getLatestDate());
    }
}
