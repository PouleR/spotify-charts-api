<?php declare(strict_types=1);

namespace PouleR\SpotifyChartsAPI\Entity;

use Symfony\Component\Serializer\Exception\ExceptionInterface;
use Symfony\Component\Serializer\NameConverter\CamelCaseToSnakeCaseNameConverter;
use Symfony\Component\Serializer\Normalizer\ObjectNormalizer;

/**
 * Class DisplayChart
 */
class DisplayChart
{
    private ?\DateTime $date = null;
    private ChartMetadata $chartMetadata;
    private string $description = '';

    /**
     *
     */
    public function __construct()
    {
        $this->chartMetadata = new ChartMetadata();
    }

    /**
     * @return \DateTime|null
     */
    public function getDate(): ?\DateTime
    {
        return $this->date;
    }

    /**
     * @param string $date
     *
     * @return void
     *
     * @throws \Exception
     */
    public function setDate(string $date): void
    {
        $this->date = new \DateTime($date);
    }

    /**
     * @return ChartMetadata
     */
    public function getChartMetadata(): ChartMetadata
    {
        return $this->chartMetadata;
    }

    /**
     * @param array $chartMetadata
     *
     * @return void

     * @throws ExceptionInterface
     */
    public function setChartMetadata(array $chartMetadata): void
    {
        $normalizer = new ObjectNormalizer(null, new CamelCaseToSnakeCaseNameConverter());
        $this->chartMetadata = $normalizer->denormalize($chartMetadata, ChartMetadata::class);
    }

    /**
     * @return string
     */
    public function getDescription(): string
    {
        return $this->description;
    }

    /**
     * @param string $description
     */
    public function setDescription(string $description): void
    {
        $this->description = $description;
    }
}
