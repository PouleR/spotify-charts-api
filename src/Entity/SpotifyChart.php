<?php declare(strict_types=1);

namespace PouleR\SpotifyChartsAPI\Entity;

use Symfony\Component\Serializer\Exception\ExceptionInterface;
use Symfony\Component\Serializer\NameConverter\CamelCaseToSnakeCaseNameConverter;
use Symfony\Component\Serializer\Normalizer\ObjectNormalizer;

/**
 * Class SpotifyChart
 */
class SpotifyChart
{
    private ObjectNormalizer $normalizer;

    /** @var CountryFilter[] */
    private array $countryFilters;
    private DisplayChart $displayChart;

    /**
     * @var Entry[]
     */
    private array $entries;

    /** @var Highlight[] */
    private array $highlights;

    /**
     *
     */
    public function __construct()
    {
        $this->normalizer = new ObjectNormalizer(null, new CamelCaseToSnakeCaseNameConverter());
        $this->displayChart = new DisplayChart();
    }

    /**
     * @return array
     */
    public function getCountryFilters(): array
    {
        return $this->countryFilters;
    }

    /**
     * @param array $countryFilters
     *
     * @return void
     *
     * @throws ExceptionInterface
     */
    public function setCountryFilters(array $countryFilters): void
    {
        foreach ($countryFilters as $countryFilter) {
            $this->countryFilters[] = $this->normalizer->denormalize($countryFilter, CountryFilter::class);
        }
    }

    /**
     * @return DisplayChart
     */
    public function getDisplayChart(): DisplayChart
    {
        return $this->displayChart;
    }

    /**
     * @param array $displayChart
     *
     * @return void
     *
     * @throws ExceptionInterface
     */
    public function setDisplayChart(array $displayChart): void
    {
        $this->displayChart = $this->normalizer->denormalize($displayChart, DisplayChart::class);
    }

    /**
     * @return Entry[]
     */
    public function getEntries(): array
    {
        return $this->entries;
    }

    /**
     * @param array $entries
     *
     * @return void
     *
     * @throws ExceptionInterface
     */
    public function setEntries(array $entries): void
    {
        foreach ($entries as $entry) {
            $this->entries[] = $this->normalizer->denormalize($entry, Entry::class);
        }
    }

    /**
     * @return array
     */
    public function getHighlights(): array
    {
        return $this->highlights;
    }

    /**
     * @param array $highlights
     *
     * @return void
     *
     * @throws ExceptionInterface
     */
    public function setHighlights(array $highlights): void
    {
        foreach ($highlights as $highlight) {
            $this->highlights[] = $this->normalizer->denormalize($highlight, Highlight::class);
        }
    }
}
