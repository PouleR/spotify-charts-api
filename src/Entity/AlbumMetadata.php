<?php declare(strict_types=1);

namespace PouleR\SpotifyChartsAPI\Entity;

use Symfony\Component\Serializer\Exception\ExceptionInterface;
use Symfony\Component\Serializer\NameConverter\CamelCaseToSnakeCaseNameConverter;
use Symfony\Component\Serializer\Normalizer\ObjectNormalizer;

/**
 * Class AlbumMetadata
 */
class AlbumMetadata
{
    private ObjectNormalizer $normalizer;

    private string $albumName = '';
    private string $albumUri = '';
    private string $displayImageUri = '';

    /** @var Artist[] */
    private array $artists = [];

    /** @var Label[] */
    private array $labels = [];

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
    public function getAlbumName(): string
    {
        return $this->albumName;
    }

    /**
     * @param string $albumName
     *
     * @return void
     */
    public function setAlbumName(string $albumName): void
    {
        $this->albumName = $albumName;
    }

    /**
     * @return string
     */
    public function getAlbumuri(): string
    {
        return $this->albumUri;
    }

    /**
     * @param string $albumUri
     *
     * @return void
     */
    public function setAlbumuri(string $albumUri): void
    {
        $this->albumUri = $albumUri;
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
