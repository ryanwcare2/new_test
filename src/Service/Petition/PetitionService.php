<?php
declare(strict_types=1);

namespace App\Service\Petition;

use App\Entity\Petition;
use App\Entity\PetitionOutputFormat;
use App\Service\Petition\Fetcher\PetitionFetcherService;
use App\Service\Petition\Fetcher\PetitionFetchOptions;
use App\Service\Petition\Format\PetitionOutputFormatter;
use App\Service\Petition\Parser\JsonParserStrategy;
use App\Service\Petition\Parser\ParserService;
use App\Service\Utils\OutputFormatter\CSVFormatter;
use JMS\Serializer\SerializerInterface;
use Symfony\Component\HttpFoundation\StreamedResponse;

/**
 * Created by PhpStorm.
 * User: sash
 * Date: 27.06.19
 * Time: 2:17
 */

/**
 * Class PetitionService
 * @package App\Service\Petition
 */
class PetitionService
{
    private $parserService;
    private $petitionFetcherService;

    /** @var SerializerInterface  */
    private $serializer;

    private $csvFormatter;

    private $petitionOutputFormatter;

    /**
     * PetitionService constructor.
     * @param SerializerInterface $serializer
     * @param PetitionFetcherService $petitionFetcherService
     * @param ParserService $parserService
     * @param CSVFormatter $csvFormatter
     * @param PetitionOutputFormatter $petitionOutputFormatter
     */
    public function __construct(
        SerializerInterface $serializer,
        PetitionFetcherService $petitionFetcherService,
        ParserService $parserService,
        CSVFormatter $csvFormatter,
        PetitionOutputFormatter $petitionOutputFormatter
    ) {
        $this->serializer = $serializer;
        $this->petitionFetcherService = $petitionFetcherService;
        $this->parserService = $parserService;
        $this->csvFormatter = $csvFormatter;
        $this->petitionOutputFormatter = $petitionOutputFormatter;
    }

    /**
     * @param string $petitionId
     * @return \App\Entity\Petition[]
     * @throws \Exception
     */
    public function getPetitions($petitionId) : array
    {
        $options = new PetitionFetchOptions($petitionId);

        $response = $this->petitionFetcherService->fetch($options);
        return $this->parserService->parse($response, new JsonParserStrategy($this->serializer));
    }

    /**
     * @param Petition[] $petitions
     * @param PetitionOutputFormat $petitionFormat
     * @return StreamedResponse
     */
    public function getCSVDocument(array $petitions, PetitionOutputFormat $petitionFormat): StreamedResponse
    {
        return $this->csvFormatter->write(
            PetitionOutputFormatter::getHeaders($petitionFormat),
            $this->petitionOutputFormatter->format($petitions, $petitionFormat)
        );
    }
}