<?php


namespace Opay\Result;


class ChargeStatusResponseData implements \JsonSerializable
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
     * Amount in kobo
     * @var string
     */
    private $amount;

    /**
     * Currency charge should be performed in. Default is NGN
     * @var string
     */
    private $currency;


    /**
     * INITIAL
     * PENDING
     * SUCCESS
     * FAIL
     * INPUT-PIN
     * INPUT-OTP
     * INPUT-PHONE
     * INPUT-DOB
     * 3DSECURE
     * CLOSE
     * @var string
     */
    private $status;

    /**
     * Will return failure reason when status is FAILED
     * @var string
     */
    private $failureReason;

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
    public function getAmount(): string
    {
        return $this->amount;
    }

    /**
     * @param string $amount
     */
    public function setAmount(string $amount): void
    {
        $this->amount = $amount;
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
     * @return string
     */
    public function getFailureReason(): string
    {
        return $this->failureReason;
    }

    /**
     * @param string $failureReason
     */
    public function setFailureReason(string $failureReason): void
    {
        $this->failureReason = $failureReason;
    }


    public static function cast(ChargeStatusResponseData $destination, ?\stdClass $source): ChargeStatusResponseData
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
}