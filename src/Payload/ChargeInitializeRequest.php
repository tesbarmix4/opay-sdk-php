<?php


namespace Opay\Payload;


class ChargeInitializeRequest extends BaseRequest implements \JsonSerializable
{

    /**
     * Order number of merchant (unique order number from merchant platform)
     * @var string
     */
    private $reference;

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
     * The asynchronous callback address after transaction successful.
     * @var string
     */
    private $callbackUrl;

    /**
     * The address that browser go to after transaction successful.
     * @var string
     */
    private $returnUrl;
    /**
     * Transaction would be closed within specific time. Value is in minute.
     * @var string
     */
    private $expireAt;

    /**
     * USER or MERCHANT
     * @var string
     */
    private $chargerType;

    /**
     * According to userType should be UserId or MerchantId, which could enquiried via Info enquiry (/info/*) endpoints
     * @var string
     */
    private $chargerId;

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
    public function getReturnUrl(): string
    {
        return $this->returnUrl;
    }

    /**
     * @param string $returnUrl
     */
    public function setReturnUrl(string $returnUrl): void
    {
        $this->returnUrl = $returnUrl;
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
    public function getChargerType(): string
    {
        return $this->chargerType;
    }

    /**
     * @param string $chargerType
     */
    public function setChargerType(string $chargerType): void
    {
        $this->chargerType = $chargerType;
    }

    /**
     * @return string
     */
    public function getChargerId(): string
    {
        return $this->chargerId;
    }

    /**
     * @param string $chargerId
     */
    public function setChargerId(string $chargerId): void
    {
        $this->chargerId = $chargerId;
    }


    public function jsonSerialize(): array
    {
        return $this->sort([
            'reference' => $this->reference,
            'amount' => $this->amount,
            'currency' => $this->currency,
            'userRequestIp' => $this->userRequestIp,
            'callbackUrl' => $this->callbackUrl,
            'returnUrl' => $this->returnUrl,
            'expireAt' => $this->expireAt,
            'chargerType' => $this->chargerType,
            'chargerId' => $this->chargerId
        ]);
    }
}