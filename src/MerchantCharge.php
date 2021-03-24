<?php

namespace Opay;

use GuzzleHttp\RequestOptions;
use Opay\Result\ChargeInitializeResponse;
use Opay\Result\ChargeStatusResponse;
use Opay\Result\Response;

class MerchantCharge extends Merchant
{

    private $chargeInitializeData;
    private $chargeStatusData;


    /**
     * MerchantCharge constructor.
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


    public function initialize(): Response
    {
        $response = $this->networkClient->post("/api/v3/charge/initialize", $this->buildRequestOptions([
            RequestOptions::JSON => $this->chargeInitializeData,
            RequestOptions::HEADERS => [
                'Authorization' => 'Bearer ' . $this->publicKey,
                'MerchantId' => $this->merchantId
            ]
        ]));
        return ChargeInitializeResponse::cast(new ChargeInitializeResponse, json_decode($response->getBody()->getContents(), false));
    }

    public function status(): Response
    {
        $_signature = hash_hmac('sha512', json_encode($this->chargeStatusData), $this->privateKey);
        $response = $this->networkClient->post("/api/v3/charge/status", $this->buildRequestOptions([
            RequestOptions::JSON => $this->chargeStatusData,
            RequestOptions::HEADERS => [
                'Authorization' => 'Bearer ' . $_signature,
                'MerchantId' => $this->merchantId
            ]
        ]));
        return ChargeStatusResponse::cast(new ChargeStatusResponse, json_decode($response->getBody()->getContents(), false));
    }

    /**
     * @return mixed
     */
    public function getChargeInitializeData()
    {
        return $this->chargeInitializeData;
    }

    /**
     * @param mixed $chargeInitializeData
     */
    public function setChargeInitializeData($chargeInitializeData): void
    {
        $this->chargeInitializeData = $chargeInitializeData;
    }

    /**
     * @return mixed
     */
    public function getChargeStatusData()
    {
        return $this->chargeStatusData;
    }

    /**
     * @param mixed $chargeStatusData
     */
    public function setChargeStatusData($chargeStatusData): void
    {
        $this->chargeStatusData = $chargeStatusData;
    }


}