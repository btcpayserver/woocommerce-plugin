=== BTCPay for WooCommerce ===
Contributors: Kukks,NicolasDorier,bitcoinshirt
Tags: bitcoin,cryptocurrency,btcpay,BTCPay Server,btcpayserver, accept bitcoin,bitcoin plugin, bitcoin payment processor, bitcoin e-commerce, Lightning Network, Litecoin
Requires at least: 3.9
Tested up to: 5.0
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

* Direct, peer-to-peer Bitcoin and altcoin payments
* No transaction fees (other than mining fees by crypto network itself)
* No processing fees
* No middleman
* No KYC
* User has complete control over private keys
* Enhanced privacy (no address re-use, no IP leaks to third parties)
* Enhanced security
* Self-hosted
* SegWit support
* Lightning Network support (LND and c-lightning)
* Altcoin support
* Full compatibility with BitPay API (easy migration)
* Attach unlimited stores, process payments for friends
* Easy-embeddable Payment buttons
* Point of Sale app

== Installation ==

This plugin requires Woocommerce. Please make sure you have Woocommerce installed.

<img src="https://github.com/btcpayserver/btcpayserver-doc/blob/master/img/BTCPayWooCommerceInfoggraphic.png" alt="Infographic" />

To integrate BTCPay Server into an existing WooCommerce store, follow the steps below.

### 1. Install BTCPay WooCommerce Plugin ###

### 2. Deploy BTCPay Server ###

To launch your BTCPay server, you can self-host it, or use a third party host.

#### 2.1 Self-hosted BTCPay ####

There are various ways to [launch a self-hosted BTCPay](https://github.com/btcpayserver/btcpayserver-doc#deployment). If you do not have technical knowledge, use the [web-wizard method](https://launchbtcpay.lunanode.com) and follow the video below.

https://www.youtube.com/watch?v=NjslXYvp8bk

For the self-hosted solutions, you\'ll have to wait for your node to sync fully before proceeding to step 3.

#### 2.2 Third-party host ####

Those who want to test BTCPay out, or are okay with the limitations of a third-party hosting (dependency and privacy, as well as lack of some features) can use a one of many [third-party hosts](ThirdPartyHosting.md).

The video below shows you how to connect your store to such host.

https://www.youtube.com/watch?v=IT2K8It3S3o

### 3. Pairing the store ###

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

###  4. Connecting your wallet ###

No matter if you're using self-hosted or server hosted by a third-party, the process of configuring your wallet is the same. 

https://www.youtube.com/watch?v=xX6LyQej0NQ

### 5. Testing the checkout ###

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

## 3.0.10
Fixed
- Fix woocommerce admin compatibility
- Add country code in btcpay invoice

## 3.0.8
Fixed
- Fix bug with Woocommerce Admin plugin

## 3.0.7
Fixed
- Update php-bitpay-lib
- Fix misleading error messages
- Fix bug on some format of orderId

= 3.0.6 =
Fixed
- Fix: Invalid code 0 during pairing on some install

= 3.0.5 =
Added:
- Pass tax information to BTCPay Server

= 3.0.4 =
Fixed:
- Fix JS Error on pairing mechanism
Added:
- Ensure compatibility with Wordpress 5

= 3.0.3 =
Fixed:
- Remove legacy currency decimal precision checks

= 3.0.2 =
Fixed:
- Fix float decimal issue
- Make migrator pull from versions before 3.0.1 not 3.1

= 3.0.1 =
Changed:
-  When upgrading from any version smaller than 3.1 and settings are not set, attempt to load older version. Also display a warning prompt in plugins page after it has been activated to double check settings.

= 3.0 =
Changed:
- Rebrand to be properly BTCPay labelled
- Revert to using original Bitpay php lib and used Customnet for btcpay host urls
- Update default order states to more reasonable values
- Prepare plugin for Wordpress Plugin Repository

=2.2.24 =
Fixed
- Bug: In some circumstances the auto update might crash the wordpress dashboard

= 2.2.23 =
Fixed
- Setting `Keep store level settings` to `transaction speed` would still override store\'s setting
Added
- Add `low-medium` transaction speed

= 2.2.22 =
Fixed
- Fix crash on some stores `Cannot use object of type stdClass as array in...` on the dashboard

= 2.2.21 =
Added
- Add `event_invoice_expiredPaidPartial` handling

= 2.2.20 =
Fixed
- Do not crash plugin page if update detection fails, be more resilient

= 2.2.19 =
Fixed
- Ignore IPN if another payment method for the order has been chosen (#2)
- Can detect new update in plugin page

= 2.2.18 =
Fixed
- Ignore IPN if another payment method for the order has been chosen (#2)

= 2.2.17 =
Fixed
- Fix a race condition if process_payment called twice
- Can decide to ignore a BTCPay event

= 2.2.16 =
Fixed
- Handle \'expired\' IPN
- Handle \'invoice_paidAfterExpiration\' IPN event

= Earlier versions =
For the changelog of earlier versions, please refer to https://github.com/btcpayserver/woocommerce-plugin/releases
