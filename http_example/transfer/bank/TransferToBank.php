<?php

use Opay\MerchantTransfer;
use Opay\Payload\BankTransferRequest;
use Opay\Payload\OrderStatusRequest;
use Opay\Result\Response;

require_once('../../Initialize.php');
require_once('../../Config.php');


class TransferToBank extends Initialize
{
    private $merchantTransfer;

    public function __construct()
    {
        parent::__construct(new Config());
        $this->merchantTransfer = new MerchantTransfer($this->config->getEndpointBaseUrl(), $this->config->getPubKey(), $this->config->getPrvKey(), $this->config->getMerchantId());
    }

    public function transferToBank(): Response
    {
        $bankTransferRequest = new BankTransferRequest(
            $this->getReference(),
            '100',
            'NGN',
            'NG',
            'Andy Lee',
            '050',
            '22222222222222',
            'transfer reason message'
        );
        $this->merchantTransfer->bankTransfer($bankTransferRequest);
        $response = $this->merchantTransfer->bankTransferApiResult();
        if ($response->getCode() === "00000") {
            $this->setOrderNumber($response->getData()->getOrderNo());
        }
        return $response;
    }

    public function getTransferBankStatus(): Response
    {
        $_orderStatusRequest = new OrderStatusRequest($this->getOrderNumber(), $this->getReference());
        $this->merchantTransfer->transferStatus($_orderStatusRequest);
        return $this->merchantTransfer->bankTransferStatusApiResult();
    }
}

/**
 * transfer to bank
 *
 * $transfer = new transferToBank();
 * $response = $transfer->transferToUser();
 * dump($response);
 * $status = $transfer->getTransferBankStatus();
 * dump($status);
 */


/**
 * Enquiry a transfer to bank transaction
 *
 * $status = $transfer->getTransferBankStatus();
 * dump($status);
 */