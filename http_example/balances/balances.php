<?php
require_once('../init.php');

use Opay\Payload\BalancesRequest;

$merchantBalances->setBalancesData(new BalancesRequest());
$response = $merchantBalances->balances();

dump("status : ". $response->getCode());

if($response->getCode() === "00000") {
    dump($response->getData());
} else {
    dump($response);
}