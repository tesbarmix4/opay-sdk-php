<?php


namespace Opay\Payload;


use Opay\Utility\OpayConstants;

class EgyptTransactionCreateRequest extends BaseRequest implements \JsonSerializable
{

    protected $reference;

    protected $amountTotal;

    protected $amountCurrency;

    protected $productName;

    protected $productDescription;

    protected $returnUrl;

    protected $callbackUrl;

    protected $userClientIP;

    protected $remark;

    /**
     * @return mixed
     */
    public function getReference()
    {
        return $this->reference;
    }

    /**
     * @param mixed $reference
     */
    public function setReference($reference): void
    {
        $this->reference = $reference;
    }

    /**
     * @return mixed
     */
    public function getAmountTotal()
    {
        return $this->amountTotal;
    }

    /**
     * @param mixed $amountTotal
     */
    public function setAmountTotal($amountTotal): void
    {
        $this->amountTotal = $amountTotal;
    }

    /**
     * @return mixed
     */
    public function getAmountCurrency()
    {
        return $this->amountCurrency;
    }

    /**
     * @param mixed $amountCurrency
     */
    public function setAmountCurrency($amountCurrency): void
    {
        $this->amountCurrency = $amountCurrency;
    }

    /**
     * @return mixed
     */
    public function getProductName()
    {
        return $this->productName;
    }

    /**
     * @param mixed $productName
     */
    public function setProductName($productName): void
    {
        $this->productName = $productName;
    }

    /**
     * @return mixed
     */
    public function getProductDescription()
    {
        return $this->productDescription;
    }

    /**
     * @param mixed $productDescription
     */
    public function setProductDescription($productDescription): void
    {
        $this->productDescription = $productDescription;
    }

    /**
     * @return mixed
     */
    public function getReturnUrl()
    {
        return $this->returnUrl;
    }

    /**
     * @param mixed $returnUrl
     */
    public function setReturnUrl($returnUrl): void
    {
        $this->returnUrl = $returnUrl;
    }

    /**
     * @return mixed
     */
    public function getCallbackUrl()
    {
        return $this->callbackUrl;
    }

    /**
     * @param mixed $callbackUrl
     */
    public function setCallbackUrl($callbackUrl): void
    {
        $this->callbackUrl = $callbackUrl;
    }

    /**
     * @return mixed
     */
    public function getUserClientIP()
    {
        return $this->userClientIP;
    }

    /**
     * @param mixed $userClientIP
     */
    public function setUserClientIP($userClientIP): void
    {
        $this->userClientIP = $userClientIP;
    }

    /**
     * @return mixed
     */
    public function getRemark()
    {
        return $this->remark;
    }

    /**
     * @param mixed $remark
     */
    public function setRemark($remark): void
    {
        $this->remark = $remark;
    }


    public function jsonSerialize(): array
    {
        return $this->sort([
            'reference' => $this->reference,
            'amount' => [
                'total' => $this->amountTotal,
                'currency' => $this->amountCurrency,
            ],
            'product' => [
                'name' => $this->productName,
                'description' => $this->productDescription
            ],
            'returnUrl' => $this->returnUrl,
            'callbackUrl' => $this->callbackUrl,
            'userClientIP' => $this->userClientIP,
            'remark' => $this->remark,
        ]);
    }
}