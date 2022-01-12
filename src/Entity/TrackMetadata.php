<?php declare(strict_types=1);

namespace PouleR\SpotifyChartsAPI\Entity;

use Symfony\Component\Serializer\Exception\ExceptionInterface;
use Symfony\Component\Serializer\NameConverter\CamelCaseToSnakeCaseNameConverter;
use Symfony\Component\Serializer\Normalizer\ObjectNormalizer;

/**
 * Class TrackMetadata
 */
class TrackMetadata
{
    private ObjectNormalizer $normalizer;

    private string $trackName = '';
    private string $trackUri = '';
    private string $displayImageUri = '';

    /** @var Artist[] */
    private array $artists;

    /** @var Label[] */
    private array $labels;

    private ?\DateTime $releaseDate = null;

    /**
     *
     */
    public function __construct()
    {
        $this->normalizer = new ObjectNormalizer(null, new CamelCaseToSnakeCaseNameConverter());
    }

    /**
     * @return string
     */
    public function getTrackName(): string
    {
        return $this->trackName;
    }

    /**
     * @param string $trackName
     *
     * @return void
     */
    public function setTrackName(string $trackName): void
    {
        $this->trackName = $trackName;
    }

    /**
     * @return string
     */
    public function getTrackUri(): string
    {
        return $this->trackUri;
    }

    /**
     * @param string $trackUri
     *
     * @return void
     */
    public function setTrackUri(string $trackUri): void
    {
        $this->trackUri = $trackUri;
    }

    /**
     * @return string
     */
    public function getDisplayImageUri(): string
    {
        return $this->displayImageUri;
    }

    /**
     * @param string $displayImageUri
     *
     * @return void
     */
    public function setDisplayImageUri(string $displayImageUri): void
    {
        $this->displayImageUri = $displayImageUri;
    }

    /**
     * @return Artist[]
     */
    public function getArtists(): array
    {
        return $this->artists;
    }

    /**
     * @param array $artists
     *
     * @return void
     *
     * @throws ExceptionInterface
     */
    public function setArtists(array $artists): void
    {
        foreach ($artists as $artist) {
            $this->artists[] = $this->normalizer->denormalize($artist, Artist::class);
        }
    }

    /**
     * @return Label[]
     */
    public function getLabels(): array
    {
        return $this->labels;
    }

    /**
     * @param array $labels
     *
     * @return void
     *
     * @throws ExceptionInterface
     */
    public function setLabels(array $labels): void
    {
        foreach ($labels as $label) {
            $this->labels[] = $this->normalizer->denormalize($label, Label::class);
        }
    }

    /**
     * @return \DateTime|null
     */
    public function getReleaseDate(): ?\DateTime
    {
        return $this->releaseDate;
    }

    /**
     * @param string $releaseDate
     *
     * @return void
     *
     * @throws \Exception
     */
    public function setReleaseDate(string $releaseDate): void
    {
        $this->releaseDate = new \DateTime($releaseDate);
    }
}
