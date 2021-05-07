<?php


namespace Opay\Payload;


class CertPayRefundStatusRequest extends BaseRequest implements \JsonSerializable
{

    /**
     * Order number of merchant (unique order number from merchant platform)
     * @var string
     */
    private $reference;

    /**
     * Order number of OPay payment
     * @var string
     */
    private $orderNo = '';
    /**
     * Refund rder number of merchant (unique refund order number from merchant platform)
     * @var string
     */
    private $refundReference;

    /**
     * Refund Order number of merchant (unique order number from merchant platform)
     * @var string
     */
    private $refundOrderNo;

    /**
     * @return string
     */
    public function getReference(): string
    {
        return $this->reference;
    }

    /**
     * @param string $reference
     */
    public function setReference(string $reference): void
    {
        $this->reference = $reference;
    }

    /**
     * @return string
     */
    public function getOrderNo(): string
    {
        return $this->orderNo;
    }

    /**
     * @param string $orderNo
     */
    public function setOrderNo(string $orderNo): void
    {
        $this->orderNo = $orderNo;
    }

    /**
     * @return string
     */
    public function getRefundReference(): string
    {
        return $this->refundReference;
    }

    /**
     * @param string $refundReference
     */
    public function setRefundReference(string $refundReference): void
    {
        $this->refundReference = $refundReference;
    }

    /**
     * @return string
     */
    public function getRefundOrderNo(): string
    {
        return $this->refundOrderNo;
    }

    /**
     * @param string $refundOrderNo
     */
    public function setRefundOrderNo(string $refundOrderNo): void
    {
        $this->refundOrderNo = $refundOrderNo;
    }


    public function jsonSerialize(): array
    {
        return $this->sort([
            'reference' => $this->reference,
            'refundReference' => $this->refundReference,
            'orderNo' => $this->orderNo,
            'refundOrderNo' => $this->refundOrderNo
        ]);
    }
}