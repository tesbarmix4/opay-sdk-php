<?php


namespace Opay\Payload;


class InfoMerchantRequest implements \JsonSerializable
{

    /**
     * User email
     * @var string
     */
    private $email;

    /**
     * @return string
     */
    public function getEmail(): string
    {
        return $this->email;
    }

    /**
     * @param string $email
     */
    public function setEmail(string $email): void
    {
        $this->email = $email;
    }

    public function jsonSerialize(): array
    {
        return [
            'email' => $this->email
        ];
    }
}