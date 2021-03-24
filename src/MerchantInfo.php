<?php

namespace Opay;

use GuzzleHttp\RequestOptions;
use Opay\Result\InfoUserCreateResponse;
use Opay\Result\InfoUserResponse;
use Opay\Result\InfoUserSendOtpResponse;
use Opay\Result\InfoUserUpdateResponse;
use Opay\Result\Response;

class MerchantInfo extends Merchant
{

    private $userSendOtpData;
    private $userCreateData;
    private $userData;
    private $userUpdateData;
    private $merchantData;


    /**
     * MerchantInfo constructor.
     * @param string $environmentBaseUrl
     * @param string $pbKey
     * @param string $pvKey
     * @param string $merchantId
     * @param array|null $proxyAddress
     */
    public function __construct(string $environmentBaseUrl, string $pbKey, string $pvKey, string $merchantId, ?array $proxyAddress = null)
    {
        parent::__construct($environmentBaseUrl, $pbKey, $pvKey, $merchantId, $proxyAddress);
    }


    public function userSendOtp(): Response
    {
        $_signature = hash_hmac('sha512', json_encode($this->userSendOtpData), $this->privateKey);
        $response = $this->networkClient->post("/v3/info/user/sendOTP", $this->buildRequestOptions([
            RequestOptions::JSON => $this->userSendOtpData,
            RequestOptions::HEADERS => [
                'Authorization' => 'Bearer ' . $_signature,
                'MerchantId' => $this->merchantId
            ]
        ]));
        return InfoUserSendOtpResponse::cast(new InfoUserSendOtpResponse, json_decode($response->getBody()->getContents(), false));
    }


    public function userCreate(): Response
    {
        $response = $this->networkClient->post("/v3/info/user/create", $this->buildRequestOptions([
            RequestOptions::JSON => $this->userCreateData,
            RequestOptions::HEADERS => [
                'Authorization' => 'Bearer ' . $this->publicKey,
                'MerchantId' => $this->merchantId
            ]
        ]));
        return InfoUserCreateResponse::cast(new InfoUserCreateResponse, json_decode($response->getBody()->getContents(), false));
    }


    public function user(): Response
    {
        $response = $this->networkClient->post("/v3/info/user", $this->buildRequestOptions([
            RequestOptions::JSON => $this->userData,
            RequestOptions::HEADERS => [
                'Authorization' => 'Bearer ' . $this->publicKey,
                'MerchantId' => $this->merchantId
            ]
        ]));
        return InfoUserResponse::cast(new InfoUserResponse, json_decode($response->getBody()->getContents(), false));
    }


    public function userUpdate(): Response
    {
        $_signature = hash_hmac('sha512', json_encode($this->userUpdateData), $this->privateKey);
        $response = $this->networkClient->post("/v3/info/user/update", $this->buildRequestOptions([
            RequestOptions::JSON => $this->userUpdateData,
            RequestOptions::HEADERS => [
                'Authorization' => 'Bearer ' . $_signature,
                'MerchantId' => $this->merchantId
            ]
        ]));
        return InfoUserUpdateResponse::cast(new InfoUserUpdateResponse, json_decode($response->getBody()->getContents(), false));
    }


    public function merchant(): Response
    {
        $response = $this->networkClient->post("/v3/info/merchant", $this->buildRequestOptions([
            RequestOptions::JSON => $this->merchantData,
            RequestOptions::HEADERS => [
                'Authorization' => 'Bearer ' . $this->publicKey,
                'MerchantId' => $this->merchantId
            ]
        ]));
        return InfoUserResponse::cast(new InfoUserResponse, json_decode($response->getBody()->getContents(), false));
    }

    /**
     * @return mixed
     */
    public function getUserSendOtpData()
    {
        return $this->userSendOtpData;
    }

    /**
     * @param mixed $userSendOtpData
     */
    public function setUserSendOtpData($userSendOtpData): void
    {
        $this->userSendOtpData = $userSendOtpData;
    }

    /**
     * @return mixed
     */
    public function getUserCreateData()
    {
        return $this->userCreateData;
    }

    /**
     * @param mixed $userCreateData
     */
    public function setUserCreateData($userCreateData): void
    {
        $this->userCreateData = $userCreateData;
    }

    /**
     * @return mixed
     */
    public function getUserData()
    {
        return $this->userData;
    }

    /**
     * @param mixed $userData
     */
    public function setUserData($userData): void
    {
        $this->userData = $userData;
    }

    /**
     * @return mixed
     */
    public function getUserUpdateData()
    {
        return $this->userUpdateData;
    }

    /**
     * @param mixed $userUpdateData
     */
    public function setUserUpdateData($userUpdateData): void
    {
        $this->userUpdateData = $userUpdateData;
    }

    /**
     * @return mixed
     */
    public function getMerchantData()
    {
        return $this->merchantData;
    }

    /**
     * @param mixed $merchantData
     */
    public function setMerchantData($merchantData): void
    {
        $this->merchantData = $merchantData;
    }

}