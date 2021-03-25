<?php

use Opay\MerchantTransfer;
use Opay\Payload\OpayTransferRequest;
use Opay\Payload\OrderStatusRequest;
use Opay\Result\Response;
use Opay\Utility\OpayConstants;

require_once('../../Initialize.php');
require_once('../../Config.php');


class TransferToWallet extends Initialize
{
    private $merchantTransfer;

    public function __construct()
    {
        parent::__construct(new Config());
        $this->merchantTransfer = new MerchantTransfer($this->config->getEndpointBaseUrl(), $this->config->getPubKey(), $this->config->getPrvKey(), $this->config->getMerchantId());
    }

    public function transferToUser(): Response
    {
        $opayTransferRequest = new OpayTransferRequest(
            $this->getReference(),
            100,
            'NGN',
            'NG',
            'Andy Lee',
            OpayConstants::TRANSFER_RECEIVER_TYPE_USER,
            'transfer reason message',
            '+2348036952110');

        $this->merchantTransfer->opayTransfer($opayTransferRequest);
        $response = $this->merchantTransfer->opayTransferApiResult();
        if ($response->getCode() === "00000") {
            $this->setOrderNumber($response->getData()->getOrderNo());
        }
        return $response;
    }

    public function transferToMerchant(): Response
    {
        $opayTransferRequest = new OpayTransferRequest(
            $this->getReference(),
            100,
            'NGN',
            'NG',
            'Andy Lee',
            OpayConstants::TRANSFER_RECEIVER_TYPE_MERCHANT,
            'transfer reason message',
            '256619092316009');

        $this->merchantTransfer->opayTransfer($opayTransferRequest);
        $response = $this->merchantTransfer->opayTransferApiResult();
        if ($response->getCode() === "00000") {
            $this->setOrderNumber($response->getData()->getOrderNo());
        }
    }

    public function getTransferStatus(): Response
    {
        $_orderStatusRequest = new OrderStatusRequest($this->getOrderNumber(), $this->getReference());
        $this->merchantTransfer->transferStatus($_orderStatusRequest);
        return $this->merchantTransfer->opayTransferStatusApiResult();
    }
}


$transfer = new TransferToWallet();
$response = $transfer->transferToUser();
dump($response);
$status = $transfer->getTransferStatus();
dump($status);
/**
 * transfer to user
 *
 * $transfer = new TransferToWallet();
 * $response = $transfer->transferToUser();
 * dump($response);
 * $status = $transfer->getTransferStatus();
 * dump($status);
 */

/**
 * transfer to merchant
 *
 * $transfer = new TransferToWallet();
 * $response = $transfer->transferToMerchant();
 * dump($response);
 * $status = $transfer->getTransferStatus();
 * dump($status);
 */

/**
 * Enquiry a transfer to wallet transaction
 *
 * $status = $transfer->getTransferStatus();
 * dump($status);
 */