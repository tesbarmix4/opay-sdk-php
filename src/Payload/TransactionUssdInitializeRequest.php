<?php


namespace Opay\Payload;


class TransactionUssdInitializeRequest implements \JsonSerializable
{

    /**
     * Order number of merchant (unique order number from merchant platform)
     * @var string
     */
    private $reference;

    /**
     * Product description, utf-8 encoded
     * @var string
     */

    private $productDesc;

    /**
     * User phone number sent by merchant
     * @var string
     */
    private $userPhone;

    /**
     * The IP address requested by user, need pass-through by merchant, user Anti-phishing verification.
     * @var string
     */
    private $userRequestIp;
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
     * The asynchronous callback address after transaction successful.
     * @var string
     */
    private $callbackUrl;

    /**
     * Transaction would be closed within specific time. Value is in minute.
     * @var string
     */
    private $expireAt;

    /**
     * Make a transaction with a bank account uusd. (
     * 070 -- Fidelity Bank,
     * 058 -- Guaranty Trust Bank,
     * 082 -- Keystone Bank,
     * 232 -- Sterling Bank,
     * 033 -- United Bank for Africa,
     * 215 -- Unity Bank,
     * 057 -- Zenith Bank)
     * @var string
     */
    private $bankCode;

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
    public function getCallbackUrl(): string
    {
        return $this->callbackUrl;
    }

    /**
     * @param string $callbackUrl
     */
    public function setCallbackUrl(string $callbackUrl): void
    {
        $this->callbackUrl = $callbackUrl;
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

    /**
     * @return string
     */
    public function getBankCode(): string
    {
        return $this->bankCode;
    }

    /**
     * @param string $bankCode
     */
    public function setBankCode(string $bankCode): void
    {
        $this->bankCode = $bankCode;
    }


    public function jsonSerialize(): array
    {
        return [
            'reference' => $this->reference,
            'productDesc' => $this->productDesc,
            'userPhone' => $this->userPhone,
            'userRequestIp' => $this->userRequestIp,
            'amount' => $this->amount,
            'currency' => $this->currency,
            'callbackUrl' => $this->callbackUrl,
            'expireAt' => $this->expireAt,
            'bankCode' => $this->bankCode
        ];
    }
}