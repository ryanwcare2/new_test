<?php
declare(strict_types=1);

namespace App\Service\Utils\OutputFormatter;

use Symfony\Component\HttpFoundation\StreamedResponse;

/**
 * Created by PhpStorm.
 * User: sash
 * Date: 27.06.19
 * Time: 5:08
 */
class CSVFormatter implements IOutputFormatter
{
    const CSV_DELIMETER = ';';

    /**
     * @param array $headers
     * @param array $inputData
     * @return StreamedResponse
     */
    public function write(array $headers, array $inputData): StreamedResponse
    {
        $response = new StreamedResponse();
        $response->setCallback(function() use ($headers, $inputData) {
            $handle = fopen('php://output', 'w+');

            // Write header to the CSV
            fputcsv($handle, $headers, self::CSV_DELIMETER);

            // Write data
            foreach ($inputData as $row) {
                fputcsv($handle, $row, self::CSV_DELIMETER);
            }

            fclose($handle);
        });

        return $response;
    }
}