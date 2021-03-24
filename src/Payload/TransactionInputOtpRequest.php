<?php


namespace Opay\Payload;


class TransactionInputOtpRequest implements \JsonSerializable
{

    /**
     * Order number of OPay payment
     * @var string
     */
    private $orderNo;

    /**
     * Order number of merchant (unique order number from merchant platform)
     * @var string
     */
    private $reference;

    /**
     * OTP submitted by user
     * @var string
     */
    private $otp;

    /**
     * @return mixed
     */
    public function getOrderNo(): string
    {
        return $this->orderNo;
    }

    /**
     * @param mixed $orderNo
     */
    public function setOrderNo($orderNo): void
    {
        $this->orderNo = $orderNo;
    }

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
    public function getOtp(): string
    {
        return $this->otp;
    }

    /**
     * @param mixed $otp
     */
    public function setOtp($otp): void
    {
        $this->otp = $otp;
    }


    public function jsonSerialize(): array
    {
        return [
            'orderNo' => $this->orderNo,
            'reference' => $this->reference,
            'otp' => $this->otp
        ];
    }
}