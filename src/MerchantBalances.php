<?php

namespace Opay;

use GuzzleHttp\RequestOptions;
use Opay\Result\BalancesResponse;
use Opay\Result\Response;

class MerchantBalances extends Merchant
{
    private $balancesData;

    /**
     * MerchantBalances constructor.
     * @param string $environmentBaseUrl
     * @param string $pbKey
     * @param string $pvKey
     * @param string $merchantId
     * @param array|null $proxyAddress
     */
    public function __construct(string $environmentBaseUrl, string $pbKey, string $pvKey, string $merchantId, ?array $proxyAddress = null)
    {
        parent::__construct($environmentBaseUrl, $pbKey, $pvKey, $merchantId, $proxyAddress);
    }

    public function balances(): Response
    {

        $response = $this->networkClient->post("/api/v3/balances", $this->buildRequestOptions([
            RequestOptions::JSON => '{}',
            RequestOptions::HEADERS => [
                'Authorization' => 'Bearer ' . $this->publicKey,
                'MerchantId' => $this->merchantId
            ]
        ]));
        return BalancesResponse::cast(new BalancesResponse(), json_decode($response->getBody()->getContents(), false));
    }

    /**
     * @param mixed $balancesData
     */
    public function setBalancesData($balancesData): void
    {
        $this->balancesData = $balancesData;
    }



    /**
     * @return mixed
     */
    public function getBalancesData()
    {
        return $this->balancesData;
    }


}