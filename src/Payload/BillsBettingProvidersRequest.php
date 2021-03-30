<?php


namespace Opay\Payload;


class BillsBettingProvidersRequest extends BaseRequest implements \JsonSerializable
{
    public function __construct()
    {
    }

    public function jsonSerialize(): array
    {
        return $this->sort([]);
    }
}