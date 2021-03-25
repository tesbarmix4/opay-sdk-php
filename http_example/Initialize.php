<?php
require_once __DIR__ . '/../vendor/autoload.php';

use Opay\MerchantBalances;
use Opay\MerchantCashier;
use Opay\MerchantTransaction;
use Opay\MerchantTransfer;

class Initialize
{
    private $reference = ''; // update/change this when creating a new order
    private $orderNumber = '';
    protected $config;

    public function __construct(ConfigInterface $config)
    {
        $this->reference = $this->getGenerateReference();
        $this->config = $config;
    }

    protected function getGenerateReference(): string
    {
        return 'test_' . date('YmdHis') . rand(10000, 99999);
    }

    protected function getUserIP(): string
    {
        if (isset($_SERVER['HTTP_CLIENT_IP']))
            $ipaddress = $_SERVER['HTTP_CLIENT_IP'];
        else if (isset($_SERVER['HTTP_X_FORWARDED_FOR']))
            $ipaddress = $_SERVER['HTTP_X_FORWARDED_FOR'];
        else if (isset($_SERVER['HTTP_X_FORWARDED']))
            $ipaddress = $_SERVER['HTTP_X_FORWARDED'];
        else if (isset($_SERVER['HTTP_X_CLUSTER_CLIENT_IP']))
            $ipaddress = $_SERVER['HTTP_X_CLUSTER_CLIENT_IP'];
        else if (isset($_SERVER['HTTP_FORWARDED_FOR']))
            $ipaddress = $_SERVER['HTTP_FORWARDED_FOR'];
        else if (isset($_SERVER['HTTP_FORWARDED']))
            $ipaddress = $_SERVER['HTTP_FORWARDED'];
        else if (isset($_SERVER['REMOTE_ADDR']))
            $ipaddress = $_SERVER['REMOTE_ADDR'];
        else
            $ipaddress = 'UNKNOWN';
        return $ipaddress;
    }

    /**
     * @return string
     */
    protected function getReference(): string
    {
        return $this->reference;
    }

    /**
     * @param string $reference
     */
    protected function setReference(string $reference): void
    {
        $this->reference = $reference;
    }

    /**
     * @return string
     */
    protected function getOrderNumber(): string
    {
        return $this->orderNumber;
    }

    /**
     * @param string $orderNumber
     */
    protected function setOrderNumber(string $orderNumber): void
    {
        $this->orderNumber = $orderNumber;
    }

    /**
     * @return ConfigInterface
     */
    protected function getConfig(): ConfigInterface
    {
        return $this->config;
    }

    /**
     * @param ConfigInterface $config
     */
    protected function setConfig(ConfigInterface $config): void
    {
        $this->config = $config;
    }



}