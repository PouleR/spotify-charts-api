<?php declare(strict_types=1);

namespace PouleR\SpotifyChartsAPI\Tests\Entity;

use PHPUnit\Framework\TestCase;
use PouleR\SpotifyChartsAPI\Entity\AlbumMetadata;
use PouleR\SpotifyChartsAPI\Entity\ArtistMetadata;
use PouleR\SpotifyChartsAPI\Entity\ChartEntryData;
use PouleR\SpotifyChartsAPI\Entity\Entry;
use PouleR\SpotifyChartsAPI\Entity\TrackMetadata;

/**
 * Class EntryTest
 */
class EntryTest extends TestCase
{
    private Entry $entry;

    /**
     * @return void
     */
    public function setUp(): void
    {
        $this->entry = new Entry();
        $this->entry->setAlbumMetadata(['albumName' => 'unittest']);
        $this->entry->setArtistMetadata(['artistName' => 'test']);
        $this->entry->setChartEntryData(['currentRank' => 100]);
        $this->entry->setTrackMetadata(['trackName' => 'track']);
    }

    /**
     * @return void
     */
    public function testAlbumMetadata(): void
    {
        $metadata = $this->entry->getAlbumMetadata();
        self::assertInstanceOf(AlbumMetadata::class, $metadata);
        self::assertEquals('unittest', $metadata->getAlbumName());
    }

    /**
     * @return void
     */
    public function testArtistMetadata(): void
    {
        $metadata = $this->entry->getArtistMetadata();
        self::assertInstanceOf(ArtistMetadata::class, $metadata);
        self::assertEquals('test', $metadata->getArtistName());
    }

    /**
     * @return void
     */
    public function testChartEntryData(): void
    {
        $chartEntryData = $this->entry->getChartEntryData();
        self::assertInstanceOf(ChartEntryData::class, $chartEntryData);
        self::assertEquals(100, $chartEntryData->getCurrentRank());
    }

    /**
     * @return void
     */
    public function testTrackMetadata(): void
    {
        $metadata = $this->entry->getTrackMetadata();
        self::assertInstanceOf(TrackMetadata::class, $metadata);
        self::assertEquals('track', $metadata->getTrackName());
    }
}
