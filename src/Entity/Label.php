<?php declare(strict_types=1);

namespace PouleR\SpotifyChartsAPI\Entity;

/**
 * Class Label
 */
class Label
{
    private string $name = '';

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
}
