<?php

use Opay\MerchantTransfer;
use Opay\Payload\OpayTransferBatchToWalletRequest;
use Opay\Payload\OpayTransferRequest;
use Opay\Payload\OrderStatusRequest;
use Opay\Result\Response;
use Opay\Utility\OpayConstants;

require_once('../../Initialize.php');
require_once('../../Config.php');


class TransferBatchToWallet extends Initialize
{
    private $merchantTransfer;
    private $batchReference;

    public function __construct()
    {
        parent::__construct(new Config());
        $this->merchantTransfer = new MerchantTransfer($this->config->getEndpointBaseUrl(), $this->config->getPubKey(), $this->config->getPrvKey(), $this->config->getMerchantId());
    }

    public function batchTransferToWallet(): Response
    {
        $ref = $this->getGenerateReference();
        $this->batchReference[] = $ref;
        $request_user = new OpayTransferRequest(
            $ref,
            100,
            'NGN',
            'NG',
            'Andy Lee',
            OpayConstants::TRANSFER_RECEIVER_TYPE_USER,
            'transfer reason message',
            '+2348036952110');

        $ref = $this->getGenerateReference();
        $this->batchReference[] = $ref;
        $request_merchant = new OpayTransferRequest(
            $ref,
            100,
            'NGN',
            'NG',
            'Andy Lee',
            OpayConstants::TRANSFER_RECEIVER_TYPE_MERCHANT,
            'transfer reason message',
            '256619092316009');

        $batchTransfer = new OpayTransferBatchToWalletRequest();
        $batchTransfer->setList([$request_user->jsonSerialize(), $request_merchant->jsonSerialize()]);
        $this->merchantTransfer->opayBatchToWalletTransfer($batchTransfer);
        return $this->merchantTransfer->batchToWalletApiResult();
    }


    public function getBatchTransferStatus(): array
    {
        $response = [];
        foreach ($this->batchReference as $val) {
            $_orderStatusRequest = new OrderStatusRequest('', $val);
            $this->merchantTransfer->transferStatus($_orderStatusRequest);
            $res = $this->merchantTransfer->opayTransferStatusApiResult();
            $response[] = $res;
        }

        return $response;
    }

}


$transfer = new TransferBatchToWallet();
$response = $transfer->batchTransferToWallet();
dump($response);

$status = $transfer->getBatchTransferStatus();
dump($status);
/**
 * batch transfer
 *
 * $transfer = new TransferBatchToWallet();
 * $response = $transfer->batchTransferToWallet();
 * dump($response);
 * $status = $transfer->getBatchTransferStatus();
 * dump($status);
 */


/**
 * Enquiry a transfer to wallet transaction
 *
 * $status = $transfer->getBatchTransferStatus();
 * dump($status);
 */