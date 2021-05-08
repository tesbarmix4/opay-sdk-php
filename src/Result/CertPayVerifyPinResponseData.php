<?php


namespace Opay\Result;


class CertPayVerifyPinResponseData implements \JsonSerializable
{
    /**
     * Order number from OPay payment
     * @var string
     */
    private $orderNo;

    /**
     * Order number of merchant (unique order number from merchant platform)
     * @var string
     */
    private $reference;

    /**
     * PIN_VERIFIED (PIN verified)
     * PIN_WRONG (PIN wrong).
     * @var string
     */
    private $status;

    /**
     * Payment method present when status=PIN_VERIFIED
     * BALANCE (Balance payment): available
     * SAVING (OWelath): unavailable.
     * @var array
     */
    private $payMethods;


    public static function cast(CertPayVerifyPinResponseData $destination, ?\stdClass $source): CertPayVerifyPinResponseData
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
    public function getStatus(): string
    {
        return $this->status;
    }

    /**
     * @param string $status
     */
    public function setStatus(string $status): void
    {
        $this->status = $status;
    }

    /**
     * @return array
     */
    public function getPayMethods(): array
    {
        return $this->payMethods;
    }

    /**
     * @param string $payMethods
     */
    public function setPayMethods(string $payMethods): void
    {
        $this->payMethods = $payMethods;
    }

}