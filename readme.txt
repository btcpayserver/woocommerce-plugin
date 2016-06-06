=== BitPay for WooCommerce ===
Contributors: bitpay
Tags: bitcoin, bitpay, payment gateway, woocommerce, btc, xbt
Requires at least: 4.3.1
Tested up to: 4.5.2
Stable tag: 2.2.10
License: MIT
License URI: https://raw.githubusercontent.com/bitpay/woocommerce-plugin/master/LICENSE

Enable your WooCommerce store to accept Bitcoin with BitPay!

== Description ==

[youtube http://www.youtube.com/watch?v=JP_I9zNRpEo]

Bitcoin is a powerful new peer-to-peer platform for the next generation of financial technology. The decentralized nature of the Bitcoin network allows for a highly resilient value transfer infrastructure, and this allows merchants to gain greater profits.

This is because there are little to no fees for transferring Bitcoins from one person to another. Unlike other payment methods, Bitcoin payments cannot be reversed, so once you are paid you can ship! No waiting days for a payment to clear.

== Installation ==

= Minimum Requirements =

* WordPress 4.3.1 or greater
* WooCommerce 2.4.10 or greater
* PHP version 5.4 or greater
* GMP *or* BCMath extension for PHP
* mcrypt
* OpenSSL Must be compiled with PHP

= Automatic Installation =

Log into your WordPress dashboard and go to Plugins > Add New.

Search for "BitPay for WooCommerce" and click "Install Now"

= Manual Installation =

Download the plugin and upload it to your webserver via the [directions found at the WordPress codex](http://codex.wordpress.org/Managing_Plugins#Manual_Plugin_Installation).

== Upgrade Notice ==

Any < 2.0 versions of the BitPay payment gateway for WooCommerce will need to be deactivated and deleted before installation of 2.0 and up.

== Frequently Asked Questions ==

= How do I configure the plugin? =

Follow the [directions found on the plugin's GitHub page](https://github.com/bitpay/woocommerce-plugin#configuration).

= Do I have to have GMP installed? =

The requirement of the GMP extension for PHP has been removed, but it is still **highly** recommended that you install it for better performance.

== Screenshots ==

1. When selected, this is how the payment option will appear
2. This is the BitPay invoice page a customer will be sent to during checkout after selecting this plugin's payment option
3. After they have paid, they will be prompted to return to your site
4. The checkout will indicate they paid with Bitcoin
5. The settings screen for this plugin

== Changelog ==
= 2.2.10 - 2016-06-06 =
* Added - Support for WooCommerce Basic and Advanced Order Numbering

= 2.2.9 - 2015-12-02 =
* Fixed - Small issue with the initialization of the notification url

= 2.2.8 - 2015-11-17 =
* Fixed - Issues related to API field on BitPay Checkout Settings Page being missing

= 2.2.7 - 2015-05-28 =
* Fixed - Security issue with ajax calls

= 2.2.6 - 2015-04-20 =
* Added - New order status setting which also fixes issues with new orders being set to On-Hold and triggering emails

= 2.2.5 - 2015-04-02 =
* Fixed - Bundled BitPay PHP Client for releases now includes entire client

= 2.2.4 - 2015-03-09 =
* Added - Curl requirement check during activation
* Added - Notification and Redirect URL settings for advanced users
* Fixed - Order States now save correctly to the database

= 2.2.3 - 2015-02-24 =
* Fixed - Requirements check doesn't lock up WordPress when WooCommerce is upgraded

= 2.2.2 - 2015-01-13 =
* Fixed - Checkout error message when invoice can't be generated
* Fixed - Admin error message when pairing with BitPay fails

= 2.2.1 - 2014-12-10 =
* Fixed - Token pairing label sanitization which caused issues when accented characters or symbols were used

= 2.2.0 - 2014-12-05 =
* Changed - More robust debug logging
* Fixed - PHP 5.4 related issues (array literals, api credentials' serialization)

= 2.1.0 - 2014-11-28 =
* Changed - Uses newer BitPay Library that no longer solely requires GMP, but can use BCMath as an alternative

= 2.0.2 - 2014-11-20 =
* Fixed - Payment method description/message display on checkout

= 2.0.1 - 2014-11-19 =
* Changed - Plugin activation fails on presence of old plugin instead of attempting to delete old plugin and also detect GMP requirement.

= 2.0.0 - 2014-11-18 =
* Changed - Implements BitPay's new cryptographically secure authentication.
