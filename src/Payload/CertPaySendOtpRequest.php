<?php


namespace Opay\Payload;


class CertPaySendOtpRequest implements \JsonSerializable
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
     * Payment method user selected
     * @var string
     */
    private $payMethod;

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
    public function getPayMethod(): string
    {
        return $this->payMethod;
    }

    /**
     * @param string $payMethod
     */
    public function setPayMethod(string $payMethod): void
    {
        $this->payMethod = $payMethod;
    }


    public function jsonSerialize(): array
    {
        return [
            'reference' => $this->reference,
            'orderNo' => $this->orderNo,
            'payMethod' => $this->payMethod,
        ];
    }
}