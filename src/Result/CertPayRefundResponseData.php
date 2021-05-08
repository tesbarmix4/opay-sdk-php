<?php


namespace Opay\Result;


class CertPayRefundResponseData implements \JsonSerializable
{
    /**
     * Order number of merchant (unique order number from merchant platform)
     * @var string
     */
    private $refundReference;

    /**
     * Order number of merchant (unique order number from merchant platform)
     * @var string
     */
    private $reference;

    /**
     * Refund Order number of merchant (unique order number from merchant platform)
     * @var string
     */
    private $refundOrderNo;

    /**
     * Order number from OPay payment
     * @var string
     */
    private $orderNo;


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
     * SUCCESSFUL
     * @var string
     */
    private $refundStatus;

    public static function cast(CertPayRefundResponseData $destination, ?\stdClass $source): CertPayRefundResponseData
    {
        if ($source) {
            $sourceReflection = new \ReflectionObject($source);
            $sourceProperties = $sourceReflection->getProperties();
            foreach ($sourceProperties as $sourceProperty) {
                $name = $sourceProperty->getName();
                $destination->{$name} = $source->$name;
            }
        }
        return $destination;
    }

    public function jsonSerialize(): array
    {
        $data = [];
        foreach ($this as $key => $val) {
            if ($val !== null) $data[$key] = $val;
        }
        return $data;
    }

    public function toArray(): array
    {
        return (array)$this;
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

    /**
     * @return string
     */
    public function getRefundStatus(): string
    {
        return $this->refundStatus;
    }

    /**
     * @param string $refundStatus
     */
    public function setRefundStatus(string $refundStatus): void
    {
        $this->refundStatus = $refundStatus;
    }

}