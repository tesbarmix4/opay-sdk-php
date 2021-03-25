<?php

use Opay\MerchantTransfer;
use Opay\Payload\ValidateOpayUserRequest;
use Opay\Result\Response;

require_once('../../Initialize.php');
require_once('../../Config.php');

class InfoUser extends Initialize
{
    private $merchantTransfer;

    public function __construct()
    {
        parent::__construct(new Config());
        $this->merchantTransfer = new MerchantTransfer($this->config->getEndpointBaseUrl(), $this->config->getPubKey(), $this->config->getPrvKey(), $this->config->getMerchantId());
    }

    public function getUser(): Response
    {
        $validateOpayUserRequest = new ValidateOpayUserRequest('+2348036952110');
        $this->merchantTransfer->validateOpayUser($validateOpayUserRequest);
        return $this->merchantTransfer->validateOpayUserApiResult();
    }
}

$obj = new InfoUser();
$response = $obj->getUser();
dump($response);