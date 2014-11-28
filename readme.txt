=== BitPay for WooCommerce ===
Contributors: bitpay
Tags: bitcoin, bitpay, payment gateway, woocommerce, btc, xbt
Requires at least: 3.9
Tested up to: 4.0
Stable tag: trunk
License: MIT
License URI: https://raw.githubusercontent.com/bitpay/woocommerce-plugin/master/LICENSE

Enable your WooCommerce store to accept Bitcoin with BitPay!

== Description ==

[youtube http://www.youtube.com/watch?v=JP_I9zNRpEo]

Bitcoin is a powerful new peer-to-peer platform for the next generation of financial technology. The decentralized nature of the Bitcoin network allows for a highly resilient value transfer infrastructure, and this allows merchants to gain greater profits.

This is because there are little to no fees for transferring Bitcoins from one person to another. Unlike other payment methods, Bitcoin payments cannot be reversed, so once you are paid you can ship! No waiting days for a payment to clear.

== Installation ==

= Minimum Requirements =

* WordPress 3.9 or greater
* WooCommerce 2.2 or greater
* PHP version 5.4 or greater
* GMP *or* BCMath extension for PHP

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

= How do I install GMP =

Follow the [directions found on the plugin's GitHub page](https://github.com/bitpay/woocommerce-plugin#gmp-nstallation).

== Screenshots ==

1. When selected, this is how the payment option will appear
2. This is the BitPay invoice page a customer will be sent to during checkout after selecting this plugin's payment option
3. After they have paid, they will be prompted to return to your site
4. The checkout will indicate they paid with Bitcoin
5. The settings screen for this plugin

== Changelog ==

= 2.1.0 - 2014-11-28 =
* Tweak - Uses newer BitPay Library that no longer solely requires GMP, but can use BCMath as an alternative

= 2.0.2 - 2014-11-20 =
* Fix - Payment method description/message display on checkout

= 2.0.1 - 2014-11-19 =
* Tweak - Changed plugin activation to fail on presence of old plugin instead of attempting to delete old plugin and also detect GMP requirement.

= 2.0.0 - 2014-11-18 =
* Feature - Implements BitPay's new cryptographically secure authentication.