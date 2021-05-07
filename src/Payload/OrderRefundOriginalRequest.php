<?php


namespace Opay\Payload;


class OrderRefundOriginalRequest extends BaseRequest implements \JsonSerializable
{

    private $reference;
    private $originalReference;
    private $amount;
    private $currency;
    private $country;
    private $refundType;
    private $reason;

    /**
     * @return mixed
     */
    public function getReference(): string
    {
        return $this->reference;
    }

    /**
     * @param mixed $reference
     */
    public function setReference($reference): void
    {
        $this->reference = $reference;
    }

    /**
     * @return mixed
     */
    public function getOriginalReference(): string
    {
        return $this->originalReference;
    }

    /**
     * @param mixed $originalReference
     */
    public function setOriginalReference($originalReference): void
    {
        $this->originalReference = $originalReference;
    }

    /**
     * @return mixed
     */
    public function getAmount(): string
    {
        return $this->amount;
    }

    /**
     * @param mixed $amount
     */
    public function setAmount($amount): void
    {
        $this->amount = $amount;
    }

    /**
     * @return mixed
     */
    public function getCurrency(): string
    {
        return $this->currency;
    }

    /**
     * @param mixed $currency
     */
    public function setCurrency($currency): void
    {
        $this->currency = $currency;
    }

    /**
     * @return mixed
     */
    public function getCountry(): string
    {
        return $this->country;
    }

    /**
     * @param mixed $country
     */
    public function setCountry($country): void
    {
        $this->country = $country;
    }

    /**
     * @return mixed
     */
    public function getRefundType(): string
    {
        return $this->refundType;
    }

    /**
     * @param mixed $refundType
     */
    public function setRefundType($refundType): void
    {
        $this->refundType = $refundType;
    }

    /**
     * @return mixed
     */
    public function getReason(): string
    {
        return $this->reason;
    }

    /**
     * @param mixed $reason
     */
    public function setReason($reason): void
    {
        $this->reason = $reason;
    }

    public function jsonSerialize(): array
    {
        return $this->sort([
            'reference' => $this->reference,
            'originalReference' => $this->originalReference,
            'amount' => $this->amount,
            'currency' => $this->currency,
            'refundType' => $this->refundType,
            'reason' => $this->reason
        ]);
    }
}