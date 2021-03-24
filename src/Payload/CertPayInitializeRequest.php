<?php


namespace Opay\Payload;


class CertPayInitializeRequest implements \JsonSerializable
{

    /**
     * Order number of merchant (unique order number from merchant platform)
     * @var string
     */
    private $reference;

    /**
     * User's mobile phone number. e.g. +2349876543210
     * @var string
     */
    private $userPhone;
    /**
     * Amount in kobo
     * @var string
     */
    private $amount;

    /**
     * Currency charge should be performed in. Default is NGN
     * @var string
     */
    private $currency;

    /**
     * The IP address requested by user, need pass-through by merchant, user Anti-phishing verification.
     * @var string
     */
    private $userRequestIp;


    /**
     * Product name, utf-8 encoded
     * @var string
     */
    private $productName;

    /**
     * Product description, utf-8 encoded
     * @var string
     */
    private $productDesc;
    /**
     * Transaction would be closed within specific time. Value is in minute.
     * @var string
     */
    private $expireAt;

    /**
     * @return string
     */
    public function getReference(): string
    {
        return $this->reference;
    }

    /**
     * @param string $reference
     */
    public function setReference(string $reference): void
    {
        $this->reference = $reference;
    }

    /**
     * @return string
     */
    public function getUserPhone(): string
    {
        return $this->userPhone;
    }

    /**
     * @param string $userPhone
     */
    public function setUserPhone(string $userPhone): void
    {
        $this->userPhone = $userPhone;
    }

    /**
     * @return string
     */
    public function getAmount(): string
    {
        return $this->amount;
    }

    /**
     * @param string $amount
     */
    public function setAmount(string $amount): void
    {
        $this->amount = $amount;
    }

    /**
     * @return string
     */
    public function getCurrency(): string
    {
        return $this->currency;
    }

    /**
     * @param string $currency
     */
    public function setCurrency(string $currency): void
    {
        $this->currency = $currency;
    }

    /**
     * @return string
     */
    public function getUserRequestIp(): string
    {
        return $this->userRequestIp;
    }

    /**
     * @param string $userRequestIp
     */
    public function setUserRequestIp(string $userRequestIp): void
    {
        $this->userRequestIp = $userRequestIp;
    }

    /**
     * @return string
     */
    public function getProductName(): string
    {
        return $this->productName;
    }

    /**
     * @param string $productName
     */
    public function setProductName(string $productName): void
    {
        $this->productName = $productName;
    }

    /**
     * @return string
     */
    public function getProductDesc(): string
    {
        return $this->productDesc;
    }

    /**
     * @param string $productDesc
     */
    public function setProductDesc(string $productDesc): void
    {
        $this->productDesc = $productDesc;
    }

    /**
     * @return string
     */
    public function getExpireAt(): string
    {
        return $this->expireAt;
    }

    /**
     * @param string $expireAt
     */
    public function setExpireAt(string $expireAt): void
    {
        $this->expireAt = $expireAt;
    }


    public function jsonSerialize(): array
    {
        return [
            'reference' => $this->reference,
            'amount' => $this->amount,
            'currency' => $this->currency,
            'userRequestIp' => $this->userRequestIp,
            'userPhone' => $this->userPhone,
            'productName' => $this->productName,
            'expireAt' => $this->expireAt,
            'productDesc' => $this->productDesc
        ];
    }
}