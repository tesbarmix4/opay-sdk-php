<?php


namespace Opay\Payload;


class BillsBulkStatusRequest extends BaseRequest implements \JsonSerializable
{

    /**
     * betting
     * @var string
     */
    private $serviceType;

    /**
     * @var array
     */
    private $bulkStatusRequest;

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
     * @return array
     */
    public function getBulkStatusRequest(): array
    {
        return $this->bulkStatusRequest;
    }

    /**
     * @param array $bulkStatusRequest
     */
    public function setBulkStatusRequest(array $bulkStatusRequest): void
    {
        $this->bulkStatusRequest = $bulkStatusRequest;
    }

    public function jsonSerialize(): array
    {
        return $this->sort([
            'serviceType' => $this->serviceType,
            'bulkStatusRequest' => $this->bulkStatusRequest
        ]);
    }
}