<?php

use Opay\MerchantTransfer;
use Opay\Payload\BanksRequest;
use Opay\Result\Response;

require_once('../Initialize.php');
require_once('../Config.php');

class Miscellaneous extends Initialize
{
    private $merchantTransfer;

    public function __construct()
    {
        parent::__construct(new Config());
        $this->merchantTransfer = new MerchantTransfer($this->config->getEndpointBaseUrl(), $this->config->getPubKey(), $this->config->getPrvKey(), $this->config->getMerchantId());
    }

    public function getBanks(): Response
    {
        $getBanksRequest = new BanksRequest("NG");
        $this->merchantTransfer->getBanks($getBanksRequest);
        return $this->merchantTransfer->getBanksApiResult();
    }

    public function getCountries(): Response
    {
        $this->merchantTransfer->getCountries();
        return $this->merchantTransfer->getCountriesApiResult();
    }

}

$obj = new Miscellaneous();

$banks = $obj->getBanks();
dump($banks);

$countries = $obj->getCountries();
dump($countries);