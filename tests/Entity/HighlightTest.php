<?php declare(strict_types=1);

namespace PouleR\SpotifyChartsAPI\Tests\Entity;

use PHPUnit\Framework\TestCase;
use PouleR\SpotifyChartsAPI\Entity\Highlight;

/**
 * Class HighlightTest
 */
class HighlightTest extends TestCase
{
    private Highlight $highlight;

    /**
     * @return void
     */
    public function setUp(): void
    {
        $this->highlight = new Highlight();
        $this->highlight->setBackgroundColor('#444');
        $this->highlight->setDisplayImageUri('image.uri');
        $this->highlight->setChartLabel('label');
        $this->highlight->setChartUri('chart.uri');
        $this->highlight->setText('text');
        $this->highlight->setType('type');
    }

    /**
     * @return void
     */
    public function testBackgroundColor(): void
    {
        self::assertEquals('#444', $this->highlight->getBackgroundColor());
    }

    /**
     * @return void
     */
    public function testDisplayImageUri(): void
    {
        self::assertEquals('image.uri', $this->highlight->getDisplayImageUri());
    }

    /**
     * @return void
     */
    public function testChartLabel(): void
    {
        self::assertEquals('label', $this->highlight->getChartLabel());
    }

    /**
     * @return void
     */
    public function testChartUri(): void
    {
        self::assertEquals('chart.uri', $this->highlight->getChartUri());
    }

    /**
     * @return void
     */
    public function testText(): void
    {
        self::assertEquals('text', $this->highlight->getText());
    }

    /**
     * @return void
     */
    public function testType(): void
    {
        self::assertEquals('type', $this->highlight->getType());
    }
}
