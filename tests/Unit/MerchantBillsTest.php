<?php

use Opay\MerchantBills;
use Opay\Payload\BillsBettingProvidersRequest;
use Opay\Payload\BillsBulkStatusRequest;
use Opay\Payload\BulkStatusData;
use PHPUnit\Framework\TestCase;

class MerchantBillsTest extends TestCase
{
    protected $merchantBills;

    protected function setUp(): void
    {
        parent::setUp();
        $this->merchantBills = new MerchantBills(
            "http://xxxxxxxxxxxxxxx.com",
            "xxxxxxxxxxxxxxxx",
            "xxxxxxxxxxxxx",
            "XXXXXXXXXXXXX"
        );

    }

    public final function testBettingProviders(): void
    {
        $request = new BillsBettingProvidersRequest();
        $this->merchantBills->setBettingProvidersData($request);
        $response = $this->merchantBills->bettingProviders();
        $this->assertEquals(json_encode($request, JSON_UNESCAPED_SLASHES), json_encode($this->merchantBills->getBettingProvidersData(), JSON_UNESCAPED_SLASHES));
        var_dump($response);
    }


    public final function testBulkStatus(): void
    {
        $request = new BillsBulkStatusRequest();
        $request->setServiceType("betting");
        $request->setBulkStatusRequest([]);

        $bulkData = new BulkStatusData();
        $bulkData->setOrderNo("20019212912901281821983");
        $bulkData->setReference("test_20191123132233");

        $request->setBulkStatusRequest([$bulkData->toArray()]);

        $this->merchantBills->setBulkStatusData($request);
        $response = $this->merchantBills->bulkStatus();
        $this->assertEquals(json_encode($request, JSON_UNESCAPED_SLASHES), json_encode($this->merchantBills->getBulkStatusData(), JSON_UNESCAPED_SLASHES));
        var_dump($response);
    }
}