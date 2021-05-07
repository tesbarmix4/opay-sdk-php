<?php


namespace Opay\Payload;


class OrderRefundStatusRequest extends BaseRequest implements \JsonSerializable
{
    private $reference = '';
    private $orderNo = '';

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


    public function jsonSerialize(): array
    {
        return $this->sort([
            'reference' => $this->reference,
            'orderNo' => $this->orderNo
        ]);
    }
}