<?php


namespace Opay;


use GuzzleHttp\Client;
use GuzzleHttp\RequestOptions;
use Opay\Tool\Helper;

class Merchant
{
    use Helper;

    private $proxyAddress;
    protected $networkClient;

    protected $merchantId;
    protected $publicKey;
    protected $privateKey;

    public function __construct(string $environmentBaseUrl, string $pbKey, string $pvKey,
                                string $merchantId, ?array $proxyAddress = null)
    {
        $this->merchantId = $merchantId;
        $this->publicKey = $pbKey;
        $this->privateKey = $pvKey;
        $this->networkClient = new Client([
            'base_uri' => $environmentBaseUrl
        ]);
        $this->proxyAddress = $proxyAddress;
    }

    protected function buildRequestOptions(array $options): array
    {
        if ($this->proxyAddress) {
            $options[RequestOptions::PROXY] = $this->proxyAddress;
        }
        return $options;
    }

}