<?php


namespace Opay\Payload;


class BillsValidateRequest extends BaseRequest implements \JsonSerializable
{

    /**
     * betting
     * @var string
     */
    private $serviceType;

    /**
     * provider returned in betting-providers
     * @var string
     */
    private $provider;

    /**
     * benificiency's customerId in specific provider
     * @var string
     */
    private $customerId;

    /**
     * @return string
     */
    public function getServiceType(): string
    {
        return $this->serviceType;
    }

    /**
     * @param string $serviceType
     */
    public function setServiceType(string $serviceType): void
    {
        $this->serviceType = $serviceType;
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


    public function jsonSerialize(): array
    {
        return $this->sort([
            'serviceType' => $this->serviceType,
            'provider' => $this->provider,
            'customerId' => $this->customerId
        ]);
    }
}