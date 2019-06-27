<?php
declare(strict_types=1);

/**
 * Created by PhpStorm.
 * User: sash
 * Date: 26.06.19
 * Time: 17:21
 */

namespace App\Service\Petition\Fetcher;

/**
 * Class PetitionFetchOptions
 * @package App\Service\Petition\Fetcher
 */
class PetitionFetchOptions implements IFetchOptions
{
    private $type;
    private $feedId;

    public function __construct(int $feedId, string $type="publisher")
    {
        $this->setFeedId($feedId);
        $this->setType($type);
    }

    public function getType(): string
    {
        return $this->type;
    }

    public function setType(string $type)
    {
        $this->type = $type;
    }

    public function getFeedId(): int
    {
        return $this->feedId;
    }

    public function setFeedId(int $petitionId)
    {
        $this->feedId = $petitionId;
    }
}