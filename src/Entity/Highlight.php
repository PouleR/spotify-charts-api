<?php declare(strict_types=1);

namespace PouleR\SpotifyChartsAPI\Entity;

/**
 * Class Highlight
 */
class Highlight
{
    private string $type = '';
    private string $text = '';
    private string $displayImageUri = '';
    private string $backgroundColor = '';
    private string $chartLabel = '';
    private string $chartUri = '';

    /**
     * @return string
     */
    public function getType(): string
    {
        return $this->type;
    }

    /**
     * @param string $type
     */
    public function setType(string $type): void
    {
        $this->type = $type;
    }

    /**
     * @return string
     */
    public function getText(): string
    {
        return $this->text;
    }

    /**
     * @param string $text
     */
    public function setText(string $text): void
    {
        $this->text = $text;
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

    /**
     * @return string
     */
    public function getBackgroundColor(): string
    {
        return $this->backgroundColor;
    }

    /**
     * @param string $backgroundColor
     */
    public function setBackgroundColor(string $backgroundColor): void
    {
        $this->backgroundColor = $backgroundColor;
    }

    /**
     * @return string
     */
    public function getChartLabel(): string
    {
        return $this->chartLabel;
    }

    /**
     * @param string $chartLabel
     */
    public function setChartLabel(string $chartLabel): void
    {
        $this->chartLabel = $chartLabel;
    }

    /**
     * @return string
     */
    public function getChartUri(): string
    {
        return $this->chartUri;
    }

    /**
     * @param string $chartUri
     */
    public function setChartUri(string $chartUri): void
    {
        $this->chartUri = $chartUri;
    }
}
