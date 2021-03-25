<?php

require_once('../Initialize.php');
require_once('../Config.php');
require_once('./Transaction.php');


class TestTransaction
{
    private $transaction;

    public function __construct()
    {
        $this->transaction = new Transaction();
    }

    public function test()
    {
        $count = 0;
        /**
         * One of three options
         *
         * $response = $this->transaction->initByBankaccount();
         * $response = $this->transaction->initByBankcard();
         * $response = $this->transaction->initByToken();
         */
        $response = $this->transaction->initByBankaccount();
        START:
        if ($response->getCode() == '00000') {
            switch ($response->getData()->getStatus()) {
                case 'INITIAL':
                case 'PENDING':
                {
                    $response = $this->transaction->getStatus();
                    goto START;
                }

                case 'INPUT-PIN':
                {
                    $response = $this->transaction->setPin();
                    goto START;
                }
                case 'INPUT-OTP':
                {
                    $response = $this->transaction->setOtp();
                    goto START;
                }
                case 'INPUT-PHONE':
                {
                    $response = $this->transaction->setPhone();
                    goto START;
                }
                case 'INPUT-DOB':
                {
                    $response = $this->transaction->setDob();
                    goto START;
                }
                case '3DSECURE'://有次数限制
                {
                    if ($count >= 10) {
                        break;
                    }
                    $response = $this->transaction->getStatus();
                    $count++;
                    goto START;
                }
                case 'FAIL':
                case 'CLOSE':
                case 'SUCCESS':
                {
                    break;
                }
            }

            dump($response);
        } else {
            dump($response->getMessage());
        }

    }
}

(new TestTransaction())->test();