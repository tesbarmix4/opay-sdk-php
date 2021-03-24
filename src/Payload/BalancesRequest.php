<?php


namespace Opay\Payload;


class BalancesRequest implements \JsonSerializable
{
    public function __construct()
    {
    }

    public function jsonSerialize(): array
    {
        return [];
    }
}