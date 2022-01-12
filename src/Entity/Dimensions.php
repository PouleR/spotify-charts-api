<?php declare(strict_types=1);

namespace PouleR\SpotifyChartsAPI\Entity;

/**
 * Class Dimensions
 */
class Dimensions
{
    private ?\DateTime $latestDate = null;
    private ?\DateTime $earliestDate = null;
    private string $country = '';
    private string $chartType = '';
    private string $recurrence = '';

    /**
     * @return \DateTime|null
     */
    public function getLatestDate(): ?\DateTime
    {
        return $this->latestDate;
    }

    /**
     * @param string $latestDate
     *
     * @return void
     *
     * @throws \Exception
     */
    public function setLatestDate(string $latestDate): void
    {
        $this->latestDate =  new \DateTime($latestDate);
    }

    /**
     * @return \DateTime|null
     */
    public function getEarliestDate(): ?\DateTime
    {
        return $this->earliestDate;
    }

    /**
     * @param string $earliestDate
     *
     * @return void
     *
     * @throws \Exception
     */
    public function setEarliestDate(string $earliestDate): void
    {
        $this->earliestDate = new \DateTime($earliestDate);
    }

    /**
     * @return string
     */
    public function getCountry(): string
    {
        return $this->country;
    }

    /**
     * @param string $country
     */
    public function setCountry(string $country): void
    {
        $this->country = $country;
    }

    /**
     * @return string
     */
    public function getChartType(): string
    {
        return $this->chartType;
    }

    /**
     * @param string $chartType
     */
    public function setChartType(string $chartType): void
    {
        $this->chartType = $chartType;
    }

    /**
     * @return string
     */
    public function getRecurrence(): string
    {
        return $this->recurrence;
    }

    /**
     * @param string $recurrence
     */
    public function setRecurrence(string $recurrence): void
    {
        $this->recurrence = $recurrence;
    }
}
