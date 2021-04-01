## OPay Payment v3

![](https://github.com/actions/opay-merchant-cashier-php/workflows/.github/workflows/php.yml/badge.svg)

PHP Library that wraps endpoints documented [https://documentation.opayweb.com/](https://documentation.opayweb.com/)

##### Services available for merchants includes and not limited to:
- Cashier/Checkout - Get Paid with OPay
- Bank Transfer - Send money to any Nigerian bank account(s)
- OPay wallet Transfer - Send money to OPay USER/MERCHANT seamlessly

#### Installation:
```sh
$ composer require opay-services/opay-sdk-php
```

#### Setup:
You need the library initialized as follows: (example in [http_example/Config.php](http_example/Config.php) file)
```php
/**
 * init config file
 */
 
class Config implements ConfigInterface
{
    private $endpointBaseUrl = 'http://sandbox-cashierapi.opayweb.com';
    private $pubKey = 'OPAYPUBxxxxxxxxxxxxx.xxxxxxxxxxxxx';
    private $prvKey = 'OPAYPRVxxxxxxxxxxxxx.xxxxxxxxxxxxx';
    private $merchantId = '256620xxxxxxxxxxxxx';
}


(new TestTransaction())->test();
```
#### Examples:
Access sample codes & implementations right inside the [http_example](`http_example`) folder

##### Cashier
- cashier example: [http_example/cashier/Cashier.php](http_example/cashier/Cashier.php)
- handling payment callback: [http_example/cashier/CashierCallback.php](http_example/cashier/CashierCallback.php)

##### Transfer

###### Basic information
- Get supported countries、banks: [http_example/miscellaneous/Miscellaneous.php](http_example/miscellaneous/Miscellaneous.php)
- Validate a user/customer: [http_example/info/user/InfoUser.php](http_example/info/user/InfoUser.php)
- Validate a merchant: [http_example/info/merchant/InfoMerchant.php](http_example/info/merchant/InfoMerchant.php)

###### transfer
- Transfer to OPay wallet: [http_example/transfer/wallet/TransferToWallet.php](http_example/transfer/wallet/TransferToWallet.php)
- Batch transfer to OPay wallet: [http_example/transfer/batch_to_wallet/TransferBatchToWallet.php](http_example/transfer/batch_to_wallet/TransferBatchToWallet.php)
- Transfer to Bank: [http_example/transfer/bank/TransferToBank.php](http_example/transfer/bank/TransferToBank.php)
- Batch transfer to Bank: [http_example/transfer/batch_to_bank/TransferBatchToBank.php](http_example/transfer/batch_to_bank/TransferBatchToBank.php)

##### Charge
- Charge transaction: [http_example/charge/Charge.php](http_example/charge/Charge.php)

##### Balances
- Query your all accounts' balances : [http_example/balances/Balances.php](http_example/balances/Balances.php)


##### Transaction
- Transaction test : [http_example/transaction/TestTransaction.php](http_example/transaction/TestTransaction.php)
- Transaction example : [http_example/transaction/html/initialize.html](http_example/transaction/html/initialize.html)
- BankTransfer transaction : [http_example/transaction/bank_transfer/BankTransfer.php](http_example/transaction/bank_transfer/BankTransfer.php)
- Ussd transaction : [http_example/transaction/ussd/Ussd.php](http_example/transaction/ussd/Ussd.php)


##### Betting/Airtime Topup
- Example : [http_example/bills/Bills.php](http_example/bills/Bills.php)


##### Need Help? Feel free to open an issue.