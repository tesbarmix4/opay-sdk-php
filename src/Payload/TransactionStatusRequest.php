<?php


namespace Opay\Payload;


class TransactionStatusRequest extends BaseRequest implements \JsonSerializable
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


    public function jsonSerialize(): array
    {
        return $this->sort([
            'orderNo' => $this->orderNo,
            'reference' => $this->reference
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
}