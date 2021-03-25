<?php

include_once 'ConfigInterface.php';

class Config implements ConfigInterface
{
    private $hostBaseUrl = "http://localhost/opay-sdk-php/http_example";
    private $endpointBaseUrl = 'http://sandbox-cashierapi.opayweb.com';
    private $pubKey = 'OPAYPUB16058646510220.420473668870203';
    private $prvKey = 'OPAYPRV16058646510230.34019403186305675';
    private $merchantId = '256620112018025';

    /**
     * @return string
     */
    public function getHostBaseUrl(): string
    {
        return $this->hostBaseUrl;
    }

    /**
     * @param string $hostBaseUrl
     */
    public function setHostBaseUrl(string $hostBaseUrl): void
    {
        $this->hostBaseUrl = $hostBaseUrl;
    }

    /**
     * @return string
     */
    public function getEndpointBaseUrl(): string
    {
        return $this->endpointBaseUrl;
    }

    /**
     * @param string $endpointBaseUrl
     */
    public function setEndpointBaseUrl(string $endpointBaseUrl): void
    {
        $this->endpointBaseUrl = $endpointBaseUrl;
    }

    /**
     * @return string
     */
    public function getPubKey(): string
    {
        return $this->pubKey;
    }

    /**
     * @param string $pubKey
     */
    public function setPubKey(string $pubKey): void
    {
        $this->pubKey = $pubKey;
    }

    /**
     * @return string
     */
    public function getPrvKey(): string
    {
        return $this->prvKey;
    }

    /**
     * @param string $prvKey
     */
    public function setPrvKey(string $prvKey): void
    {
        $this->prvKey = $prvKey;
    }

    /**
     * @return string
     */
    public function getMerchantId(): string
    {
        return $this->merchantId;
    }

    /**
     * @param string $merchantId
     */
    public function setMerchantId(string $merchantId): void
    {
        $this->merchantId = $merchantId;
    }


}