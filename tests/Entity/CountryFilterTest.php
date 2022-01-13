<?php declare(strict_types=1);

namespace PouleR\SpotifyChartsAPI\Tests\Entity;

use PHPUnit\Framework\TestCase;
use PouleR\SpotifyChartsAPI\Entity\CountryFilter;

/**
 * Class CountryFilterTest
 */
class CountryFilterTest extends TestCase
{
    private CountryFilter $countryFilter;

    /**
     * @return void
     */
    public function setUp(): void
    {
        $this->countryFilter = new CountryFilter();
        $this->countryFilter->setCode('code');
        $this->countryFilter->setReadableName('filter');
    }

    /**
     * @return void
     */
    public function testCode(): void
    {
        self::assertEquals('code', $this->countryFilter->getCode());
    }

    /**
     * @return void
     */
    public function testReadableName(): void
    {
        self::assertEquals('filter', $this->countryFilter->getReadableName());
    }
}
