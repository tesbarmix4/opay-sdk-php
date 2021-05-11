<?php


namespace Opay\Result;


class EgyptTransactionRefundStatusResponseData implements \JsonSerializable
{

    private $orderNo;

    /**
     * INITIAL
     * PENDING
     * SUCCESS
     * FAIL
     * INPUT_3DS
     * INPUT_CARD
     * CLOSE
     * @var string
     */
    private $status;

    /**
     * @return mixed
     */
    public function getOrderNo()
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
     * @return string
     */
    public function getStatus(): string
    {
        return $this->status;
    }

    /**
     * @param string $status
     */
    public function setStatus(string $status): void
    {
        $this->status = $status;
    }

    public function jsonSerialize(): array
    {
        $data = [];
        foreach ($this as $key => $val) {
            if ($val !== null) $data[$key] = $val;
        }
        return $data;
    }

    public function toArray(): array
    {
        return (array)$this;
    }

    public static function cast(EgyptTransactionRefundStatusResponseData $destination, ?\stdClass $source): EgyptTransactionRefundStatusResponseData
    {
        if ($source) {
            $sourceReflection = new \ReflectionObject($source);
            $sourceProperties = $sourceReflection->getProperties();
            foreach ($sourceProperties as $sourceProperty) {
                $name = $sourceProperty->getName();
                $destination->{$name} = $source->$name;
            }
        }
        return $destination;
    }
}