<?php


namespace Opay\Payload;


class BulkBillsData
{
    /**
     * Amount in kobo
     * @var string
     */
    private $amount;

    /**
     * Default is NG
     * @var string
     */
    private $country = 'NG';
    /**
     * Default is NGN
     * @var string
     */
    private $currency = 'NGN';

    /**
     * For betting, benificiary's customerId in provider
     * For aitime, it's benificiary's phone number, e.g.: +2348888899999
     * @var string
     */
    private $customerId;

    /**
     * For betting, please use provider returned in betting-providers
     * For airtime, provider could be one of AIR，MTN，GLO，ETI
     * @var string
     */
    private $provider;

    /**
     * Order number of merchant (unique order number from merchant platform)
     * @var string
     */
    private $reference;

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
    public function getCountry(): string
    {
        return $this->country;
    }

    /**
     * @param string $country
     */
    public function setCountry(string $country): void
    {
        $this->country = $country;
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
    public function getCustomerId(): string
    {
        return $this->customerId;
    }

    /**
     * @param string $customerId
     */
    public function setCustomerId(string $customerId): void
    {
        $this->customerId = $customerId;
    }

    /**
     * @return string
     */
    public function getProvider(): string
    {
        return $this->provider;
    }

    /**
     * @param string $provider
     */
    public function setProvider(string $provider): void
    {
        $this->provider = $provider;
    }

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



    public function toArray(): array
    {
        return (array)$this;
    }
}