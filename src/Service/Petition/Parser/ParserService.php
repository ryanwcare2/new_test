<?php
declare(strict_types=1);

namespace App\Service\Petition\Parser;
use App\Entity\Feed;
use App\Entity\Petition;

/**
 * Created by PhpStorm.
 * User: sash
 * Date: 26.06.19
 * Time: 16:07
 */

/**
 * Class ParserService
 * @package App\Service\Petition\Parser
 */
class ParserService
{
    /**
     * @param string $inputData
     * @param IParserStrategy $strategy
     * @return Petition[]
     * @throws \Exception
     */
    public function parse(string $inputData, IParserStrategy $strategy): array
    {
        /** @var Feed $feed */
        $feed = $strategy->parse($inputData);

        if ($feed === null) {
            throw new \Exception("Can not parse data");
        }

        return $feed->getPetitions();
    }
}