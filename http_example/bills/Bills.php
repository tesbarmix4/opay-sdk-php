<?php

use Opay\MerchantBills;
use Opay\Payload\BillsBettingProvidersRequest;
use Opay\Payload\BillsBulkBillsRequest;
use Opay\Payload\BillsBulkStatusRequest;
use Opay\Payload\BillsValidateRequest;
use Opay\Payload\BulkBillsData;
use Opay\Payload\BulkStatusData;
use Opay\Result\Response;

require_once('../Initialize.php');
require_once('../Config.php');

class Bills extends Initialize
{
    private $merchantBills;
    private $provider;
    private $type;
    private $userId;
    private $references;

    /**
     * @return mixed
     */
    public function getReferences()
    {
        return $this->references;
    }

    /**
     * @param mixed $references
     */
    public function setReferences($references): void
    {
        $this->references = $references;
    }


    /**
     * @return mixed
     */
    public function getProvider()
    {
        return $this->provider;
    }

    /**
     * @param mixed $provider
     */
    public function setProvider($provider): void
    {
        $this->provider = $provider;
    }

    /**
     * @return mixed
     */
    public function getUserId()
    {
        return $this->userId;
    }

    /**
     * @param mixed $userId
     */
    public function setUserId($userId): void
    {
        $this->userId = $userId;
    }

    /**
     * @return mixed
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * @param mixed $type
     */
    public function setType($type): void
    {
        $this->type = $type;
    }

    public function __construct()
    {
        parent::__construct(new Config());
        $this->merchantBills = new MerchantBills($this->config->getEndpointBaseUrl(), $this->config->getPubKey(), $this->config->getPrvKey(), $this->config->getMerchantId());
    }


    public function bettingProviders(): Response
    {
        $request = new BillsBettingProvidersRequest();
        $this->merchantBills->setBettingProvidersData($request);
        return $this->merchantBills->bettingProviders();
    }

    public function validate(): Response
    {
        $request = new BillsValidateRequest();
        $request->setProvider($this->getProvider());
        $request->setCustomerId($this->getUserId());
        $request->setServiceType($this->type);

        $this->merchantBills->setValidateData($request);
        return $this->merchantBills->validate();
    }

    public function bulkBills(): Response
    {
        $request = new BillsBulkBillsRequest();
        $request->setCallBackUrl("callBackUrl");
        $request->setServiceType($this->type);


        $ref = $this->getGenerateReference();
        $this->references[] = $ref;
        $bulkData_1 = new BulkBillsData();
        $bulkData_1->setAmount("100");
        $bulkData_1->setCountry("NG");
        $bulkData_1->setCurrency("NGN");
        $bulkData_1->setCustomerId($this->getUserId());
        $bulkData_1->setProvider($this->getProvider());
        $bulkData_1->setReference($ref);

        $ref = $this->getGenerateReference();
        $this->references[] = $ref;
        $bulkData_2 = new BulkBillsData();
        $bulkData_2->setAmount("100");
        $bulkData_2->setCountry("NG");
        $bulkData_2->setCurrency("NGN");
        $bulkData_2->setCustomerId($this->getUserId());
        $bulkData_2->setProvider($this->getProvider());
        $bulkData_2->setReference($this->getGenerateReference());

        $request->setBulkData(
            [
                $bulkData_1->toArray(),
                $bulkData_2->toArray(),
            ]
        );
        $this->merchantBills->setBulkBillsData($request);
        return $this->merchantBills->bulkBills();
    }

    public function bulkStatus(): Response
    {
        $request = new BillsBulkStatusRequest();
        $request->setServiceType($this->getType());

        $data = [];
        foreach ($this->getReferences() as $val) {
            $bulkData = new BulkStatusData();
            $bulkData->setReference($val);
            $data[] = $bulkData->toArray();
        }
        $request->setBulkStatusRequest($data);

        $this->merchantBills->setBulkStatusData($request);
        return $this->merchantBills->bulkStatus();
    }
}

$obj = new Bills();
$obj->setUserId('256620061014002');

$response = $obj->bettingProviders();
dump($response);
$list = $response->getData();


$provider = $list[2]; //You can choose any one
$name = $provider->getProvider();


// ServiceType for topup, could be betting, airtime
$obj->setProvider($name);
$obj->setType('betting');

$validate = $obj->validate();
dump($validate);

$bulk = $obj->bulkBills();
dump($bulk);

$status = $obj->bulkStatus();
dump($bulk);


