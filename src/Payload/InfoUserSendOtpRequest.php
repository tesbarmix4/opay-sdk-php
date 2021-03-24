<?php


namespace Opay\Payload;


class InfoUserSendOtpRequest implements \JsonSerializable
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
        return [
            'phoneNumber' => $this->phoneNumber
        ];
    }
}