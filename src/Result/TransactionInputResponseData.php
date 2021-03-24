<?php


namespace Opay\Result;


class TransactionInputResponseData
{
    /**
     * Order number from OPay payment
     * @var string
     */
    protected $orderNo;

    /**
     * Order number of merchant (unique order number from merchant platform)
     * @var string
     */
    protected $reference;

    /**
     * INITIAL
     * PENDING
     * SUCCESS
     * FAIL
     * INPUT-PIN
     * INPUT-OTP
     * INPUT-PHONE
     * INPUT-DOB
     * 3DSECURE
     * CLOSE
     * @var string
     */
    protected $status;

    /**
     * Only returned when tokenize is true
     * @var string
     */
    protected $token;

    /**
     *
     * @var string
     */
    protected $authURL;

    /**
     * failureReason
     * @var string
     */
    protected $failureReason;


    /**
     * @return string
     */
    public function getOrderNo(): string
    {
        return $this->orderNo;
    }

    /**
     * @param string $orderNo
     */
    public function setOrderNo(string $orderNo): void
    {
        $this->orderNo = $orderNo;
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

    /**
     * @return string
     */
    public function getStatus(): string
    {
        return $this->status;
    }

    /**
     * @param string $status
     */
    public function setStatus(string $status): void
    {
        $this->status = $status;
    }

    /**
     * @return string
     */
    public function getToken(): string
    {
        return $this->token;
    }

    /**
     * @param string $token
     */
    public function setToken(string $token): void
    {
        $this->token = $token;
    }

    /**
     * @return string
     */
    public function getAuthURL(): string
    {
        return $this->authURL;
    }

    /**
     * @param string $authURL
     */
    public function setAuthURL(string $authURL): void
    {
        $this->authURL = $authURL;
    }

    /**
     * @return string
     */
    public function getFailureReason(): string
    {
        return $this->failureReason;
    }

    /**
     * @param string $failureReason
     */
    public function setFailureReason(string $failureReason): void
    {
        $this->failureReason = $failureReason;
    }


}