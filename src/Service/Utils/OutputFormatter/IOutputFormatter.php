<?php
declare(strict_types=1);

/**
 * Created by PhpStorm.
 * User: sash
 * Date: 27.06.19
 * Time: 11:35
 */

namespace App\Service\Utils\OutputFormatter;

use Symfony\Component\HttpFoundation\StreamedResponse;

/**
 * Interface IOutputFormatter
 * @package App\Service\Utils\OutputFormatter
 */
interface IOutputFormatter
{
    /**
     * @param array $headers
     * @param array $inputData
     * @return StreamedResponse
     */
    public function write(array $headers, array $inputData): StreamedResponse;
}