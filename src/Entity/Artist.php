<?php declare(strict_types=1);

namespace PouleR\SpotifyChartsAPI\Entity;

/**
 * Class Artist
 */
class Artist
{
    private string $name = '';
    private string $spotifyUri = '';

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @param string $name
     */
    public function setName(string $name): void
    {
        $this->name = $name;
    }

    /**
     * @return string
     */
    public function getSpotifyUri(): string
    {
        return $this->spotifyUri;
    }

    /**
     * @param string $spotifyUri
     */
    public function setSpotifyUri(string $spotifyUri): void
    {
        $this->spotifyUri = $spotifyUri;
    }
}
