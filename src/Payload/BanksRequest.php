<?php


namespace Opay\Payload;


class BanksRequest extends BaseRequest implements \JsonSerializable
{
    private $countryCode;

    public function __construct(string $countryCode)
    {
        $this->countryCode = $countryCode;
    }

    public function jsonSerialize(): array
    {
        return $this->sort([
            'countryCode' => $this->countryCode
        ]);
    }
}