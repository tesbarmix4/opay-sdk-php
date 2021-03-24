<?php


namespace Opay\Result;


class InfoUserSendOtpResponseData
{
    /**
     * phone number masked
     * @var string
     */
    private $phoneNumber;

    /**
     * OTP_SENT
     * @var string
     */
    private $status;


    public static function cast(InfoUserSendOtpResponseData $destination, ?\stdClass $source): InfoUserSendOtpResponseData
    {
        if ($source) {
            $sourceReflection = new \ReflectionObject($source);
            $sourceProperties = $sourceReflection->getProperties();
            foreach ($sourceProperties as $sourceProperty) {
                $name = $sourceProperty->getName();
                $destination->{$name} = $source->$name;
            }
        }
        return $destination;
    }

    public function toArray(): array
    {
        return (array)$this;
    }

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
    public function getStatus(): string
    {
        return $this->status;
    }

    /**
     * @param string $status
     */
    public function setStatus(string $status): void
    {
        $this->status = $status;
    }

}