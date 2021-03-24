## OPay Payment v3

![](https://github.com/actions/opay-merchant-cashier-php/workflows/.github/workflows/php.yml/badge.svg)

PHP Library that wraps endpoints documented [https://documentation.opayweb.com/](https://documentation.opayweb.com/)

##### Services available for merchants includes and not limited to:
- Cashier/Checkout - Get Paid with OPay
- Bank Transfer - Send money to any Nigerian bank account(s)
- OPay wallet Transfer - Send money to OPay USER/MERCHANT seamlessly

#### Installation:
```sh
$ composer require opay/merchant-cashier-php
```

#### Setup:
You need the library initialized as follows: (example in [http_example/init.php](http_example/init.php) file)
```php
use Opay\MerchantCashier;
use Opay\MerchantTransfer;

$endpointBaseUrl = 'http://sandbox-cashierapi.opayweb.com';
$pubKey = 'OPAYPUBxxxxxxxxxxxxx.xxxxxxxxxxxxx';
$prvKey = 'OPAYPRVxxxxxxxxxxxxx.xxxxxxxxxxxxx';
$merchantId = '256620xxxxxxxxxxxxx';

$merchantCashier = new MerchantCashier("environment-endpoint-url", "Public_Key", "Private_Key",   "your-merchant-id");
$merchantTransfer = new MerchantTransfer("environment-endpoint-url", "Public_Key", "Private_Key",   "your-merchant-id");
```
#### Examples:
Access sample codes & implementations right inside the `http_example` folder

##### Accept Payment
- initiate: [http_example/accept_payment/order.php](http_example/accept_payment/order.php)
- status query: [http_example/accept_payment/order_status.php](http_example/accept_payment/order_status.php)
- cancel payment: [http_example/accept_payment/order_cancel.php](http_example/accept_payment/order_cancel.php)
- handling payment callback: [http_example/accept_payment/callback.php](http_example/accept_payment/callback.php)

##### Transfer
###### Bank
- Get supported countries: [http_example/transfer/bank/get_countries.php](http_example/transfer/bank/get_countries.php)
- Get supported banks: [http_example/transfer/bank/get_banks.php](http_example/transfer/bank/get_banks.php)
- validate a bank account: [http_example/transfer/bank/validate_account.php](http_example/transfer/bank/validate_account.php)
- Initiate transfer: [http_example/transfer/bank/initiate.php](http_example/transfer/bank/initiate.php)
- status query: [http_example/transfer/bank/order_status.php](http_example/transfer/bank/order_status.php)

###### Opay Wallet
- validate a user/customer: [http_example/transfer/wallet/validate_user.php](http_example/transfer/wallet/validate_user.php)
- validate a merchant: [http_example/transfer/wallet/validate_merchant.php](http_example/transfer/wallet/validate_merchant.php)
- Initiate transfer: [http_example/transfer/wallet/initiate.php](http_example/transfer/wallet/initiate.php)
- status query: [http_example/transfer/wallet/order_status.php](http_example/transfer/wallet/order_status.php)

##### Charge
- Initialize a charge transaction: [http_example/charge/initialize.php](http_example/charge/initialize.php)
- Enquiry a charge transaction's status: [http_example/charge/status.php](http_example/charge/status.php)

##### Balances
- Query your all accounts' balances : [http_example/balances/balances.php](http_example/balances/balances.php)

##### Transaction
- Initialize a transaction : [http_example/transaction/initialize.php](http_example/transaction/initialize.php)
- Submit OTP to complete transaction : [http_example/transaction/input-otp.php](http_example/transaction/input-otp.php)
- Submit phone when requested to complete transaction : [http_example/transaction/input-phone.php](http_example/transaction/input-phone.php)
- Submit pin when requested to complete transaction : [http_example/transaction/input-pin.php](http_example/transaction/input-pin.php)
- Submit dob when requested to complete transaction : [http_example/transaction/input-dob.php](http_example/transaction/input-dob.php)
- Get transaction status : [http_example/transaction/status.php](http_example/transaction/status.php)
- Get support bank code before requested to commit transaction pay by bankaccount : [http_example/transaction/banks.php](http_example/transaction/status.php)
- Initialize a bankTransfer transaction : [http_example/transaction/bank_transfer/initialize.php](http_example/transaction/bank_transfer/initialize.php)
- Query a bankTransfer transaction's status : [http_example/transaction/bank_transfer/status.php](http_example/transaction/bank_transfer/status.php)
- Initialize a ussd transaction : [http_example/transaction/ussd/initialize.php](http_example/transaction/ussd/initialize.php)
- Query a ussd transaction's status : [http_example/transaction/ussd/status.php](http_example/transaction/ussd/status.php)

##### Betting/Airtime Topup
- betting-providers : [http_example/bills/betting-providers.php](http_example/bills/betting-providers.php)
- Validate the customerId in specific provider : [http_example/bills/validate.php](http_example/bills/validate.php)
- Initiate a betting/airtime topup transaction : [http_example/bills/bulk-bills.php](http_example/bills/bulk-bills.php)
- Initialize a betting topup transaction status inquiry : [http_example/bills/bulk-status.php](http_example/bills/bulk-status.php)



##### Need Help? Feel free to open an issue.