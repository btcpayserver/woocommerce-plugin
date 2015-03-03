WooCommerce BitPay Payment Gateway
=====================

# Build Status

[![Build Status](https://travis-ci.org/bitpay/woocommerce-plugin.svg?branch=master)](https://travis-ci.org/bitpay/woocommerce-plugin)

# Brief Description

Add the ability to accept bitcoin in WooCommerce via BitPay.

# Detail Description

Bitcoin is a powerful new peer-to-peer platform for the next generation of
financial technology. The decentralized nature of the Bitcoin network allows
for a highly resilient value transfer infrastructure, and this allows merchants
to gain greater profits.

This is because there are little to no fees for transferring Bitcoins from one
person to another. Unlike other payment methods, Bitcoin payments cannot be
reversed, so once you are paid you can ship! No waiting days for a payment to
clear.


# Quick Start Guide

To get up and running with our plugin quickly, see the GUIDE here: https://github.com/bitpay/woocommerce-plugin/blob/master/GUIDE.md


# Development

##Setup

 * NodeJS & NPM
 * Grunt
 * Composer
 
Clone the repo:
```bash
$ git clone https://github.com/bitpay/woocommerce-plugin
$ cd woocommerce-plugin
```
Install the dependencies:
```bash
$ npm install
$ curl -sS https://getcomposer.org/installer | php
$ ./composer.phar install
```
##Build
Perform the [setup](#Setup), then:
```bash
$ ./node_modules/.bin/grunt build
# Outputs plugin at dist/woocommerce-plugin
# Outputs plugin archive at dist/woocommerce-plugin.zip
```


# Support

## BitPay Support

* [GitHub Issues](https://github.com/bitpay/woocommerce-plugin/issues)
  * Open an issue if you are having issues with this plugin.
* [Support](https://support.bitpay.com)
  * BitPay merchant support documentation

## WooCommerce Support

* [Homepage](http://www.woothemes.com/woocommerce/)
* [Documentation](http://docs.woothemes.com)
* [Support](https://support.woothemes.com)

# Troubleshooting

1. Ensure a valid SSL certificate is installed on your server. Also ensure your
   root CA cert is updated. If your CA cert is not current, you will see curl
   SSL verification errors.
2. Verify that your web server is not blocking POSTs from servers it may not
   recognize. Double check this on your firewall as well, if one is being used.
3. Check the version of this plugin against the official plugin repository to
   ensure you are using the latest version. Your issue might have been
   addressed in a newer version! See the [Releases](https://github.com/bitpay/woocommerce-plugin/releases)
   page for the latest.
4. If all else fails, enable debug logging in the plugin options and send the log along with an email describing your issue **in detail** to support@bitpay.com

**TIP**: When contacting support it will help us is you provide:

* WordPress and WooCommerce Version
* Other plugins you have installed
  * Some plugins do not play nice
* Configuration settings for the plugin (Most merchants take screen grabs)
* Any log files that will help
  * Web server error logs
* Screen grabs of error message if applicable.

# Contribute

To contribute to this project, please fork and submit a pull request.

# License

The MIT License (MIT)

Copyright (c) 2011-2015 BitPay, Inc.

Permission is hereby granted, free of charge, to any person obtaining a copy
of this software and associated documentation files (the "Software"), to deal
in the Software without restriction, including without limitation the rights
to use, copy, modify, merge, publish, distribute, sublicense, and/or sell
copies of the Software, and to permit persons to whom the Software is
furnished to do so, subject to the following conditions:

The above copyright notice and this permission notice shall be included in
all copies or substantial portions of the Software.

THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR
IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY,
FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE
AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER
LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM,
OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN
THE SOFTWARE.
