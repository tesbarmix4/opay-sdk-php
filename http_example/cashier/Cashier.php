<?php

use Opay\MerchantCashier;
use Opay\Payload\OrderCloseRequest;
use Opay\Payload\OrderRequest;
use Opay\Payload\OrderStatusRequest;
use Opay\Result\Response;
use Opay\Utility\OpayConstants;

require_once('../Initialize.php');
require_once('../Config.php');

class Cashier extends Initialize
{
    private $merchantCashier;

    public function __construct()
    {
        parent::__construct(new Config());
        $this->merchantCashier = new MerchantCashier($this->config->getEndpointBaseUrl(), $this->config->getPubKey(), $this->config->getPrvKey(), $this->config->getMerchantId());
    }

    public function init(): Response
    {

        $productName = 'Apple AirPods Pro';
        $userPhone = '+2348036952110';
        $amount = '100';
        $mchShortName = 'Jerry\'s shop';
        $productDesc = 'WOW. The best wireless earphone in history. Cannot agree more! Right!';
        $callbackUrl = $this->config->getHostBaseUrl() . '/cashier/CashierCallback.php'; //The asynchronous callback address after transaction successful.
        $returnUrl = $this->config->getHostBaseUrl() . '/success.php'; //The address that browser go to after transaction successful.

        $_orderRequest = new OrderRequest(
            [
                OpayConstants::PAYMENT_METHODS_ACCOUNT,
                OpayConstants::PAYMENT_METHODS_QRCODE,
                OpayConstants::PAYMENT_METHODS_BANK_CARD,
                OpayConstants::PAYMENT_METHODS_BANK_ACCOUNT
            ],
            $this->getReference(),
            $productDesc,
            [
                OpayConstants::PAYMENT_CHANNEL_BALANCE_PAYMENT,
                OpayConstants::PAYMENT_CHANNEL_BONUS_PAYMENT,
                OpayConstants::PAYMENT_CHANNEL_O_WEALTH_PAYMENT
            ],
            OpayConstants::CURRENCY_NAIRA,
            $amount,
            $userPhone,
            $this->getUserIP(),
            $callbackUrl,
            $returnUrl,
            $mchShortName,
            $productName);

        $this->merchantCashier->order($_orderRequest);
        $response = $this->merchantCashier->getOrderApiResult();
        if ($response->getCode() == '00000') {
            $this->setOrderNumber($response->getData()->getOrderNo());
        }
        return $response;
    }

    public function getStatus(): Response
    {
        $_orderStatusRequest = new OrderStatusRequest($this->getOrderNumber(), $this->getReference());
        $this->merchantCashier->orderStatus($_orderStatusRequest);
        return $this->merchantCashier->getOrderStatusApiResult();
    }


    public function close(): Response
    {
        $_orderCloseRequest = new OrderCloseRequest($this->getOrderNumber(), $this->getReference());
        $this->merchantCashier->orderClose($_orderCloseRequest);
        return $this->merchantCashier->getOrderCloseApiResult();
    }
}


/**
 * Initialize a cashier transaction.
 *
 * $cashier = new Cashier();
 * $response = $cashier->init();
 * dump($response);
 * $status = $cashier->getStatus();
 * dump($status);
 */

/**
 * Query a transaction's status
 *
 * $cashier = new Cashier();
 * $status = $cashier->getStatus();
 * dump($status);
 */

/**
 * Close a transaction
 *
 * $cashier = new Cashier();
 * $response = $cashier->close();
 * dump($response);
 */

