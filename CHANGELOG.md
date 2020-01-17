# Change Log
All notable changes to this project will be documented in this file.
This project adheres to [Semantic Versioning](http://semver.org/).

## 3.0.10
### Fixed
- Fix woocommerce admin compatibility
- Add country code in btcpay invoice

## 3.0.8
### Fixed
- Fix bug with Woocommerce Admin plugin

## 3.0.7
### Fixed
- Update php-bitpay-lib
- Fix misleading error messages
- Fix bug on some format of orderId

## 3.0.6
### Fixed
- Fix: Invalid code 0 during pairing on some install

## 3.0.5
### Added
- Pass tax information to BTCPay Server

## 3.0.4
### Fixed
- Fix JS Error on pairing mechanism
### Added
- Ensure compatibility with Wordpress 5

## 3.0.3
### Fixed
- Remove legacy currency decimal precision checks

## 3.0.2
### Fixed
- Fix float decimal issue
- Make migrator pull from versions before 3.0.1 not 3.1
## 3.0.1
### Fixed
-  When upgrading from any version smaller than 3.1 and settings are not set, attempt to load older version. Also display a warning prompt in plugins page after it has been activated to double check settings.

## 3.0.0
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
- Setting `Keep store level settings` to `transaction speed` would still override store's setting
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
- Handle 'expired' IPN
- Handle 'invoice_paidAfterExpiration' IPN event

## 2.2.15
### Fixed
- wrong function call resulting in undefined wc_reduce_stock_levels() (#84)
- syntax error in class-wc-gateway-bitpay.php (#80)
- Make sure that if redirect url is redefined, it has order information (#80)
### Added
- Redirect page displays 'payment successful' even for unpaid invoices (#81)


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
- Requirements check doesn't lock up WordPress when WooCommerce is upgraded

## [2.2.2] - 2015-01-13
### Fixed
- Checkout error message when invoice can't be generated
- Admin error message when pairing with BitPay fails

## [2.2.1] - 2014-12-10
### Fixed
- Token pairing label sanitization which caused issues when accented characters or symbols were used

## [2.2.0] - 2014-12-05
### Changed
- More robust debug logging

### Fixed
- PHP 5.4 related issues (array literals, api credentials' serialization)

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
- Implements BitPay's new cryptographically secure authentication.

[unreleased]: https://github.com/bitpay/woocommerce-plugin/compare/v2.2.7...HEAD
[2.2.7]: https://github.com/bitpay/woocommerce-plugin/compare/v2.2.6...v2.2.7
[2.2.6]: https://github.com/bitpay/woocommerce-plugin/compare/v2.2.5...v2.2.6
[2.2.5]: https://github.com/bitpay/woocommerce-plugin/compare/v2.2.4...v2.2.5
[2.2.4]: https://github.com/bitpay/woocommerce-plugin/compare/v2.2.3...v2.2.4
[2.2.3]: https://github.com/bitpay/woocommerce-plugin/compare/v2.2.2...v2.2.3
[2.2.2]: https://github.com/bitpay/woocommerce-plugin/compare/v2.2.1...v2.2.2
[2.2.1]: https://github.com/bitpay/woocommerce-plugin/compare/v2.2.0...v2.2.1
[2.2.0]: https://github.com/bitpay/woocommerce-plugin/compare/v2.1.0...v2.2.0
[2.1.0]: https://github.com/bitpay/woocommerce-plugin/compare/v2.0.2...v2.1.0
[2.0.2]: https://github.com/bitpay/woocommerce-plugin/compare/v2.0.1...v2.0.2
[2.0.1]: https://github.com/bitpay/woocommerce-plugin/compare/v2.0.0...v2.0.1
