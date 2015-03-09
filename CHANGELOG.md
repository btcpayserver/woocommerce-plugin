# Change Log
All notable changes to this project will be documented in this file.
This project adheres to [Semantic Versioning](http://semver.org/).

## [Unreleased][unreleased]
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

[unreleased]: https://github.com/bitpay/woocommerce-plugin/compare/v2.2.3...HEAD
[2.2.3]: https://github.com/bitpay/woocommerce-plugin/compare/v2.2.2...v2.2.3
[2.2.2]: https://github.com/bitpay/woocommerce-plugin/compare/v2.2.1...v2.2.2
[2.2.1]: https://github.com/bitpay/woocommerce-plugin/compare/v2.2.0...v2.2.1
[2.2.0]: https://github.com/bitpay/woocommerce-plugin/compare/v2.1.0...v2.2.0
[2.1.0]: https://github.com/bitpay/woocommerce-plugin/compare/v2.0.2...v2.1.0
[2.0.2]: https://github.com/bitpay/woocommerce-plugin/compare/v2.0.1...v2.0.2
[2.0.1]: https://github.com/bitpay/woocommerce-plugin/compare/v2.0.0...v2.0.1
