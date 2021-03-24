<?php


namespace Opay\Result;


use stdClass;

class BillsBettingProvidersResponseData
{
    private $provider;
    private $providerLogoUrl;
    private $minAmount;
    private $maxAmount;

    public static function cast(BillsBettingProvidersResponseData $destination, ?stdClass $source): BillsBettingProvidersResponseData
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
     * @return mixed
     */
    public function getProvider()
    {
        return $this->provider;
    }

    /**
     * @param mixed $provider
     */
    public function setProvider($provider): void
    {
        $this->provider = $provider;
    }

    /**
     * @return mixed
     */
    public function getProviderLogoUrl()
    {
        return $this->providerLogoUrl;
    }

    /**
     * @param mixed $providerLogoUrl
     */
    public function setProviderLogoUrl($providerLogoUrl): void
    {
        $this->providerLogoUrl = $providerLogoUrl;
    }

    /**
     * @return mixed
     */
    public function getMinAmount()
    {
        return $this->minAmount;
    }

    /**
     * @param mixed $minAmount
     */
    public function setMinAmount($minAmount): void
    {
        $this->minAmount = $minAmount;
    }

    /**
     * @return mixed
     */
    public function getMaxAmount()
    {
        return $this->maxAmount;
    }

    /**
     * @param mixed $maxAmount
     */
    public function setMaxAmount($maxAmount): void
    {
        $this->maxAmount = $maxAmount;
    }


}