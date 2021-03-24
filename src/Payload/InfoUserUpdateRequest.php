<?php


namespace Opay\Payload;


class InfoUserUpdateRequest implements \JsonSerializable
{

    /**
     * User phone number, Can't be empty
     * @var string
     */
    private $phoneNumber;

    /**
     * User email
     * @var string
     */
    private $email;

    /**
     * User first name
     * @var string
     */
    private $firstName;

    /**
     * User last name
     * @var string
     */
    private $lastName;

    /**
     * User address
     * @var string
     */
    private $address;

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

    /**
     * @return string
     */
    public function getFirstName(): string
    {
        return $this->firstName;
    }

    /**
     * @param string $firstName
     */
    public function setFirstName(string $firstName): void
    {
        $this->firstName = $firstName;
    }

    /**
     * @return string
     */
    public function getLastName(): string
    {
        return $this->lastName;
    }

    /**
     * @param string $lastName
     */
    public function setLastName(string $lastName): void
    {
        $this->lastName = $lastName;
    }

    /**
     * @return string
     */
    public function getAddress(): string
    {
        return $this->address;
    }

    /**
     * @param string $address
     */
    public function setAddress(string $address): void
    {
        $this->address = $address;
    }

    public function jsonSerialize(): array
    {
        return [
            'phoneNumber' => $this->phoneNumber,
            'email' => $this->email,
            'firstName' => $this->firstName,
            'lastName' => $this->lastName,
            'address' => $this->address,
        ];
    }
}