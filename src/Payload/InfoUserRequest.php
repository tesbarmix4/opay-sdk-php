<?php


namespace Opay\Payload;


class InfoUserRequest extends BaseRequest implements \JsonSerializable
{

    /**
     * User phone number, Can't be empty
     * @var string
     */
    private $phoneNumber;

    /**
     * @return string
     */
    public function getPhoneNumber(): string
    {
        return $this->phoneNumber;
    }

    /**
     * @param string $phoneNumber
     */
    public function setPhoneNumber(string $phoneNumber): void
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