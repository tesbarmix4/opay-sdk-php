<?php


namespace Opay\Payload;


use Opay\Utility\OpayConstants;

class TransactionInitializeRequest extends BaseRequest implements \JsonSerializable
{


    /**
     * Order number of merchant (unique order number from merchant platform)
     * @var string
     */
    protected $reference;

    /**
     * Amount in kobo
     * @var string
     */
    protected $amount;

    /**
     * Currency charge should be performed in. Default is NGN
     * @var string
     */
    protected $currency;

    /**
     * Currency only support Nigeria
     * @var string
     */
    protected $country;

    /**
     * token, bankcard, bankaccount
     * @var string
     */
    protected $payType;

    /**
     * firstName
     * @var string
     */
    protected $reason;

    /**
     * The asynchronous callback address after transaction successful.
     * @var string
     */
    protected $callbackUrl;

    /**
     * Transaction would be closed within specific time. Value is in minute.
     * @var string
     */
    protected $expireAt;

    /**
     * Transaction would be closed within specific time. Value is in minute.
     * @var string
     */
    protected $token;

    /**
     *
     * @var string
     */
    protected $customerPhone;

    /**
     * email
     * @var string
     */
    protected $customerEmail;

    /**
     *
     * @var string
     */
    protected $firstName;

    /**
     *
     * @var string
     */
    protected $lastName;

    /**
     * Bankcard Number
     * @var string
     */
    protected $cardNumber;

    /**
     * Bankcard expired month e.g. 01
     * @var string
     */
    protected $cardDateMonth;

    /**
     * ankcard expired year e.g. 22
     * @var string
     */
    protected $cardDateYear;

    /**
     * Bankcard cvc
     * @var string
     */
    protected $cardCVC;

    /**
     * What page do you need to call back to after 3ds verification is successful
     * @var string
     */
    protected $return3dsUrl;

    /**
     * Bank Account number, needed when payType is bankAccount
     * @var string
     */
    protected $bankAccountNumber;

    /**
     * Bank Code
     * @var string
     */
    protected $bankCode;

    /**
     * Zip code or postal card registered with the card.
     * @var string
     */
    protected $billingZip;

    /**
     * The city registered with the card.
     * @var string
     */
    protected $billingCity;

    /**
     * The house/building address registered with the card.
     * @var string
     */
    protected $billingAddress;

    /**
     * The state registered with the card. e.g. NY for New York, CA for California, etc.
     * @var string
     */
    protected $billingState;

    /**
     * The country registered with the card. e.g. US, CA, AU, etc.
     * @var string
     */
    protected $billingCountry;

    /**
     * bvn
     * @var string
     */
    protected $bvn;

    /**
     * dobDay
     * @var string
     */
    protected $dobDay;

    /**
     * dobMonth
     * @var string
     */
    protected $dobMonth;

    /**
     * dobYear
     * @var string
     */
    protected $dobYear;

    /**
     * @param mixed $reference
     */
    public function setReference($reference): void
    {
        $this->reference = $reference;
    }

    /**
     * @param mixed $amount
     */
    public function setAmount($amount): void
    {
        $this->amount = $amount;
    }

    /**
     * @param mixed $currency
     */
    public function setCurrency($currency): void
    {
        $this->currency = $currency;
    }

    /**
     * @param mixed $country
     */
    public function setCountry($country): void
    {
        $this->country = $country;
    }

    /**
     * @param mixed $payType
     */
    public function setPayType($payType): void
    {
        $this->payType = $payType;
    }

    /**
     * @param mixed $reason
     */
    public function setReason($reason): void
    {
        $this->reason = $reason;
    }

    /**
     * @param mixed $callbackUrl
     */
    public function setCallbackUrl($callbackUrl): void
    {
        $this->callbackUrl = $callbackUrl;
    }

    /**
     * @param mixed $expireAt
     */
    public function setExpireAt($expireAt): void
    {
        if ($expireAt) {
            $this->expireAt = (string)$expireAt;
        } else {
            $this->expireAt = (string)OpayConstants::ORDER_EXPIRY;
        }
    }

    /**
     * @param mixed $token
     */
    public function setToken($token): void
    {
        $this->token = $token;
    }

    /**
     * @param mixed $customerPhone
     */
    public function setCustomerPhone($customerPhone): void
    {
        $this->customerPhone = $customerPhone;
    }

    /**
     * @param mixed $customerEmail
     */
    public function setCustomerEmail($customerEmail): void
    {
        $this->customerEmail = $customerEmail;
    }

    /**
     * @param mixed $firstName
     */
    public function setFirstName($firstName): void
    {
        $this->firstName = $firstName;
    }

    /**
     * @param mixed $lastName
     */
    public function setLastName($lastName): void
    {
        $this->lastName = $lastName;
    }

    /**
     * @param mixed $cardNumber
     */
    public function setCardNumber($cardNumber): void
    {
        $this->cardNumber = $cardNumber;
    }

    /**
     * @param mixed $cardDateMonth
     */
    public function setCardDateMonth($cardDateMonth): void
    {
        $this->cardDateMonth = $cardDateMonth;
    }

    /**
     * @param mixed $cardDateYear
     */
    public function setCardDateYear($cardDateYear): void
    {
        $this->cardDateYear = $cardDateYear;
    }

    /**
     * @param mixed $cardCVC
     */
    public function setCardCVC($cardCVC): void
    {
        $this->cardCVC = $cardCVC;
    }

    /**
     * @param mixed $return3dsUrl
     */
    public function setReturn3dsUrl($return3dsUrl): void
    {
        $this->return3dsUrl = $return3dsUrl;
    }

    /**
     * @param mixed $bankAccountNumber
     */
    public function setBankAccountNumber($bankAccountNumber): void
    {
        $this->bankAccountNumber = $bankAccountNumber;
    }

    /**
     * @param mixed $bankCode
     */
    public function setBankCode($bankCode): void
    {
        $this->bankCode = $bankCode;
    }

    /**
     * @param mixed $billingZip
     */
    public function setBillingZip($billingZip): void
    {
        $this->billingZip = $billingZip;
    }

    /**
     * @param mixed $billingCity
     */
    public function setBillingCity($billingCity): void
    {
        $this->billingCity = $billingCity;
    }

    /**
     * @param mixed $billingAddress
     */
    public function setBillingAddress($billingAddress): void
    {
        $this->billingAddress = $billingAddress;
    }

    /**
     * @param mixed $billingState
     */
    public function setBillingState($billingState): void
    {
        $this->billingState = $billingState;
    }

    /**
     * @param mixed $billingCountry
     */
    public function setBillingCountry($billingCountry): void
    {
        $this->billingCountry = $billingCountry;
    }

    /**
     * @param mixed $bvn
     */
    public function setBvn($bvn): void
    {
        $this->bvn = $bvn;
    }

    /**
     * @param mixed $dobDay
     */
    public function setDobDay($dobDay): void
    {
        $this->dobDay = $dobDay;
    }

    /**
     * @param mixed $dobMonth
     */
    public function setDobMonth($dobMonth): void
    {
        $this->dobMonth = $dobMonth;
    }

    /**
     * @param mixed $dobYear
     */
    public function setDobYear($dobYear): void
    {
        $this->dobYear = $dobYear;
    }

    /**
     * @return string
     */
    public function getReference(): string
    {
        return $this->reference;
    }

    /**
     * @return string
     */
    public function getAmount(): string
    {
        return $this->amount;
    }

    /**
     * @return string
     */
    public function getCurrency(): string
    {
        return $this->currency;
    }

    /**
     * @return string
     */
    public function getCountry(): string
    {
        return $this->country;
    }

    /**
     * @return string
     */
    public function getPayType(): string
    {
        return $this->payType;
    }

    /**
     * @return string
     */
    public function getReason(): string
    {
        return $this->reason;
    }

    /**
     * @return string
     */
    public function getCallbackUrl(): string
    {
        return $this->callbackUrl;
    }

    /**
     * @return string
     */
    public function getExpireAt(): string
    {
        return $this->expireAt;
    }

    /**
     * @return string
     */
    public function getToken(): string
    {
        return $this->token;
    }

    /**
     * @return string
     */
    public function getCustomerPhone(): string
    {
        return $this->customerPhone;
    }

    /**
     * @return string
     */
    public function getCustomerEmail(): string
    {
        return $this->customerEmail;
    }

    /**
     * @return string
     */
    public function getFirstName(): string
    {
        return $this->firstName;
    }

    /**
     * @return string
     */
    public function getLastName(): string
    {
        return $this->lastName;
    }

    /**
     * @return string
     */
    public function getCardNumber(): string
    {
        return $this->cardNumber;
    }

    /**
     * @return string
     */
    public function getCardDateMonth(): string
    {
        return $this->cardDateMonth;
    }

    /**
     * @return string
     */
    public function getCardDateYear(): string
    {
        return $this->cardDateYear;
    }

    /**
     * @return string
     */
    public function getCardCVC(): string
    {
        return $this->cardCVC;
    }

    /**
     * @return string
     */
    public function getReturn3dsUrl(): string
    {
        return $this->return3dsUrl;
    }

    /**
     * @return string
     */
    public function getBankAccountNumber(): string
    {
        return $this->bankAccountNumber;
    }

    /**
     * @return string
     */
    public function getBankCode(): string
    {
        return $this->bankCode;
    }

    /**
     * @return string
     */
    public function getBillingZip(): string
    {
        return $this->billingZip;
    }

    /**
     * @return string
     */
    public function getBillingCity(): string
    {
        return $this->billingCity;
    }

    /**
     * @return string
     */
    public function getBillingAddress(): string
    {
        return $this->billingAddress;
    }

    /**
     * @return string
     */
    public function getBillingState(): string
    {
        return $this->billingState;
    }

    /**
     * @return string
     */
    public function getBillingCountry(): string
    {
        return $this->billingCountry;
    }

    /**
     * @return string
     */
    public function getBvn(): string
    {
        return $this->bvn;
    }

    /**
     * @return string
     */
    public function getDobDay(): string
    {
        return $this->dobDay;
    }

    /**
     * @return string
     */
    public function getDobMonth(): string
    {
        return $this->dobMonth;
    }

    /**
     * @return string
     */
    public function getDobYear(): string
    {
        return $this->dobYear;
    }


    public function jsonSerialize(): array
    {
        return $this->sort([
            'reference' => $this->reference,
            'amount' => $this->amount,
            'currency' => $this->currency,
            'country' => $this->country,
            'payType' => $this->payType,
            'reason' => $this->reason,
            'callbackUrl' => $this->callbackUrl,
            'expireAt' => $this->expireAt,
            'token' => $this->token,
            'customerPhone' => $this->customerPhone,
            'customerEmail' => $this->customerEmail,
            'firstName' => $this->firstName,
            'lastName' => $this->lastName,
            'cardNumber' => $this->cardNumber,
            'cardDateMonth' => $this->cardDateMonth,
            'cardDateYear' => $this->cardDateYear,
            'cardCVC' => $this->cardCVC,
            'return3dsUrl' => $this->return3dsUrl,
            'bankAccountNumber' => $this->bankAccountNumber,
            'bankCode' => $this->bankCode,
            'billingZip' => $this->billingZip,
            'billingCity' => $this->billingCity,
            'billingAddress' => $this->billingAddress,
            'billingState' => $this->billingState,
            'billingCountry' => $this->billingCountry,
            'bvn' => $this->bvn,
            'dobDay' => $this->dobDay,
            'dobMonth' => $this->dobMonth,
            'dobYear' => $this->dobYear,
        ]);
    }
}