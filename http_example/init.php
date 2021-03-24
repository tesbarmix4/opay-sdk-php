<?php
session_start();
require_once __DIR__ . '/../vendor/autoload.php';

use Opay\MerchantBalances;
use Opay\MerchantCashier;
use Opay\MerchantTransaction;
use Opay\MerchantTransfer;

$reference = "test_2019122709408400"; // update/change this when creating a new order
$hostBaseUrl = "https://1da67619a3b4.ngrok.io";
$orderNumberInSession = isset($_SESSION['orderNumberInSession']) ? $_SESSION['orderNumberInSession'] : null;

$endpointBaseUrl = 'http://sandbox-cashierapi.opayweb.com';
$pubKey = 'OPAYPUBxxxxxxxxxxxxx.xxxxxxxxxxxxx';
$prvKey = 'OPAYPRVxxxxxxxxxxxxx.xxxxxxxxxxxxx';
$merchantId = '256620xxxxxxxxxxxxx';


$merchantCashier = new MerchantCashier($endpointBaseUrl, $pubKey, $prvKey, $merchantId);
$merchantTransfer = new MerchantTransfer($endpointBaseUrl, $pubKey, $prvKey, $merchantId);
$merchantBalances = new MerchantBalances($endpointBaseUrl, $pubKey, $prvKey, $merchantId);
$merchantTransaction = new MerchantTransaction($endpointBaseUrl, $pubKey, $prvKey, $merchantId);
