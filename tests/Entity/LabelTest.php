<?php declare(strict_types=1);

namespace PouleR\SpotifyChartsAPI\Tests;

use PHPUnit\Framework\TestCase;
use PouleR\SpotifyChartsAPI\Entity\Label;

/**
 * Class LabelTest
 */
class LabelTest extends TestCase
{
    /**
     * @return void
     */
    public function testName(): void
    {
        $label = new Label();
        $label->setName('LabelTest');
        self::assertEquals('LabelTest', $label->getName());
    }
}
