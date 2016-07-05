# Omnipay: Creditcall

**Creditcall gateway for the Omnipay PHP payment processing library**

[![Latest Version on Packagist](https://img.shields.io/packagist/v/stevewinni/omnipay-creditcall.svg?style=flat-square)](https://packagist.org/packages/stevewinni/omnipay-creditcall)
[![Software License](https://img.shields.io/badge/license-MIT-brightgreen.svg?style=flat-square)](LICENSE.md)
[![Build Status](https://img.shields.io/travis/stevewinni/omnipay-creditcall/master.svg?style=flat-square)](https://travis-ci.org/stevewinni/omnipay-creditcall)
[![Total Downloads](https://img.shields.io/packagist/dt/stevewinni/omnipay-creditcall.svg?style=flat-square)](https://packagist.org/packages/stevewinni/omnipay-creditcall)


[Omnipay](https://github.com/thephpleague/omnipay) is a framework agnostic, multi-gateway payment
processing library for PHP 5.3+. This package implements Creditcall support for Omnipay.

## Install

Via Composer

``` bash
$ composer require stevewinni/omnipay-creditcall
```

## Usage

The following gateways are provided by this package:

 * Creditcall

For general usage instructions, please see the main [Omnipay](https://github.com/thephpleague/omnipay) repository.

This driver supports following transaction types:

- authorize($options) - authorize an amount on the customer's card
- capture($options) - capture an amount you have previously authorized
- purchase($options) - authorize and immediately capture an amount on the customer's card
- refund($options) - refund an already processed transaction
- void($options) - generally can only be called up to 24 hours after submitting a transaction

Gateway instantiation:

    $gateway = Omnipay::create('Creditcall');
    $gateway->setTerminalId('1234567');
    $gateway->setTransactionKey('5CbEvA8hDCe6ASd6');
    $gateway->setTestMode(true);

Driver also supports paying with `cardReference` instead of `card`, 
but gateway requires also additional parameter `cardHash`. It can be used in authorize and purchase requests like that:

    $gateway->purchase([
        'amount'        => '10.00',
        'cardReference' => 'abc',
        'cardHash'      => 'def123',
    ]);

## Support

If you are having general issues with Omnipay, we suggest posting on
[Stack Overflow](http://stackoverflow.com/). Be sure to add the
[omnipay tag](http://stackoverflow.com/questions/tagged/omnipay) so it can be easily found.

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.
