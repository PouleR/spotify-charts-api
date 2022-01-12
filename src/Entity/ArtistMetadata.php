<?php declare(strict_types=1);

namespace PouleR\SpotifyChartsAPI\Entity;

/**
 * Class ArtistMetadata
 */
class ArtistMetadata
{
    private string $artistName = '';
    private string $artistUri = '';
    private string $displayImageUri = '';

    /**
     * @return string
     */
    public function getArtistName(): string
    {
        return $this->artistName;
    }

    /**
     * @param string $artistName
     */
    public function setArtistName(string $artistName): void
    {
        $this->artistName = $artistName;
    }

    /**
     * @return string
     */
    public function getArtistUri(): string
    {
        return $this->artistUri;
    }

    /**
     * @param string $artistUri
     */
    public function setArtistUri(string $artistUri): void
    {
        $this->artistUri = $artistUri;
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
     */
    public function setDisplayImageUri(string $displayImageUri): void
    {
        $this->displayImageUri = $displayImageUri;
    }
}
