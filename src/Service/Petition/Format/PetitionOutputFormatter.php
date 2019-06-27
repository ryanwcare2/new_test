<?php
declare(strict_types=1);

/**
 * Created by PhpStorm.
 * User: sash
 * Date: 27.06.19
 * Time: 12:22
 */

namespace App\Service\Petition\Format;

use App\Entity\Petition;
use App\Entity\PetitionOutputFormat;

class PetitionOutputFormatter
{
    const HEADER_TITLE = 'Title';
    const HEADER_LINK = 'Link';
    const HEADER_DESCRIPTION = 'Description';
    const HEADER_PETITIONID = 'PetitionID';
    const HEADER_SIGNATURECOUNT = 'SignatureCount';
    const HEADER_SUMMARY = 'Summary';

    public static function getHeaders(PetitionOutputFormat $format): array
    {
        $headers = [];

        if ($format->getIsTitlePresent()) {
            $headers[] = self::HEADER_TITLE;
        }

        if ($format->getIsLinkPresent()) {
            $headers[] = self::HEADER_LINK;
        }

        if ($format->getIsDescriptionPresent()) {
            $headers[] = self::HEADER_DESCRIPTION;
        }

        if ($format->getIsPetitionIDPresent()) {
            $headers[] = self::HEADER_PETITIONID;
        }

        if ($format->getIsSignatureCountPresent()) {
            $headers[] = self::HEADER_SIGNATURECOUNT;
        }

        if ($format->getIsSummaryPresent()) {
            $headers[] = self::HEADER_SUMMARY;
        }

        return $headers;
    }

    /**
     * @param Petition[] $petitions
     * @param PetitionOutputFormat $format
     * @return array
     */
    public function format(array $petitions, PetitionOutputFormat $format): array
    {
        $output = [];

        /** @var Petition $petition */
        foreach ($petitions as $petition) {
            $output[] = $this->prepareRow($petition, $format);
        }
        return $output;
    }

    /**
     * @param Petition $petition
     * @param PetitionOutputFormat $format
     * @return array
     */
    private function prepareRow(Petition $petition, PetitionOutputFormat $format): array
    {
        $row = [];

        if ($format->getIsTitlePresent()) {
            $row[] = $petition->getTitle();
        }

        if ($format->getIsLinkPresent()) {
            $row[] = $petition->getLink();
        }

        if ($format->getIsDescriptionPresent()) {
            $row[] = $petition->getDescription();
        }

        if ($format->getIsPetitionIDPresent()) {
            $row[] = $petition->getPetitionID();
        }

        if ($format->getIsSignatureCountPresent()) {
            $row[] = $petition->getSignatureCount();
        }

        if ($format->getIsSummaryPresent()) {
            $row[] = $petition->getSummary();
        }

        return $row;
    }
}