<?php declare(strict_types=1);

namespace PouleR\SpotifyChartsAPI\Tests\Entity;

use PHPUnit\Framework\TestCase;
use PouleR\SpotifyChartsAPI\Entity\Artist;
use PouleR\SpotifyChartsAPI\Entity\Label;
use PouleR\SpotifyChartsAPI\Entity\TrackMetadata;

/**
 * Class TrackMetadataTest
 */
class TrackMetadataTest extends TestCase
{
    private TrackMetadata $trackMetadata;

    /**
     * @return void
     */
    public function setUp(): void
    {
        $this->trackMetadata = new TrackMetadata();
        $this->trackMetadata->setTrackName('test');
        $this->trackMetadata->setTrackUri('track.uri');
        $this->trackMetadata->setDisplayImageUri('image.uri');
        $this->trackMetadata->setReleaseDate('2018-01-01');

        $artist = new \stdClass();
        $artist->name = 'Artist';
        $artist->spotifyUri = 'artist.uri';

        $this->trackMetadata->setArtists([$artist]);

        $label = new \stdClass();
        $label->name = 'Label';
        $this->trackMetadata->setLabels([$label]);
    }

    /**
     * @return void
     */
    public function testReleaseDate(): void
    {
        self::assertEquals(new \DateTime('2018-01-01'), $this->trackMetadata->getReleaseDate());
    }

    /**
     * @return void
     */
    public function testTrackName(): void
    {
        self::assertEquals('test', $this->trackMetadata->getTrackName());
    }

    /**
     * @return void
     */
    public function testTrackUri(): void
    {
        self::assertEquals('track.uri', $this->trackMetadata->getTrackUri());
    }

    /**
     * @return void
     */
    public function testDisplayImageUri(): void
    {
        self::assertEquals('image.uri', $this->trackMetadata->getDisplayImageUri());
    }

    /**
     * @return void
     */
    public function testArtists(): void
    {
        $artists = $this->trackMetadata->getArtists();
        self::assertCount(1, $artists);
        self::assertInstanceOf(Artist::class, $artists[0]);

        self::assertEquals('Artist', $artists[0]->getName());
        self::assertEquals('artist.uri', $artists[0]->getSpotifyUri());
    }

    /**
     * @return void
     */
    public function testLabels(): void
    {
        $labels = $this->trackMetadata->getLabels();
        self::assertCount(1, $labels);
        self::assertInstanceOf(Label::class, $labels[0]);
        self::assertEquals('Label', $labels[0]->getName());
    }
}
