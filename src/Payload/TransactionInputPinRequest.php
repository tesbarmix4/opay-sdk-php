<?php


namespace Opay\Payload;


class TransactionInputPinRequest extends BaseRequest implements \JsonSerializable
{

    /**
     * Order number of OPay payment
     * @var string
     */
    private $orderNo = '';

    /**
     * Order number of merchant (unique order number from merchant platform)
     * @var string
     */
    private $reference = '';

    /**
     * PIN submitted by user
     * @var string
     */
    private $pin;


    public function jsonSerialize(): array
    {
        return $this->sort([
            'orderNo' => $this->orderNo,
            'reference' => $this->reference,
            'pin' => $this->pin
        ]);
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

}