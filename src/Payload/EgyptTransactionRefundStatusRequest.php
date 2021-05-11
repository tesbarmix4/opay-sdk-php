<?php


namespace Opay\Payload;


class EgyptTransactionRefundStatusRequest extends BaseRequest implements \JsonSerializable
{

    /**
     * Order number of OPay payment
     * @var string
     */
    private $orderNo = '';


    public function jsonSerialize(): array
    {
        return $this->sort([
            'orderNo' => $this->orderNo
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

}