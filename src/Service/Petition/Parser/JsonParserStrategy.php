<?php
declare(strict_types=1);

/**
 * Created by PhpStorm.
 * User: sash
 * Date: 27.06.19
 * Time: 2:14
 */

namespace App\Service\Petition\Parser;

use App\Entity\Feed;
use JMS\Serializer\SerializerInterface;
use Symfony\Component\DependencyInjection\ContainerAwareTrait;

/**
 * Class JsonParserStrategy
 * @package App\Service\Petition\Parser
 */
class JsonParserStrategy implements IParserStrategy
{
    use ContainerAwareTrait;

    /** @var SerializerInterface  */
    private $serializer;

    /**
     * ParserService constructor.
     * @param SerializerInterface $serializer
     */
    public function __construct(SerializerInterface $serializer)
    {
        $this->serializer = $serializer;
    }

    /**
     * @param string $inputData
     * @return Feed|null
     */
    public function parse(string $inputData): Feed
    {
        return $this->serializer->deserialize(
            $inputData, Feed::class,
            'json'
        );
    }
}