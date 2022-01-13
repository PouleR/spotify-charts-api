<?php declare(strict_types=1);

namespace PouleR\SpotifyChartsAPI\Tests\Entity;

use PHPUnit\Framework\TestCase;
use PouleR\SpotifyChartsAPI\Entity\ChartEntryData;
use PouleR\SpotifyChartsAPI\Entity\RankingMetric;

/**
 * Class ChartEntryDataTest
 */
class ChartEntryDataTest extends TestCase
{
    private ChartEntryData $entryData;

    /**
     * @return void
     */
    public function setUp(): void
    {
        $this->entryData = new ChartEntryData();
        $this->entryData->setAppearancesOnChart(1);
        $this->entryData->setConsecutiveAppearancesOnChart(2);
        $this->entryData->setCurrentRank(3);
        $this->entryData->setEntryDate('2021-01-01');
        $this->entryData->setEntryRank(4);
        $this->entryData->setEntryStatus('entry.status');
        $this->entryData->setPeakDate('2021-02-02');
        $this->entryData->setPeakRank(5);
        $this->entryData->setPreviousRank(6);

        $metric = ['value' => 'test', 'type' => 'streams'];
        $this->entryData->setRankingMetric($metric);
    }

    /**
     * @return void
     */
    public function testAppearancesOnChart(): void
    {
        self::assertEquals(1, $this->entryData->getAppearancesOnChart());
    }

    /**
     * @return void
     */
    public function testConsecutiveAppearancesOnChart(): void
    {
        self::assertEquals(2, $this->entryData->getConsecutiveAppearancesOnChart());
    }

    /**
     * @return void
     */
    public function testCurrentRank(): void
    {
        self::assertEquals(3, $this->entryData->getCurrentRank());
    }

    /**
     * @return void
     */
    public function testEntryDate(): void
    {
        self::assertEquals(new \DateTime('2021-01-01'), $this->entryData->getEntryDate());
    }

    /**
     * @return void
     */
    public function testEntryRank(): void
    {
        self::assertEquals(4, $this->entryData->getEntryRank());
    }

    /**
     * @return void
     */
    public function testEntryStatus(): void
    {
        self::assertEquals('entry.status', $this->entryData->getEntryStatus());
    }

    /**
     * @return void
     */
    public function testPeakDate(): void
    {
        self::assertEquals(new \DateTime('2021-02-02'), $this->entryData->getPeakDate());
    }

    /**
     * @return void
     */
    public function testPeakRank(): void
    {
        self::assertEquals(5, $this->entryData->getPeakRank());
    }

    /**
     * @return void
     */
    public function testPreviousRank(): void
    {
        self::assertEquals(6, $this->entryData->getPreviousRank());
    }

    /**
     * @return void
     */
    public function testRankingMetric(): void
    {
        $metric = $this->entryData->getRankingMetric();
        self::assertInstanceOf(RankingMetric::class, $metric);
        self::assertEquals('test', $metric->getValue());
        self::assertEquals('streams', $metric->getType());
    }
}
