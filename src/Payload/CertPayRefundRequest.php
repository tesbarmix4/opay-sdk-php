<?php


namespace Opay\Payload;


class CertPayRefundRequest extends BaseRequest implements \JsonSerializable
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
     * Amount in kobo
     * @var string
     */
    private $refundAmount;

    /**
     * Currency charge should be performed in. Default is NGN
     * @var string
     */
    private $currency;

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
    public function getRefundAmount(): string
    {
        return $this->refundAmount;
    }

    /**
     * @param string $refundAmount
     */
    public function setRefundAmount(string $refundAmount): void
    {
        $this->refundAmount = $refundAmount;
    }

    /**
     * @return string
     */
    public function getCurrency(): string
    {
        return $this->currency;
    }

    /**
     * @param string $currency
     */
    public function setCurrency(string $currency): void
    {
        $this->currency = $currency;
    }


    public function jsonSerialize(): array
    {
        return $this->sort([
            'reference' => $this->reference,
            'refundReference' => $this->refundReference,
            'orderNo' => $this->orderNo,
            'refundAmount' => $this->refundAmount,
            'currency' => $this->currency
        ]);
    }
}