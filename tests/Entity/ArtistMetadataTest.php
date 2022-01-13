<?php declare(strict_types=1);

namespace PouleR\SpotifyChartsAPI\Tests\Entity;

use PouleR\SpotifyChartsAPI\Entity\ArtistMetadata;
use PHPUnit\Framework\TestCase;

/**
 * Class ArtistMetadataTest
 */
class ArtistMetadataTest extends TestCase
{
    private ArtistMetadata $artistMetadata;

    /**
     * @return void
     */
    public function setUp(): void
    {
        $this->artistMetadata = new ArtistMetadata();
        $this->artistMetadata->setArtistName('artist');
        $this->artistMetadata->setArtistUri('artist.uri');
        $this->artistMetadata->setDisplayImageUri('display.uri');
    }

    /**
     * @return void
     */
    public function testArtistName(): void
    {
        self::assertEquals('artist', $this->artistMetadata->getArtistName());
    }

    /**
     * @return void
     */
    public function testArtistUri(): void
    {
        self::assertEquals('artist.uri', $this->artistMetadata->getArtistUri());
    }

    /**
     * @return void
     */
    public function testDisplayImageUri(): void
    {
        self::assertEquals('display.uri', $this->artistMetadata->getDisplayImageUri());
    }
}
