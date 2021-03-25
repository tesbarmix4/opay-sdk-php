<?php


use Opay\MerchantBalances;
use Opay\Payload\BalancesRequest;
use Opay\Result\Response;

require_once('../Initialize.php');
require_once('../Config.php');


class Balances extends Initialize
{
    private $balance;

    public function __construct()
    {
        parent::__construct(new Config());
        $this->balance = new MerchantBalances($this->config->getEndpointBaseUrl(), $this->config->getPubKey(), $this->config->getPrvKey(), $this->config->getMerchantId());
    }

    public function getBalances(): Response
    {
        $this->balance->setBalancesData(new BalancesRequest());
        return $this->balance->balances();
    }
}

$obj = new Balances();
$response = $obj->getBalances();
dump($response);