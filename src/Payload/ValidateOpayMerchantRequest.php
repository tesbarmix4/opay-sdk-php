<?php


namespace Opay\Payload;


class ValidateOpayMerchantRequest extends BaseRequest implements \JsonSerializable
{
    private $email;

    public function __construct(string $email)
    {
        $this->email = $email;
    }

    public function jsonSerialize(): array
    {
        return $this->sort([
            'email' => $this->email
        ]);
    }
}