<?php

use Opay\MerchantTransfer;
use Opay\Payload\BankTransferRequest;
use Opay\Payload\OpayTransferBatchToBankRequest;
use Opay\Payload\OpayTransferRequest;
use Opay\Payload\OrderStatusRequest;
use Opay\Result\Response;
use Opay\Utility\OpayConstants;

require_once('../../Initialize.php');
require_once('../../Config.php');


class TransferBatchToBank extends Initialize
{
    private $merchantTransfer;
    private $batchReference;

    public function __construct()
    {
        parent::__construct(new Config());
        $this->merchantTransfer = new MerchantTransfer($this->config->getEndpointBaseUrl(), $this->config->getPubKey(), $this->config->getPrvKey(), $this->config->getMerchantId());
    }

    public function batchTransferToBank(): Response
    {
        $ref = $this->getGenerateReference();
        $this->batchReference[] = $ref;
        $request_user = new BankTransferRequest(
            $ref,
            '100',
            'NGN',
            'NG',
            'Andy Lee',
            '050',
            '22222222222222',
            'transfer reason message');

        $ref = $this->getGenerateReference();
        $this->batchReference[] = $ref;
        $request_merchant = new BankTransferRequest(
            $ref,
            '100',
            'NGN',
            'NG',
            'Andy Lee',
            '050',
            '22222222222222',
            'transfer reason message');

        $batchTransfer = new OpayTransferBatchToBankRequest();
        $batchTransfer->setList([$request_user->jsonSerialize(), $request_merchant->jsonSerialize()]);

        $this->merchantTransfer->opayBatchToBankTransfer($batchTransfer);
        return $this->merchantTransfer->batchToBankApiResult();
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


$transfer = new TransferBatchToBank();
$response = $transfer->batchTransferToBank();
dump($response);

$status = $transfer->getBatchTransferStatus();
dump($status);
/**
 * batch transfer to bank
 *
 * $transfer = new TransferBatchToBank();
 * $response = $transfer->batchTransferToBank();
 * dump($response);
 * $status = $transfer->getBatchTransferStatus();
 * dump($status);
 */


/**
 * Enquiry a transfer to Bank transaction
 *
 * $status = $transfer->getBatchTransferStatus();
 * dump($status);
 */