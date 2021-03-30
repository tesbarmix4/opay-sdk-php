<?php


namespace Opay\Payload;


class BillsBulkBillsRequest extends BaseRequest implements \JsonSerializable
{

    /**
     * ServiceType for topup, could be betting, airtime
     * @var string
     */
    private $serviceType;

    /**
     * Callback Url for successful transaction notification
     * @var string
     */
    private $callBackUrl;

    /**
     * @var array
     */
    private $bulkData;

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
    public function getCallBackUrl(): string
    {
        return $this->callBackUrl;
    }

    /**
     * @param string $callBackUrl
     */
    public function setCallBackUrl(string $callBackUrl): void
    {
        $this->callBackUrl = $callBackUrl;
    }

    /**
     * @return array
     */
    public function getBulkData(): array
    {
        return $this->bulkData;
    }

    /**
     * @param array $bulkData
     */
    public function setBulkData(array $bulkData): void
    {
        $this->bulkData = $bulkData;
    }

    public function jsonSerialize(): array
    {
        return $this->sort([
            'bulkData' => $this->bulkData,
            'callBackUrl' => $this->callBackUrl,
            'serviceType' => $this->serviceType
        ]);
    }
}