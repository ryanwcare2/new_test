<?php
declare(strict_types=1);

/**
 * Created by PhpStorm.
 * User: sash
 * Date: 26.06.19
 * Time: 16:33
 */

namespace App\Service\Petition\Fetcher;

use GuzzleHttp\Client;
use Symfony\Component\DependencyInjection\ParameterBag\ParameterBagInterface;

/**
 * Class AbstractFetcher
 * @package App\Service\Petition\Fetcher
 */
abstract class AbstractFetcher
{
    /** @var Client */
    protected $client;

    /**
     * AbstractFetcher constructor.
     * @param ParameterBagInterface $parameterBag
     */
    public function __construct(ParameterBagInterface $parameterBag)
    {
        $this->client = new Client(['base_uri' => $parameterBag->get('app.api_host')]);
    }

    /**
     * @param IFetchOptions $fetchOptions
     * @return string
     * @throws \Throwable
     */
    abstract public function fetch(IFetchOptions $fetchOptions): string;
}