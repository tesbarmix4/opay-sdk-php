<?php


namespace Opay\Payload;


class TransactionUssdStatusRequest implements \JsonSerializable
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


    public function jsonSerialize(): array
    {
        return [
            'reference' => $this->reference,
            'orderNo' => $this->orderNo
        ];
    }
}