<?php

use Opay\MerchantCharge;
use Opay\Payload\ChargeInitializeRequest;
use Opay\Payload\ChargeStatusRequest;
use Opay\Result\Response;

require_once('../Initialize.php');
require_once('../Config.php');

class Charge extends Initialize
{
    private $charge;

    public function __construct()
    {
        parent::__construct(new Config());
        $this->charge = new MerchantCharge($this->config->getEndpointBaseUrl(), $this->config->getPubKey(), $this->config->getPrvKey(), $this->config->getMerchantId());
    }

    public function init(): Response
    {
        $request = new ChargeInitializeRequest();
        $request->setReference($this->getReference());
        $request->setAmount("100");
        $request->setCurrency("NGN");
        $request->setUserRequestIp($this->getUserIP());
        $request->setCallbackUrl($this->config->getHostBaseUrl() . '/xxx');
        $request->setReturnUrl($this->config->getHostBaseUrl() . '/xxx');
        $request->setExpireAt("100");
        $request->setChargerType("USER");
        $request->setChargerId("156619101900000045");
        $this->charge->setChargeInitializeData($request);
        $response = $this->charge->initialize();
        if ($response->getCode() == '00000') {
            $this->setOrderNumber($response->getData()->getOrderNo());
        }
        return $response;
    }

    public function getStatus(): Response
    {
        $request = new ChargeStatusRequest();
        $request->setReference($this->getReference()); //orderNumber or reference
        $request->setOrderNo($this->getOrderNumber());
        $this->charge->setChargeStatusData($request);
        return $this->charge->status();
    }

}

$obj = new Charge();
$response = $obj->init();
dump($response);

$status = $obj->getStatus();
dump($status);