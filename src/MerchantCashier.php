<?php

namespace Opay;

use GuzzleHttp\RequestOptions;
use Opay\Payload\EgyptCashierRequest;
use Opay\Payload\OrderCloseRequest;
use Opay\Payload\OrderRefundBankAccountRequest;
use Opay\Payload\OrderRefundOpayAccountRequest;
use Opay\Payload\OrderRefundOriginalRequest;
use Opay\Payload\OrderRefundStatusRequest;
use Opay\Payload\OrderRequest;
use Opay\Payload\OrderStatusRequest;
use Opay\Result\EgyptCashierResponse;
use Opay\Result\EgyptCashierStatusResponse;
use Opay\Result\OrderRefundResponse;
use Opay\Result\OrderRefundResponseData;
use Opay\Result\OrderRefundStatusResponse;
use Opay\Result\OrderResponse;
use Opay\Result\Response;

class MerchantCashier extends Merchant
{
    private $orderData;
    private $orderStatusData;
    private $orderCloseData;
    private $orderRefundData;
    private $orderRefundStatusData;
    private $egyptCashierCreateData;
    private $egyptCashierStatusData;

    public function __construct(string $environmentBaseUrl, string $pbKey, string $pvKey,
                                string $merchantId, ?array $proxyAddress = null)
    {
        parent::__construct($environmentBaseUrl, $pbKey, $pvKey, $merchantId, $proxyAddress);
    }

    public final function order(OrderRequest $order): void
    {
        $this->orderData = $order;
    }

    public final function orderStatus(OrderStatusRequest $orderStatus): void
    {
        $this->orderStatusData = $orderStatus;
    }

    public final function orderRefundOpayAccount(OrderRefundOpayAccountRequest $request): void
    {
        $this->orderRefundData = $request;
    }

    public final function orderRefundBankAccount(OrderRefundBankAccountRequest $request): void
    {
        $this->orderRefundData = $request;
    }

    public final function orderRefundOriginal(OrderRefundOriginalRequest $request): void
    {
        $this->orderRefundData = $request;
    }

    public final function orderRefundStatus(OrderRefundStatusRequest $request): void
    {
        $this->orderRefundStatusData = $request;
    }

    public final function orderClose(OrderCloseRequest $orderClose): void
    {
        $this->orderCloseData = $orderClose;
    }

    /**
     * @param mixed $egyptCashierCreateData
     */
    public function setEgyptCashierCreateData(EgyptCashierRequest $egyptCashierCreateData): void
    {
        $this->egyptCashierCreateData = $egyptCashierCreateData;
    }

    public final function getOrderApiResult(): Response
    {
        $response = $this->networkClient->post('/api/v3/cashier/initialize', $this->buildRequestOptions([
            RequestOptions::JSON => $this->orderData,
            RequestOptions::HEADERS => [
                'Authorization' => 'Bearer ' . $this->publicKey,
                'MerchantId' => $this->merchantId
            ]
        ]));
        return OrderResponse::cast(new OrderResponse(), json_decode($response->getBody()->getContents(), false));
    }

    public final function getOrderStatusApiResult(): Response
    {
        $_signature = $this->signature(json_encode($this->orderStatusData), $this->privateKey);
        $response = $this->networkClient->post("/api/v3/cashier/status", $this->buildRequestOptions([
            RequestOptions::JSON => $this->orderStatusData,
            RequestOptions::HEADERS => [
                'Authorization' => 'Bearer ' . $_signature,
                'MerchantId' => $this->merchantId
            ]
        ]));
        return OrderResponse::cast(new OrderResponse(), json_decode($response->getBody()->getContents(), false));
    }

    public final function getOrderCloseApiResult(): Response
    {
        $_signature = $this->signature(json_encode($this->orderCloseData), $this->privateKey);
        $response = $this->networkClient->post("/api/v3/cashier/close", $this->buildRequestOptions([
            RequestOptions::JSON => $this->orderCloseData,
            RequestOptions::HEADERS => [
                'Authorization' => 'Bearer ' . $_signature,
                'MerchantId' => $this->merchantId
            ]
        ]));
        return OrderResponse::cast(new OrderResponse(), json_decode($response->getBody()->getContents(), false));
    }

    public final function getOrderRefundApiResult(): Response
    {
        $_signature = $this->signature(json_encode($this->orderRefundData), $this->privateKey);
        $response = $this->networkClient->post("/api/v3/cashier/refund", $this->buildRequestOptions([
            RequestOptions::JSON => $this->orderRefundData,
            RequestOptions::HEADERS => [
                'Authorization' => 'Bearer ' . $_signature,
                'MerchantId' => $this->merchantId
            ]
        ]));
        return OrderRefundResponse::cast(new OrderRefundResponse(), json_decode($response->getBody()->getContents(), false));
    }

    public final function getOrderRefundStatusApiResult(): Response
    {
        $_signature = $this->signature(json_encode($this->orderRefundStatusData), $this->privateKey);
        $response = $this->networkClient->post("/api/v3/cashier/refund/status", $this->buildRequestOptions([
            RequestOptions::JSON => $this->orderRefundStatusData,
            RequestOptions::HEADERS => [
                'Authorization' => 'Bearer ' . $_signature,
                'MerchantId' => $this->merchantId
            ]
        ]));
        return OrderRefundStatusResponse::cast(new OrderRefundStatusResponse(), json_decode($response->getBody()->getContents(), false));
    }

    public final function egyptCashierCreate(): Response
    {
        $_signature = $this->signature(json_encode($this->egyptCashierCreateData, 320), $this->privateKey);
        $response = $this->networkClient->post("/api/v1/egypt/cashier/create", $this->buildRequestOptions([
            RequestOptions::JSON => $this->egyptCashierCreateData,
            RequestOptions::HEADERS => [
                'Authorization' => 'Bearer ' . $_signature,
                'MerchantId' => $this->merchantId
            ]
        ]));
        return EgyptCashierResponse::cast(new EgyptCashierResponse(), json_decode($response->getBody()->getContents(), false));
    }

    public final function egyptCashierStatus(): Response
    {
        $response = $this->networkClient->post("/api/v1/egypt/cashier/status", $this->buildRequestOptions([
            RequestOptions::JSON => $this->egyptCashierStatusData,
            RequestOptions::HEADERS => [
                'Authorization' => 'Bearer ' . $this->publicKey,
                'MerchantId' => $this->merchantId
            ]
        ]));
        return EgyptCashierStatusResponse::cast(new EgyptCashierStatusResponse(), json_decode($response->getBody()->getContents(), false));
    }

    /**
     * @return OrderRequest
     */
    public final function getOrderData(): OrderRequest
    {
        return $this->orderData;
    }

    /**
     * @return OrderStatusRequest
     */
    public final function getOrderStatusData(): OrderStatusRequest
    {
        return $this->orderStatusData;
    }

    /**
     * @return OrderCloseRequest
     */
    public final function getOrderCloseData(): OrderCloseRequest
    {
        return $this->orderCloseData;
    }

    /**
     * @return mixed
     */
    public function getOrderRefundData()
    {
        return $this->orderRefundData;
    }

    /**
     * @return mixed
     */
    public function getOrderRefundStatusData()
    {
        return $this->orderRefundStatusData;
    }

    /**
     * @return mixed
     */
    public function getEgyptCashierCreateData()
    {
        return $this->egyptCashierCreateData;
    }

    /**
     * @return mixed
     */
    public function getEgyptCashierStatusData()
    {
        return $this->egyptCashierStatusData;
    }

    /**
     * @param mixed $egyptCashierStatusData
     */
    public function setEgyptCashierStatusData($egyptCashierStatusData): void
    {
        $this->egyptCashierStatusData = $egyptCashierStatusData;
    }

}