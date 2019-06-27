<?php
declare(strict_types=1);

/**
 * Created by PhpStorm.
 * User: sash
 * Date: 26.06.19
 * Time: 16:10
 */

namespace App\Service\Petition\Parser;

use App\Entity\Feed;

/**
 * Interface IParserStrategy
 * @package App\Service\Petition\Parser
 */
interface IParserStrategy
{
    /**
     * @param string $inputData
     * @return Feed
     */
    function parse(string $inputData): Feed;
}