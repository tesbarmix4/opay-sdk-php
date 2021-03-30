<?php


namespace Opay\Payload;


class BankTransferRequest extends BaseRequest implements \JsonSerializable
{

    private $reference;
    private $amount;
    private $currency;
    private $country;
    private $receiverName;
    private $receiverBankCode;
    private $receiverBankAccountNumber;
    private $reason;

    public function __construct(string $reference, int $amount, string $currency, string $country,
                                string $receiverName, string $receiverBankCode,
                                string $receiverBankAccountNumber, string $reason)
    {
        $this->reference = $reference;
        $this->amount = $amount;
        $this->currency = $currency;
        $this->country = $country;
        $this->receiverName = $receiverName;
        $this->receiverBankCode = $receiverBankCode;
        $this->receiverBankAccountNumber = $receiverBankAccountNumber;
        $this->reason = $reason;
    }

    public function jsonSerialize(): array
    {
        return $this->sort([
            'country' => $this->country,
            'amount' => (string)$this->amount,
            'currency' => $this->currency,
            'reason' => $this->reason,
            'receiver' => [
                'bankCode' => $this->receiverBankCode,
                'bankAccountNumber' => $this->receiverBankAccountNumber,
                'name' => $this->receiverName
            ],
            'reference' => $this->reference
        ]);
    }
}