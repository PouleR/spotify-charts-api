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
    private ArtistMetadata $artistMetadata;
    private AlbumMetadata $albumMetadata;
    private TrackMetadata $trackMetadata;

    /**
     *
     */
    public function __construct()
    {
        $this->normalizer = new ObjectNormalizer(null, new CamelCaseToSnakeCaseNameConverter());
        $this->albumMetadata = new AlbumMetadata();
        $this->trackMetadata = new TrackMetadata();
        $this->chartEntryData = new ChartEntryData();
        $this->artistMetadata = new ArtistMetadata();
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
        $this->chartEntryData = $this->normalizer->denormalize($chartEntryData, ChartEntryData::class);
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

    /**
     * @return ArtistMetadata
     */
    public function getArtistMetadata(): ArtistMetadata
    {
        return $this->artistMetadata;
    }

    /**
     * @param array $artistMetadata
     *
     * @return void
     *
     * @throws ExceptionInterface
     */
    public function setArtistMetadata(array $artistMetadata): void
    {
        $this->artistMetadata = $this->normalizer->denormalize($artistMetadata, ArtistMetadata::class);
    }

    /**
     * @return AlbumMetadata
     */
    public function getAlbumMetadata(): AlbumMetadata
    {
        return $this->albumMetadata;
    }

    /**
     * @param array $albumMetadata
     *
     * @return void
     *
     * @throws ExceptionInterface
     */
    public function setAlbumMetadata(array $albumMetadata): void
    {
        $this->albumMetadata = $this->normalizer->denormalize($albumMetadata, AlbumMetadata::class);
    }
}
