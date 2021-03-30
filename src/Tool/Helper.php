<?php

namespace Opay\Tool;

trait Helper
{
    public function sort($array): array
    {
        if (!is_array($array) || empty($array)) {
            return $array;
        }
        ksort($array);
        foreach ($array as $key => $val) {
            if (is_array($val)) {
                $array[$key] = $this->sort($val);
            }
        }
        return $array;
    }

    public function check($secret, $signature, $amount, $currency, $reference, $refunded, $status, $timestamp, $token, $transactionID, $method = 'SHA3-512'): bool
    {
        $str = '{Amount:"' . $amount . '",Currency:"' . $currency . '",Reference:"' . $reference . '",Refunded:' . $refunded . ',Status:"' . $status . '",Timestamp:"' . $timestamp . '",Token:"' . $token . '",TransactionID:"' . $transactionID . '"}';
        $_signature = hash_hmac($method, $str, $secret);
        if ($signature == $_signature) {
            return true;
        }
        return false;
    }

    public function checkCallbackSignature($payload, $secret, $method = 'SHA3-512'): bool
    {
        $_payload = $payload['payload'];
        return $this->check($secret, $payload['sha512'], $_payload['amount'], $_payload['currency'], $_payload['reference'], $_payload['refunded'] ? 't' : 'f', $_payload['status'], $_payload['timestamp'], $_payload['token'], $_payload['transactionId'], $method);
    }
}