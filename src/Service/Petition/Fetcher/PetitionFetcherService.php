<?php
declare(strict_types=1);

/**
 * Created by PhpStorm.
 * User: sash
 * Date: 26.06.19
 * Time: 16:19
 */

namespace App\Service\Petition\Fetcher;

use App\Exceptions\InternalException;
use App\Service\Petition\Fetcher\Exceptions\ApiResponseException;
use Symfony\Component\DependencyInjection\ParameterBag\ParameterBagInterface;
use Symfony\Component\HttpFoundation\Response;

/**
 * Class PetitionFetcherService
 * @package App\Service\Petition\Fetcher
 */
class PetitionFetcherService extends AbstractFetcher
{
    /**
     * PetitionFetcherService constructor.
     * @param ParameterBagInterface $parameterBag
     */
    public function __construct(ParameterBagInterface $parameterBag)
    {
        parent::__construct($parameterBag);
    }

    /**
     * @param IFetchOptions $fetchOptions
     * @return string
     * @throws \Throwable
     */
    public function fetch(IFetchOptions $fetchOptions): string
    {
        if (!$fetchOptions instanceof PetitionFetchOptions) {
            throw new InternalException('Wrong type of class in $feedOptions');
        }

        $response = $this->client->request(
            'GET', sprintf('/servlets/petitions/feed.php?type=%s&feedID=%s',
                $fetchOptions->getType(),
                $fetchOptions->getFeedId())
        );

        if($response->getStatusCode() != Response::HTTP_OK) {
            throw new ApiResponseException("API error");
        }

        return $response->getBody()->getContents();
    }
}