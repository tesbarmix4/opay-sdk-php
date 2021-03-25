<?php

use Opay\MerchantTransfer;
use Opay\Payload\ValidateOpayMerchantRequest;
use Opay\Result\Response;

require_once('../../Initialize.php');
require_once('../../Config.php');

class InfoMerchant extends Initialize
{

    private $merchantTransfer;

    public function __construct()
    {
        parent::__construct(new Config());
        $this->merchantTransfer = new MerchantTransfer($this->config->getEndpointBaseUrl(), $this->config->getPubKey(), $this->config->getPrvKey(), $this->config->getMerchantId());
    }

    public function getMerchant(): Response
    {
        $validateOpayMerchantRequest = new ValidateOpayMerchantRequest('segsalerty@gmail.com');
        $this->merchantTransfer->validateOpayMerchant($validateOpayMerchantRequest);
        return $this->merchantTransfer->validateOpayMerchantApiResult();
    }
}

$obj = new InfoMerchant();
$response = $obj->getMerchant();
dump($response);