<?php


namespace Opay\Payload;


class CertPayVerifyPinRequest implements \JsonSerializable
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
    private $orderNo;
    /**
     * User's mobile phone number. e.g. +2349876543210
     * @var string
     */
    private $userPhone;

    /**
     * @var string
     */
    private $pin;

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
    public function getUserPhone(): string
    {
        return $this->userPhone;
    }

    /**
     * @param string $userPhone
     */
    public function setUserPhone(string $userPhone): void
    {
        $this->userPhone = $userPhone;
    }

    /**
     * @return string
     */
    public function getPin(): string
    {
        return $this->pin;
    }

    /**
     * @param string $pin
     */
    public function setPin(string $pin): void
    {
        $this->pin = $pin;
    }


    public function jsonSerialize(): array
    {
        return [
            'reference' => $this->reference,
            'userPhone' => $this->userPhone,
            'orderNo' => $this->orderNo,
            'pin' => $this->pin,
        ];
    }
}