<?php


namespace Opay\Payload;


class BalancesRequest extends BaseRequest implements \JsonSerializable
{
    public function __construct()
    {
    }

    public function jsonSerialize(): array
    {
        return $this->sort([]);
    }
}