=== BTCPay for WooCommerce ===
Contributors: Kukks
Tags: bitcoin,cryptocurrency,bitpay,btcpay,btcpayservice,litecoin,changelly,payments
Requires at least: 3.9
Tested up to: 4.9.8
Requires PHP: 5.4
Stable tag: master
License: MIT
License URI: https://github.com/btcpayserver/woocommerce-plugin/blob/master/LICENSE

BTCPay Server is a free and open-source cryptocurrency payment processor which allows you to receive payments in Bitcoin and altcoins directly, with no fees, transaction cost or a middleman.
This plugin is a fork of  https://github.com/bitpay/woocommerce-plugin which in turn is a fork of https://github.com/jaafit/bitpayWoocommerce

== Description ==
BTCPay Server is a free and open-source cryptocurrency payment processor which allows you to receive payments in Bitcoin and altcoins directly, with no fees, transaction cost or a middleman.

BTCPay is a non-custodial invoicing system which eliminates the involvement of a third-party. Payments with BTCPay go directly to your wallet, which increases the privacy and security. Your private keys are never uploaded to the server. There is no address re-use since each invoice generates a new address deriving from your xpubkey.

You can run BTCPay as a self-hosted solution on your own server, or use a third-party host.

The self-hosted solution allows you not only to attach an unlimited number of stores and use the Lightning Network but also become the payment processor for others.

If you previosly used BitPay's plugin, you can very easily migrate and use BTCPay.

This plugin is a fork of https://github.com/bitpay/woocommerce-plugin which in turn is a fork of https://github.com/jaafit/bitpayWoocommerce. We have modified the plugin in order to support alternative bitpay compliant servers and enhance usability and functionality. This plugin should be able to run alongside the original bitpay plugin. 

== Installation ==
This plugin requires Woocommerce. Please make sure you have Woocommerce installed.

<img src="https://github.com/btcpayserver/btcpayserver-doc/blob/master/img/BTCPayWooCommerceInfoggraphic.png" alt="Infographic" />

To integrate BTCPay Server into an existing WooCommerce store, follow the steps below.

## 1. Install BTCPay WooCommerce Plugin

## 2. Deploy BTCPay Server

To launch your BTCPay server, you can self-host it, or use a third party host.

### 2.1 Self-hosted BTCPay

There are various ways to [launch a self-hosted BTCPay](https://github.com/btcpayserver/btcpayserver-doc#deployment). If you do not have technical knowledge, use the [web-wizard method](https://launchbtcpay.lunanode.com) and follow the video below.

https://www.youtube.com/watch?v=NjslXYvp8bk

For the self-hosted solutions, you\'ll have to wait for your node to sync fully before proceeding to step 3.

### 2.2 Third-party host

Those who want to test BTCPay out, or are okay with the limitations of a third-party hosting (dependency and privacy, as well as lack of some features) can use a one of many [third-party hosts](ThirdPartyHosting.md).

The video below shows you how to connect your store to such host.

https://www.youtube.com/watch?v=IT2K8It3S3o

## 3. Pairing the store

BTCPay WooCommerce plugin is a bridge between your server (payment processor) and your e-commerce store. No matter if you\'re using a self-hosted or third-party solution from step 2, the pairing process is identical.

Go to your store dashboard. WooCommerce > Settings > Payments. Click BTCPay.

1. In the field, enter the full URL of your host (including the https) – https://btcpay.mydomain.com
2. Click on the generated link which will redirect you back to your BTCPay Server.
3. Click on request pairing
4. Approve the pairing
5. Copy the pairing code
6. Go back to your store and paste the pairing code
7. Click “Pair”
8. When you see the image, it means you successfully paired your server and your store.

The process of pairing a store with BTCPay is explained in a video below, starting at 1:59

https://youtu.be/IT2K8It3S3o?t=119

## 4. Connecting your wallet

No matter if you're using self-hosted or server hosted by a third-party, the process of configuring your wallet is the same. 

https://www.youtube.com/watch?v=xX6LyQej0NQ

## 5. Testing the checkout

Making a small test-purchase from your own store, will give you a piece of mind. Always make sure that everything is set up correctly before going live. The final video, guides you through the steps of setting a gap limit in your Electrum wallet and testing the checkout process.

https://www.youtube.com/watch?v=Fi3pYpzGmmo

Depending on your business model and store settings, you may want to [configure your order statuses](https://nbitstack.com/t/how-to-set-up-order-statuses-in-woocommerce-and-btcpay/67).

== Frequently Asked Questions ==

You'll find extensive documentation and answers to many of your questions on [docs.btcpayserver.org](https://docs.btcpayserver.org/).

== Screenshots ==

1. The BTCPay Server invoice. Your customers will see this at the checkout. They can pay from their wallet by scanning a QR or copy/pasting it manually into the wallet.
2. Customizable plugin interface allows store owners to adjust store statuses according to their needs.
3. Customer will see the pay with Bitcoin button at the checkout.Text can be customized.
4. Example of sucessfuly paid invoice.
5. Example of an easy-embeddable HTML donation payment button.
6. Example of the PoS app you can launch.

== Changelog ==
## 3.0.2
### Fixed
- Fix float decimal issue
- Make migrator pull from versions before 3.0.1 not 3.1

## 3.0.1
### Changed
-  When upgrading from any version smaller than 3.1 and settings are not set, attempt to load older version. Also display a warning prompt in plugins page after it has been activated to double check settings.

## 3.0
### Changed
- Rebrand to be properly BTCPay labelled
- Revert to using original Bitpay php lib and used Customnet for btcpay host urls
- Update default order states to more reasonable values
- Prepare plugin for Wordpress Plugin Repository

## 2.2.24
### Fixed
- Bug: In some circumstances the auto update might crash the wordpress dashboard

## 2.2.23
### Fixed
- Setting `Keep store level settings` to `transaction speed` would still override store\'s setting
### Added
- Add `low-medium` transaction speed

## 2.2.22
### Fixed
- Fix crash on some stores `Cannot use object of type stdClass as array in...` on the dashboard

## 2.2.21
### Added
- Add `event_invoice_expiredPaidPartial` handling

## 2.2.20
### Fixed
- Do not crash plugin page if update detection fails, be more resilient

## 2.2.19
### Fixed
- Ignore IPN if another payment method for the order has been chosen (#2)
- Can detect new update in plugin page

## 2.2.18
### Fixed
- Ignore IPN if another payment method for the order has been chosen (#2)

## 2.2.17
### Fixed
- Fix a race condition if process_payment called twice
- Can decide to ignore a BTCPay event

## 2.2.16
### Fixed
- Handle \'expired\' IPN
- Handle \'invoice_paidAfterExpiration\' IPN event

## 2.2.15
### Fixed
- wrong function call resulting in undefined wc_reduce_stock_levels() (#84)
- syntax error in class-wc-gateway-bitpay.php (#80)
- Make sure that if redirect url is redefined, it has order information (#80)
### Added
- Redirect page displays \'payment successful\' even for unpaid invoices (#81)


## [2.2.14] - 2017-12-30
### Fixed
- Clicking on Proceed to checkout should not empty the cart

### Added
- Add BTCPay custom fields to orders

## [2.2.13] - 2017-10-19
### Fixed
- Support BTCPay custom server

### Added
- Fix bug where placing an order with decimal less currency like yen was impossible

## [2.2.12] - 2017-09-29
### Fixed
- Removed non-working option to disable BitPay from the BitPay plugin config page
- Populate buyer email when creating BitPay invoice
- WC v3 compatibility fixes
- Change Mcrypt to OpenSSL (#77)

### Added
- Improve logging around updating order states
- Present error when mcrypt is not loaded

## [2.2.11-beta] - 2016-06-14
### Fixed
- order_total with certain filters

## [2.2.10] - 2016-06-6
### Fixed
- Use order numbering system for IPN callbacks

## [2.2.9] - 2015-12-04
### Fixed
- Fixed notification URL initialization

## [2.2.8] - 2015-11-19
### Fixed
- Fixed missing API field in config page

## [2.2.7] - 2015-05-28
### Fixed
- Security issue with ajax calls

## [2.2.6] - 2015-04-20
### Added
- New order status setting which also fixes issues with new orders being set to On-Hold and triggering emails

## [2.2.5] - 2015-04-02
### Fixed
- Bundled BitPay PHP Client for releases now includes entire client

## [2.2.4] - 2015-03-09
### Added
- Curl requirement check during activation
- Notification and Redirect URL settings for advanced users

### Fixed
- Order States now save correctly to the database

## [2.2.3] - 2015-02-24
### Fixed
- Requirements check doesn\'t lock up WordPress when WooCommerce is upgraded

## [2.2.2] - 2015-01-13
### Fixed
- Checkout error message when invoice can\'t be generated
- Admin error message when pairing with BitPay fails

## [2.2.1] - 2014-12-10
### Fixed
- Token pairing label sanitization which caused issues when accented characters or symbols were used

## [2.2.0] - 2014-12-05
### Changed
- More robust debug logging

### Fixed
- PHP 5.4 related issues (array literals, api credentials\' serialization)

## [2.1.0] - 2014-11-28
### Changed
- Uses newer BitPay Library that no longer solely requires GMP, but can use BCMath as an alternative

## [2.0.2] - 2014-11-20
### Fixed
- Payment method description/message display on checkout

## [2.0.1] - 2014-11-19
### Changed
- Plugin activation fails on presence of old plugin instead of attempting to delete old plugin and also detect GMP requirement.

## 2.0.0 - 2014-11-18
### Changed
- Implements BitPay\'s new cryptographically secure authentication.
