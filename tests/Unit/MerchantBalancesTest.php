<?php

use Opay\MerchantBalances;
use Opay\Payload\BalancesRequest;
use PHPUnit\Framework\TestCase;

class MerchantBalancesTest extends TestCase
{
    protected $merchantBalances;

    protected function setUp(): void
    {
        parent::setUp();
        $this->merchantBalances = new MerchantBalances(
            "http://xxxxxxxxxxxxxxx.com",
            "xxxxxxxxxxxxxxxx",
            "xxxxxxxxxxxxx",
            "XXXXXXXXXXXXX"
        );

    }

    public final function testBalancesPayload(): void
    {
        $_balancesRequest = new BalancesRequest();
        $this->merchantBalances->setBalancesData($_balancesRequest);
        $response = $this->merchantBalances->balances();
        $this->assertEquals(json_encode($_balancesRequest), json_encode($this->merchantBalances->getBalancesData()));


//        $response = $this->merchantBalances->getBalances();
//        var_dump($response->getData());
    }
}