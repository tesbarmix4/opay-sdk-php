<?php


namespace Opay\Payload;


use Opay\Utility\OpayConstants;

class OrderRefundOpayAccountRequest extends BaseRequest implements \JsonSerializable
{

    private $reference;
    private $originalReference;
    private $amount;
    private $currency;
    private $country;
    private $refundType;
    private $type;
    private $merchantId;
    private $phoneNumber;
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

    /**
     * @return mixed
     */
    public function getType(): string
    {
        return $this->type;
    }

    /**
     * @param mixed $type
     */
    public function setType($type): void
    {
        $this->type = $type;
    }

    /**
     * @return mixed
     */
    public function getMerchantId(): string
    {
        return $this->merchantId;
    }

    /**
     * @param mixed $merchantId
     */
    public function setMerchantId($merchantId): void
    {
        $this->merchantId = $merchantId;
    }

    /**
     * @return mixed
     */
    public function getPhoneNumber(): string
    {
        return $this->phoneNumber;
    }

    /**
     * @param mixed $phoneNumber
     */
    public function setPhoneNumber($phoneNumber): void
    {
        $this->phoneNumber = $phoneNumber;
    }


    public function jsonSerialize(): array
    {
        if ($this->type === OpayConstants::TRANSFER_RECEIVER_TYPE_MERCHANT) {
            $receiver = [
                'merchantId' => $this->merchantId,
                'type' => $this->type
            ];
        } else {
            $receiver = [
                'phoneNumber' => $this->phoneNumber,
                'type' => $this->type
            ];
        }

        return $this->sort([
            'reference' => $this->reference,
            'originalReference' => $this->originalReference,
            'amount' => $this->amount,
            'currency' => $this->currency,
            'refundType' => $this->refundType,
            'receiver' => $receiver,
            'reason' => $this->reason
        ]);
    }
}