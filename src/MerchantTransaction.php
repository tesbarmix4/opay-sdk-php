<?php


namespace Opay;


use GuzzleHttp\RequestOptions;
use Opay\Result\EgyptTransactionCreateResponse;
use Opay\Result\EgyptTransactionStatusResponse;
use Opay\Result\Response;
use Opay\Result\TransactionBankTransferInitializeResponse;
use Opay\Result\TransactionBankTransferStatusResponse;
use Opay\Result\TransactionInitializeResponse;
use Opay\Result\TransactionInputDobResponse;
use Opay\Result\TransactionInputOtpResponse;
use Opay\Result\TransactionInputPhoneResponse;
use Opay\Result\TransactionInputPinResponse;
use Opay\Result\TransactionStatusResponse;
use Opay\Result\TransactionUssdInitializeResponse;
use Opay\Result\TransactionUssdStatusResponse;

class MerchantTransaction extends Merchant
{
    private $initializeData;
    private $inputOtpData;
    private $inputPhoneData;
    private $inputPinData;
    private $inputDobData;
    private $statusData;
    private $bankTransferInitializeData;
    private $ussdInitializeData;
    private $bankTransferStatusData;
    private $ussdStatusData;
    private $egyptCreateData;
    private $egyptStatusData;


    /**
     * MerchantTransaction constructor.
     * @param string $environmentBaseUrl
     * @param string $pbKey
     * @param string $pvKey
     * @param string $merchantId
     * @param array|null $proxyAddress
     */
    public function __construct(string $environmentBaseUrl, string $pbKey, string $pvKey, string $merchantId, ?array $proxyAddress = null)
    {
        parent::__construct($environmentBaseUrl, $pbKey, $pvKey, $merchantId, $proxyAddress);
    }

    public function initialize(): Response
    {
        $response = $this->networkClient->post("/api/v3/transaction/initialize", $this->buildRequestOptions([
            RequestOptions::JSON => $this->initializeData,
            RequestOptions::HEADERS => [
                'Authorization' => 'Bearer ' . $this->publicKey,
                'MerchantId' => $this->merchantId
            ]
        ]));
        return TransactionInitializeResponse::cast(new TransactionInitializeResponse, json_decode($response->getBody()->getContents(), false));
    }

    public function inputOtp(): Response
    {
        $response = $this->networkClient->post("/api/v3/transaction/input-otp", $this->buildRequestOptions([
            RequestOptions::JSON => $this->inputOtpData,
            RequestOptions::HEADERS => [
                'Authorization' => 'Bearer ' . $this->publicKey,
                'MerchantId' => $this->merchantId
            ]
        ]));
        return TransactionInputOtpResponse::cast(new TransactionInputOtpResponse, json_decode($response->getBody()->getContents(), false));
    }

    public function inputPhone(): Response
    {
        $response = $this->networkClient->post("/api/v3/transaction/input-phone", $this->buildRequestOptions([
            RequestOptions::JSON => $this->inputPhoneData,
            RequestOptions::HEADERS => [
                'Authorization' => 'Bearer ' . $this->publicKey,
                'MerchantId' => $this->merchantId
            ]
        ]));
        return TransactionInputPhoneResponse::cast(new TransactionInputPhoneResponse, json_decode($response->getBody()->getContents(), false));
    }

    public function inputPin(): Response
    {
        $response = $this->networkClient->post("/api/v3/transaction/input-pin", $this->buildRequestOptions([
            RequestOptions::JSON => $this->inputPinData,
            RequestOptions::HEADERS => [
                'Authorization' => 'Bearer ' . $this->publicKey,
                'MerchantId' => $this->merchantId
            ]
        ]));
        return TransactionInputPinResponse::cast(new TransactionInputPinResponse, json_decode($response->getBody()->getContents(), false));
    }

    public function inputDob(): Response
    {
        $response = $this->networkClient->post("/api/v3/transaction/input-dob", $this->buildRequestOptions([
            RequestOptions::JSON => $this->inputDobData,
            RequestOptions::HEADERS => [
                'Authorization' => 'Bearer ' . $this->publicKey,
                'MerchantId' => $this->merchantId
            ]
        ]));
        return TransactionInputDobResponse::cast(new TransactionInputDobResponse, json_decode($response->getBody()->getContents(), false));
    }

    public function status(): Response
    {
        $_signature = $this->signature(json_encode($this->statusData), $this->privateKey);
        $response = $this->networkClient->post("/api/v3/transaction/status", $this->buildRequestOptions([
            RequestOptions::JSON => $this->statusData,
            RequestOptions::HEADERS => [
                'Authorization' => 'Bearer ' . $_signature,
                'MerchantId' => $this->merchantId
            ]
        ]));
        return TransactionStatusResponse::cast(new TransactionStatusResponse, json_decode($response->getBody()->getContents(), false));
    }

    public function bankTransferInitialize(): Response
    {
        $response = $this->networkClient->post("/api/v3/transaction/bankTransfer/initialize", $this->buildRequestOptions([
            RequestOptions::JSON => $this->bankTransferInitializeData,
            RequestOptions::HEADERS => [
                'Authorization' => 'Bearer ' . $this->publicKey,
                'MerchantId' => $this->merchantId
            ]
        ]));
        return TransactionBankTransferInitializeResponse::cast(new TransactionBankTransferInitializeResponse, json_decode($response->getBody()->getContents(), false));
    }

    public function bankTransferStatus(): Response
    {
        $_signature = $this->signature(json_encode($this->statusData), $this->privateKey);
        $response = $this->networkClient->post("/api/v3/transaction/bankTransfer/status", $this->buildRequestOptions([
            RequestOptions::JSON => $this->bankTransferStatusData,
            RequestOptions::HEADERS => [
                'Authorization' => 'Bearer ' . $_signature,
                'MerchantId' => $this->merchantId
            ]
        ]));
        return TransactionBankTransferStatusResponse::cast(new TransactionBankTransferStatusResponse, json_decode($response->getBody()->getContents(), false));
    }

    public function ussdInitialize(): Response
    {
        $response = $this->networkClient->post("/api/v3/transaction/ussd/initialize", $this->buildRequestOptions([
            RequestOptions::JSON => $this->ussdInitializeData,
            RequestOptions::HEADERS => [
                'Authorization' => 'Bearer ' . $this->publicKey,
                'MerchantId' => $this->merchantId
            ]
        ]));
        return TransactionUssdInitializeResponse::cast(new TransactionUssdInitializeResponse, json_decode($response->getBody()->getContents(), false));
    }

    public function ussdStatus(): Response
    {
        $_signature = $this->signature(json_encode($this->statusData), $this->privateKey);
        $response = $this->networkClient->post("/api/v3/transaction/ussd/status", $this->buildRequestOptions([
            RequestOptions::JSON => $this->ussdStatusData,
            RequestOptions::HEADERS => [
                'Authorization' => 'Bearer ' . $_signature,
                'MerchantId' => $this->merchantId
            ]
        ]));
        return TransactionUssdStatusResponse::cast(new TransactionUssdStatusResponse, json_decode($response->getBody()->getContents(), false));
    }

    public function egyptCreate()
    {
        $_signature = $this->signature(json_encode($this->egyptCreateData, JSON_UNESCAPED_SLASHES), $this->privateKey);
        $response = $this->networkClient->post("/api/v1/egypt/transaction/create", $this->buildRequestOptions([
            RequestOptions::JSON => $this->egyptCreateData,
            RequestOptions::HEADERS => [
                'Authorization' => 'Bearer ' . $_signature,
                'MerchantId' => $this->merchantId
            ]
        ]));
        return EgyptTransactionCreateResponse::cast(new EgyptTransactionCreateResponse, json_decode($response->getBody()->getContents(), false));
    }

    public function egyptStatus(): Response
    {
        $_signature = $this->signature(json_encode($this->egyptStatusData, JSON_UNESCAPED_SLASHES), $this->privateKey);
        $response = $this->networkClient->post("/api/v1/egypt/transaction/status", $this->buildRequestOptions([
            RequestOptions::JSON => $this->egyptStatusData,
            RequestOptions::HEADERS => [
                'Authorization' => 'Bearer ' . $_signature,
                'MerchantId' => $this->merchantId
            ]
        ]));
        return EgyptTransactionStatusResponse::cast(new EgyptTransactionStatusResponse, json_decode($response->getBody()->getContents(), false));
    }

    /**
     * @return mixed
     */
    public function getInitializeData()
    {
        return $this->initializeData;
    }

    /**
     * @param mixed $initializeData
     */
    public function setInitializeData($initializeData): void
    {
        $this->initializeData = $initializeData;
    }

    /**
     * @return mixed
     */
    public function getInputOtpData()
    {
        return $this->inputOtpData;
    }

    /**
     * @param mixed $inputOtpData
     */
    public function setInputOtpData($inputOtpData): void
    {
        $this->inputOtpData = $inputOtpData;
    }

    /**
     * @return mixed
     */
    public function getInputPhoneData()
    {
        return $this->inputPhoneData;
    }

    /**
     * @param mixed $inputPhoneData
     */
    public function setInputPhoneData($inputPhoneData): void
    {
        $this->inputPhoneData = $inputPhoneData;
    }

    /**
     * @return mixed
     */
    public function getInputPinData()
    {
        return $this->inputPinData;
    }

    /**
     * @param mixed $inputPinData
     */
    public function setInputPinData($inputPinData): void
    {
        $this->inputPinData = $inputPinData;
    }

    /**
     * @return mixed
     */
    public function getInputDobData()
    {
        return $this->inputDobData;
    }

    /**
     * @param mixed $inputDobData
     */
    public function setInputDobData($inputDobData): void
    {
        $this->inputDobData = $inputDobData;
    }

    /**
     * @return mixed
     */
    public function getStatusData()
    {
        return $this->statusData;
    }

    /**
     * @param mixed $statusData
     */
    public function setStatusData($statusData): void
    {
        $this->statusData = $statusData;
    }

    /**
     * @return mixed
     */
    public function getBankTransferInitializeData()
    {
        return $this->bankTransferInitializeData;
    }

    /**
     * @param mixed $bankTransferInitializeData
     */
    public function setBankTransferInitializeData($bankTransferInitializeData): void
    {
        $this->bankTransferInitializeData = $bankTransferInitializeData;
    }

    /**
     * @return mixed
     */
    public function getBankTransferStatusData()
    {
        return $this->bankTransferStatusData;
    }

    /**
     * @param mixed $bankTransferStatusData
     */
    public function setBankTransferStatusData($bankTransferStatusData): void
    {
        $this->bankTransferStatusData = $bankTransferStatusData;
    }

    /**
     * @return mixed
     */
    public function getUssdInitializeData()
    {
        return $this->ussdInitializeData;
    }

    /**
     * @param mixed $ussdInitializeData
     */
    public function setUssdInitializeData($ussdInitializeData): void
    {
        $this->ussdInitializeData = $ussdInitializeData;
    }

    /**
     * @return mixed
     */
    public function getUssdStatusData()
    {
        return $this->ussdStatusData;
    }

    /**
     * @param mixed $ussdStatusData
     */
    public function setUssdStatusData($ussdStatusData): void
    {
        $this->ussdStatusData = $ussdStatusData;
    }


    /**
     * @return mixed
     */
    public function getEgyptCreateData()
    {
        return $this->egyptCreateData;
    }

    /**
     * @param mixed $egyptCreateData
     */
    public function setEgyptCreateData($egyptCreateData): void
    {
        $this->egyptCreateData = $egyptCreateData;
    }

    /**
     * @return mixed
     */
    public function getEgyptStatusData()
    {
        return $this->egyptStatusData;
    }

    /**
     * @param mixed $egyptStatusData
     */
    public function setEgyptStatusData($egyptStatusData): void
    {
        $this->egyptStatusData = $egyptStatusData;
    }

}