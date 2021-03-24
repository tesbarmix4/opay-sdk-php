<?php


namespace Opay\Payload;


class BillsBettingProvidersRequest implements \JsonSerializable
{
    public function __construct()
    {
    }

    public function jsonSerialize(): array
    {
        return [];
    }
}