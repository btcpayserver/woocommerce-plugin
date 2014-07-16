bitpay/woocommerce-plugin
=========================

# Installation

<strong>Manual Method:</strong><br />
After you have downloaded the latest plugin zip file from https://github.com/bitpay/woocommerce-plugin/zipball/master unzip this archive and copy the folder including its contents into your plugins directory.  It will look something like this: wp-content/plugins/bitpay-woocommerce-plugin-e266cd2/

<strong>Note:</strong> The random string of digits is appended to the folder name by GitHub and will be different for you - this is normal and does not affect how the plugin functions.

<strong>Automated Method:</strong><br />
After you have downloaded the latest plugin zip file from https://github.com/bitpay/woocommerce-plugin/zipball/master log into your WordPress admin control panel and go to Plugins.  At the top of the page, click the Add New button and then Upload.  You should see a form that is asking you to upload your plugin in Zip format.  Click the Choose File button, select the plugin Zip file and click Ok.  Click the Install Now button to install the plugin to your Wordpress site.  The file will now be uploaded, unzipped and installed.  The next screen will show the status of this process and display a "Plugin installed successfully" message when finished.

<strong>Note:</strong> If the automated method fails because the plugins folder is not writable, you can correct the permissions and try again or perform the manual install method.


# Configuration for Woocommerce versions 2.0.x and older

1. Create an API key at bitpay.com by clicking My Account > API Access Keys > Add New API Key.
2. In the Admin panel click Plugins, then click Activate under Bitpay Woocommerce.
3. In Admin panel click Woocommerce > Settings > Payment Gateways > Bitpay.<br />
a. Verify that the module is enabled.<br />
b. Enter your API key from step 2.<br />
c. Select a transaction speed.  The high speed will send a confirmation as soon as a transaction is received in the bitcoin network (usually a few seconds).  A medium speed setting will typically take 10 minutes.  The low speed setting usually takes around 1 hour.  See the bitpay.com merchant documentation for a full description of the transaction speed settings: https://bitpay.com/downloads/bitpayApi.pdf


# Configuration for Woocommerce versions 2.1.x and newer

1. Create an API key at bitpay.com by clicking My Account > API Access Keys > Add New API Key.
2. In the Admin panel click Plugins, then click Activate under Bitpay Woocommerce.
3. In Admin panel click Woocommerce > Settings > Checkout > Bitpay.<br />
a. Verify that the module is enabled.<br />
b. Enter your API key from step 2.<br />
c. Select a transaction speed. (See notes above regarding transaction speed.)<br />
d. Click the Save changes button to store your settings.


# Usage

When a shopper chooses the Bitcoin payment method and places their order, they will be redirected to bitpay.com to pay.  Bitpay will send a notification to your server which this plugin handles.  Then the customer will be redirected to an order summary page.  

The order status in the admin panel will be "on-hold" when the order is placed and "processing" if payment has been submitted. Order notes will be added as the order progresses from "processing" to "complete". Invalid orders will be marked as "failed".

Note: This extension does not provide a means of automatically pulling a current BTC exchange rate for presenting BTC prices to shoppers. The invoice automatically displays the correctly converted bitcoin amount as determined by BitPay.

# Support

## BitPay Support
* [Github Issues](https://github.com/bitpay/woocommerce-plugin/issues)
  * Open an Issue if you are having issues with this plugin
* [Support](https://support.bitpay.com/)
  * Checkout the BitPay support site

## WooCommerce Support
* [Homepage](http://www.woothemes.com/woocommerce/)
* [Documentation](http://docs.woothemes.com/documentation/plugins/woocommerce/)
* [Forums](http://wordpress.org/support/plugin/woocommerce)

# Troubleshooting

The official BitPay API documentation should always be your first reference for development, errors and troubleshooting:
https://bitpay.com/downloads/bitpayApi.pdf

Some web servers have outdated root CA certificates and will cause this curl error: "SSL certificate problem, verify that the CA cert is OK. Details: error:14090086:SSL routines:SSL3_GET_SERVER_CERTIFICATE:certificate verify failed'".  The fix is to contact your hosting provider or server administrator and request a root CA cert update.

The log file is named 'bplog.txt' and can be found in the same directory as the plugin files. Checking this log file will give you exact responses from the BitPay network, in case of failures.

Check the version of this plugin against the official repository to ensure you are using the latest version. Your issue might have been addressed in a newer version of the plugin: https://github.com/bitpay/woocommerce-plugin/zipball/master

If all else fails, send an email describing your issue *in detail* to support@bitpay.com and attach the bplog.txt file.

# Contribute

To contribute to this project, please fork and submit a pull request.

# License

The MIT License (MIT)

Copyright (c) 2011-2014 BitPay

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