<?php declare(strict_types=1);

namespace PouleR\SpotifyChartsAPI\Entity;

use Symfony\Component\Serializer\Exception\ExceptionInterface;
use Symfony\Component\Serializer\NameConverter\CamelCaseToSnakeCaseNameConverter;
use Symfony\Component\Serializer\Normalizer\ObjectNormalizer;

/**
 * Class Entry
 */
class Entry
{
    private ObjectNormalizer $normalizer;
    private ChartEntryData $chartEntryData;
    private TrackMetadata $trackMetadata;

    /**
     *
     */
    public function __construct()
    {
        $this->normalizer = new ObjectNormalizer(null, new CamelCaseToSnakeCaseNameConverter());
    }

    /**
     * @return ChartEntryData
     */
    public function getChartEntryData(): ChartEntryData
    {
        return $this->chartEntryData;
    }

    /**
     * @param array $chartEntryData
     *
     * @return void
     *
     * @throws ExceptionInterface
     */
    public function setChartEntryData(array $chartEntryData): void
    {
        $this->chartEntryData = $this->normalizer->denormalize($chartEntryData, ChartEntryData::class);;
    }

    /**
     * @return TrackMetadata
     */
    public function getTrackMetadata(): TrackMetadata
    {
        return $this->trackMetadata;
    }

    /**
     * @param array $trackMetadata
     *
     * @return void
     *
     * @throws ExceptionInterface
     */
    public function setTrackMetadata(array $trackMetadata): void
    {
        $this->trackMetadata = $this->normalizer->denormalize($trackMetadata, TrackMetadata::class);
    }
}
