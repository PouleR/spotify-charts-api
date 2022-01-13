<?php declare(strict_types=1);

namespace PouleR\SpotifyChartsAPI\Tests\Entity;

use PouleR\SpotifyChartsAPI\Entity\Artist;
use PHPUnit\Framework\TestCase;

/**
 * Class ArtistTest
 */
class ArtistTest extends TestCase
{
    private Artist $artist;

    /**
     * @return void
     */
    public function setUp(): void
    {
        $this->artist = new Artist();
        $this->artist->setName('unittest');
        $this->artist->setSpotifyUri('spotify.uri');
    }

    /**
     * @return void
     */
    public function testName(): void
    {
        self::assertEquals('unittest', $this->artist->getName());
    }

    /**
     * @return void
     */
    public function testSpotifytUri(): void
    {
        self::assertEquals('spotify.uri', $this->artist->getSpotifyUri());
    }
}
