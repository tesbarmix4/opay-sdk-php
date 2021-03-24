<?php

namespace Opay;

use GuzzleHttp\RequestOptions;
use Opay\Result\CertPayCloseResponse;
use Opay\Result\CertPayInitializeResponse;
use Opay\Result\CertPayRefundResponse;
use Opay\Result\CertPayRefundStatusResponse;
use Opay\Result\CertPaySendOtpResponse;
use Opay\Result\CertPayStatusResponse;
use Opay\Result\CertPayVerifyOtpResponse;
use Opay\Result\CertPayVerifyPinResponse;
use Opay\Result\ChargeInitializeResponse;
use Opay\Result\ChargeStatusResponse;
use Opay\Result\Response;

class MerchantCertPay extends Merchant
{

    private $initializeData;
    private $verifyPinData;
    private $sendOtpData;
    private $verifyOtpData;
    private $statusData;
    private $closeData;
    private $refundData;
    private $refundStatusData;


    /**
     * MerchantCertPay constructor.
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
    public function getVerifyPinData()
    {
        return $this->verifyPinData;
    }

    /**
     * @param mixed $verifyPinData
     */
    public function setVerifyPinData($verifyPinData): void
    {
        $this->verifyPinData = $verifyPinData;
    }

    /**
     * @return mixed
     */
    public function getSendOtpData()
    {
        return $this->sendOtpData;
    }

    /**
     * @param mixed $sendOtpData
     */
    public function setSendOtpData($sendOtpData): void
    {
        $this->sendOtpData = $sendOtpData;
    }

    /**
     * @return mixed
     */
    public function getVerifyOtpData()
    {
        return $this->verifyOtpData;
    }

    /**
     * @param mixed $verifyOtpData
     */
    public function setVerifyOtpData($verifyOtpData): void
    {
        $this->verifyOtpData = $verifyOtpData;
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
    public function getCloseData()
    {
        return $this->closeData;
    }

    /**
     * @param mixed $closeData
     */
    public function setCloseData($closeData): void
    {
        $this->closeData = $closeData;
    }

    /**
     * @return mixed
     */
    public function getRefundData()
    {
        return $this->refundData;
    }

    /**
     * @param mixed $refundData
     */
    public function setRefundData($refundData): void
    {
        $this->refundData = $refundData;
    }

    /**
     * @return mixed
     */
    public function getRefundStatusData()
    {
        return $this->refundStatusData;
    }

    /**
     * @param mixed $refundStatusData
     */
    public function setRefundStatusData($refundStatusData): void
    {
        $this->refundStatusData = $refundStatusData;
    }


    public function initialize(): Response
    {
        $response = $this->networkClient->post("/api/v3/certpay/initialize", $this->buildRequestOptions([
            RequestOptions::JSON => $this->initializeData,
            RequestOptions::HEADERS => [
                'Authorization' => 'Bearer ' . $this->publicKey,
                'MerchantId' => $this->merchantId
            ]
        ]));
        return CertPayInitializeResponse::cast(new CertPayInitializeResponse, json_decode($response->getBody()->getContents(), false));
    }

    public function verifyPIN(): Response
    {
        $response = $this->networkClient->post("/api/v3/certpay/verifyPIN", $this->buildRequestOptions([
            RequestOptions::JSON => $this->verifyPinData,
            RequestOptions::HEADERS => [
                'Authorization' => 'Bearer ' . $this->publicKey,
                'MerchantId' => $this->merchantId
            ]
        ]));
        return CertPayVerifyPinResponse::cast(new CertPayVerifyPinResponse, json_decode($response->getBody()->getContents(), false));
    }

    public function sendOTP(): Response
    {
        $response = $this->networkClient->post("/api/v3/certpay/sendOTP", $this->buildRequestOptions([
            RequestOptions::JSON => $this->sendOtpData,
            RequestOptions::HEADERS => [
                'Authorization' => 'Bearer ' . $this->publicKey,
                'MerchantId' => $this->merchantId
            ]
        ]));
        return CertPaySendOtpResponse::cast(new CertPaySendOtpResponse, json_decode($response->getBody()->getContents(), false));
    }


    public function verifyOTP(): Response
    {
        $response = $this->networkClient->post("/api/v3/certpay/verifyOTP", $this->buildRequestOptions([
            RequestOptions::JSON => $this->verifyOtpData,
            RequestOptions::HEADERS => [
                'Authorization' => 'Bearer ' . $this->publicKey,
                'MerchantId' => $this->merchantId
            ]
        ]));
        return CertPayVerifyOtpResponse::cast(new CertPayVerifyOtpResponse, json_decode($response->getBody()->getContents(), false));
    }


    public function status(): Response
    {
        $_signature = hash_hmac('sha512', json_encode($this->statusData), $this->privateKey);
        $response = $this->networkClient->post("/api/v3/certpay/status", $this->buildRequestOptions([
            RequestOptions::JSON => $this->statusData,
            RequestOptions::HEADERS => [
                'Authorization' => 'Bearer ' . $_signature,
                'MerchantId' => $this->merchantId
            ]
        ]));
        return CertPayStatusResponse::cast(new CertPayStatusResponse, json_decode($response->getBody()->getContents(), false));
    }

    public function close(): Response
    {
        $_signature = hash_hmac('sha512', json_encode($this->closeData), $this->privateKey);
        $response = $this->networkClient->post("/api/v3/certpay/close", $this->buildRequestOptions([
            RequestOptions::JSON => $this->closeData,
            RequestOptions::HEADERS => [
                'Authorization' => 'Bearer ' . $_signature,
                'MerchantId' => $this->merchantId
            ]
        ]));
        return CertPayCloseResponse::cast(new CertPayCloseResponse, json_decode($response->getBody()->getContents(), false));
    }


    public function refund(): Response
    {
        $_signature = hash_hmac('sha512', json_encode($this->refundData), $this->privateKey);
        $response = $this->networkClient->post("/api/v3/certpay/refund", $this->buildRequestOptions([
            RequestOptions::JSON => $this->refundData,
            RequestOptions::HEADERS => [
                'Authorization' => 'Bearer ' . $_signature,
                'MerchantId' => $this->merchantId
            ]
        ]));
        return CertPayRefundResponse::cast(new CertPayRefundResponse, json_decode($response->getBody()->getContents(), false));
    }


    public function refundStatus(): Response
    {
        $_signature = hash_hmac('sha512', json_encode($this->refundStatusData), $this->privateKey);
        $response = $this->networkClient->post("/api/v3/certpay/refundStatus", $this->buildRequestOptions([
            RequestOptions::JSON => $this->refundStatusData,
            RequestOptions::HEADERS => [
                'Authorization' => 'Bearer ' . $_signature,
                'MerchantId' => $this->merchantId
            ]
        ]));
        return CertPayRefundStatusResponse::cast(new CertPayRefundStatusResponse, json_decode($response->getBody()->getContents(), false));
    }


}