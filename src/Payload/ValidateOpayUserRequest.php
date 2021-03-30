<?php


namespace Opay\Payload;


class ValidateOpayUserRequest extends BaseRequest implements \JsonSerializable
{
    private $phoneNumber;

    public function __construct(string $phoneNumber)
    {
        $this->phoneNumber = $phoneNumber;
    }

    public function jsonSerialize(): array
    {
        return $this->sort([
            'phoneNumber' => $this->phoneNumber
        ]);
    }
}