<?php


namespace Opay;


use GuzzleHttp\RequestOptions;
use Opay\Result\BillsBettingProvidersResponse;
use Opay\Result\BillsBulkBillsResponse;
use Opay\Result\BillsBulkStatusResponse;
use Opay\Result\BillsValidateResponse;
use Opay\Result\Response;

class MerchantBills extends Merchant
{
    private $bettingProvidersData;
    private $validateData;
    private $bulkBillsData;
    private $bulkStatusData;

    /**
     * @return mixed
     */
    public function getBettingProvidersData()
    {
        return $this->bettingProvidersData;
    }

    /**
     * @param mixed $bettingProvidersData
     */
    public function setBettingProvidersData($bettingProvidersData): void
    {
        $this->bettingProvidersData = $bettingProvidersData;
    }

    /**
     * @return mixed
     */
    public function getValidateData()
    {
        return $this->validateData;
    }

    /**
     * @param mixed $validateData
     */
    public function setValidateData($validateData): void
    {
        $this->validateData = $validateData;
    }

    /**
     * @return mixed
     */
    public function getBulkBillsData()
    {
        return $this->bulkBillsData;
    }

    /**
     * @param mixed $bulkBillsData
     */
    public function setBulkBillsData($bulkBillsData): void
    {
        $this->bulkBillsData = $bulkBillsData;
    }

    /**
     * @return mixed
     */
    public function getBulkStatusData()
    {
        return $this->bulkStatusData;
    }

    /**
     * @param mixed $bulkStatusData
     */
    public function setBulkStatusData($bulkStatusData): void
    {
        $this->bulkStatusData = $bulkStatusData;
    }

    public function bettingProviders(): Response
    {
        $response = $this->networkClient->post("/api/v3/bills/betting-providers", $this->buildRequestOptions([
            RequestOptions::JSON => $this->bettingProvidersData,
            RequestOptions::HEADERS => [
                'Authorization' => 'Bearer ' . $this->publicKey,
                'MerchantId' => $this->merchantId
            ]
        ]));
        return BillsBettingProvidersResponse::cast(new BillsBettingProvidersResponse, json_decode($response->getBody()->getContents(), false));
    }

    public function validate(): Response
    {
        $response = $this->networkClient->post("/api/v3/bills/validate", $this->buildRequestOptions([
            RequestOptions::JSON => $this->validateData,
            RequestOptions::HEADERS => [
                'Authorization' => 'Bearer ' . $this->publicKey,
                'MerchantId' => $this->merchantId
            ]
        ]));
        return BillsValidateResponse::cast(new BillsValidateResponse, json_decode($response->getBody()->getContents(), false));
    }

    public function bulkBills(): Response
    {
        $_signature = $this->signature(json_encode($this->bulkBillsData), $this->privateKey);
        $response = $this->networkClient->post("/api/v3/bills/bulk-bills", $this->buildRequestOptions([
            RequestOptions::JSON => $this->bulkBillsData,
            RequestOptions::HEADERS => [
                'Authorization' => 'Bearer ' . $_signature,
                'MerchantId' => $this->merchantId
            ]
        ]));
        return BillsBulkBillsResponse::cast(new BillsBulkBillsResponse, json_decode($response->getBody()->getContents(), false));
    }

    public function bulkStatus(): Response
    {
        $response = $this->networkClient->post("/api/v3/bills/bulk-status", $this->buildRequestOptions([
            RequestOptions::JSON => $this->bulkStatusData,
            RequestOptions::HEADERS => [
                'Authorization' => 'Bearer ' . $this->publicKey,
                'MerchantId' => $this->merchantId
            ]
        ]));
        return BillsBulkStatusResponse::cast(new BillsBulkStatusResponse, json_decode($response->getBody()->getContents(), false));
    }

}