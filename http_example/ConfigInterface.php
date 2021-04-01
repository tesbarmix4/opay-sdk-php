<?php

interface ConfigInterface
{
    public function getHostBaseUrl();

    public function getEndpointBaseUrl();

    public function getPubKey();

    public function getPrvKey();

    public function getMerchantId();
}