<?php declare(strict_types=1);

namespace PouleR\SpotifyChartsAPI\Tests\Entity;

use PouleR\SpotifyChartsAPI\Entity\AlbumMetadata;
use PHPUnit\Framework\TestCase;
use PouleR\SpotifyChartsAPI\Entity\Artist;
use PouleR\SpotifyChartsAPI\Entity\Label;

/**
 * Class AlbumMetadataTest
 */
class AlbumMetadataTest extends TestCase
{
    private AlbumMetadata $albumMetadata;

    /**
     * @return void
     */
    public function setUp(): void
    {
        $this->albumMetadata = new AlbumMetadata();
        $this->albumMetadata->setReleaseDate('2022-01-01');
        $this->albumMetadata->setAlbumName('album.name');
        $this->albumMetadata->setAlbumuri('album.uri');
        $this->albumMetadata->setDisplayImageUri('display.uri');

        $artist1 = new \stdClass();
        $artist1->name = 'Artist 1';
        $artist1->spotifyUri = 'uri1';

        $artist2 = new \stdClass();
        $artist2->name = 'Artist 2';

        $this->albumMetadata->setArtists([$artist1, $artist2]);

        $label = new \stdClass();
        $label->name = 'Test label';
        $this->albumMetadata->setLabels([$label]);
    }

    /**
     * @return void
     */
    public function testReleaseDate(): void
    {
        self::assertEquals(new \DateTime('2022-01-01'), $this->albumMetadata->getReleaseDate());
    }

    /**
     * @return void
     */
    public function testAlbumName(): void
    {
        self::assertEquals('album.name', $this->albumMetadata->getAlbumName());
    }

    /**
     * @return void
     */
    public function testAlbumUri(): void
    {
        self::assertEquals('album.uri', $this->albumMetadata->getAlbumuri());
    }

    /**
     * @return void
     */
    public function testDisplayImageUri(): void
    {
        self::assertEquals('display.uri', $this->albumMetadata->getDisplayImageUri());
    }

    /**
     * @return void
     */
    public function testArtists(): void
    {
        $artists = $this->albumMetadata->getArtists();
        self::assertCount(2, $artists);
        self::assertInstanceOf(Artist::class, $artists[0]);

        self::assertEquals('Artist 1', $artists[0]->getName());
        self::assertEquals('uri1', $artists[0]->getSpotifyUri());
        self::assertEquals('Artist 2', $artists[1]->getName());
        self::assertEquals('', $artists[1]->getSpotifyUri());
    }

    /**
     * @return void
     */
    public function testLabels(): void
    {
        $labels = $this->albumMetadata->getLabels();
        self::assertCount(1, $labels);
        self::assertInstanceOf(Label::class, $labels[0]);
        self::assertEquals('Test label', $labels[0]->getName());
    }
}
