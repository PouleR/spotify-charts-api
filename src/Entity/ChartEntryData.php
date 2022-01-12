<?php declare(strict_types=1);

namespace PouleR\SpotifyChartsAPI\Entity;

use Symfony\Component\Serializer\NameConverter\CamelCaseToSnakeCaseNameConverter;
use Symfony\Component\Serializer\Normalizer\ObjectNormalizer;

/**
 * Class ChartEntryData
 */
class ChartEntryData
{
    private int $currentRank = 0;
    private int $previousRank = 0;
    private int $peakRank = 0;
    private int $appearancesOnChart = 0;
    private int $consecutiveAppearancesOnChart = 0;
    private RankingMetric $rankingMetric;
    private string $entryStatus = '';
    private ?\DateTime $peakDate = null;
    private int $entryRank = 0;
    private ?\DateTime $entryDate = null;

    /**
     *
     */
    public function __construct()
    {
        $this->rankingMetric = new RankingMetric();
    }

    /**
     * @return int
     */
    public function getCurrentRank(): int
    {
        return $this->currentRank;
    }

    /**
     * @param int $currentRank
     */
    public function setCurrentRank(int $currentRank): void
    {
        $this->currentRank = $currentRank;
    }

    /**
     * @return int
     */
    public function getPreviousRank(): int
    {
        return $this->previousRank;
    }

    /**
     * @param int $previousRank
     */
    public function setPreviousRank(int $previousRank): void
    {
        $this->previousRank = $previousRank;
    }

    /**
     * @return int
     */
    public function getPeakRank(): int
    {
        return $this->peakRank;
    }

    /**
     * @param int $peakRank
     */
    public function setPeakRank(int $peakRank): void
    {
        $this->peakRank = $peakRank;
    }

    /**
     * @return int
     */
    public function getAppearancesOnChart(): int
    {
        return $this->appearancesOnChart;
    }

    /**
     * @param int $appearancesOnChart
     */
    public function setAppearancesOnChart(int $appearancesOnChart): void
    {
        $this->appearancesOnChart = $appearancesOnChart;
    }

    /**
     * @return int
     */
    public function getConsecutiveAppearancesOnChart(): int
    {
        return $this->consecutiveAppearancesOnChart;
    }

    /**
     * @param int $consecutiveAppearancesOnChart
     */
    public function setConsecutiveAppearancesOnChart(int $consecutiveAppearancesOnChart): void
    {
        $this->consecutiveAppearancesOnChart = $consecutiveAppearancesOnChart;
    }

    /**
     * @return RankingMetric
     */
    public function getRankingMetric(): RankingMetric
    {
        return $this->rankingMetric;
    }

    /**
     * @param array $rankingMetric
     */
    public function setRankingMetric(array $rankingMetric): void
    {
        $normalizer = new ObjectNormalizer(null, new CamelCaseToSnakeCaseNameConverter());
        $this->rankingMetric = $normalizer->denormalize($rankingMetric, RankingMetric::class);
    }

    /**
     * @return string
     */
    public function getEntryStatus(): string
    {
        return $this->entryStatus;
    }

    /**
     * @param string $entryStatus
     */
    public function setEntryStatus(string $entryStatus): void
    {
        $this->entryStatus = $entryStatus;
    }

    /**
     * @return \DateTime|null
     */
    public function getPeakDate(): ?\DateTime
    {
        return $this->peakDate;
    }

    /**
     * @param string $peakDate
     *
     * @return void
     *
     * @throws \Exception
     */
    public function setPeakDate(string $peakDate): void
    {
        $this->peakDate = new \DateTime($peakDate);
    }

    /**
     * @return int
     */
    public function getEntryRank(): int
    {
        return $this->entryRank;
    }

    /**
     * @param int $entryRank
     */
    public function setEntryRank(int $entryRank): void
    {
        $this->entryRank = $entryRank;
    }

    /**
     * @return \DateTime|null
     */
    public function getEntryDate(): ?\DateTime
    {
        return $this->entryDate;
    }

    /**
     * @param string $entryDate
     *
     * @return void
     *
     * @throws \Exception
     */
    public function setEntryDate(string $entryDate): void
    {
        $this->entryDate = new \DateTime($entryDate);
    }
}
