<?php declare(strict_types=1);

namespace PouleR\SpotifyChartsAPI\Entity;

/**
 * Class CountryFilter
 */
class CountryFilter
{
    private string $code = '';
    private string $readableName = '';

    /**
     * @return string
     */
    public function getCode(): string
    {
        return $this->code;
    }

    /**
     * @param string $code
     */
    public function setCode(string $code): void
    {
        $this->code = $code;
    }

    /**
     * @return string
     */
    public function getReadableName(): string
    {
        return $this->readableName;
    }

    /**
     * @param string $readableName
     */
    public function setReadableName(string $readableName): void
    {
        $this->readableName = $readableName;
    }
}