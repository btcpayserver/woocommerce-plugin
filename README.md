<strong>(c)2012-2014 BITPAY, INC.</strong>

Permission is hereby granted to any person obtaining a copy of this software and associated documentation for use and/or modification in association with the bitpay.com service.

THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY, FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM, OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN THE SOFTWARE.

WooCommerce Bitcoin payment module using the bitpay.com service.


Installation
------------
Copy this folder and its contents into your plugins directory.  It will look something like this: wp-content/plugins/bitpay-master/


Configuration for Woocommerce versions 2.0.x and older
-------------
1. Create an API key at bitpay.com by clicking My Account > API Access Keys > Add New API Key.
2. In the Admin panel click Plugins, then click Activate under Bitpay Woocommerce.
3. In Admin panel click Woocommerce > Settings > Payment Gateways > Bitpay. 
	a. Verify that the module is enabled.
	b. Enter your API key from step 2.
	c. Select a transaction speed.  The high speed will send a confirmation as soon as a transaction is received in the bitcoin network (usually a few seconds).  A medium speed setting will typically take 10 minutes.  The low speed setting usually takes around 1 hour.  See the bitpay.com merchant documentation for a full description of the transaction speed settings.


Configuration for Woocommerce versions 2.1.x and newer
-------------
1. Create an API key at bitpay.com by clicking My Account > API Access Keys > Add New API Key.
2. In the Admin panel click Plugins, then click Activate under Bitpay Woocommerce.
3. In Admin panel click Woocommerce > Settings > Checkout > Bitpay. 
	a. Verify that the module is enabled.
	b. Enter your API key from step 2.
	c. Select a transaction speed. (See notes above regardin transaction speed.)
	d. Click the Save changes button to store your settings.


Usage
-----
When a shopper chooses the Bitcoin payment method and places their order, they will be redirected to bitpay.com to pay.  Bitpay will send a notification to your server which this plugin handles.  Then the customer will be redirected to an order summary page.  

The order status in the admin panel will be "on-hold" when the order is placed and "processing" if payment has been submitted. Order notes will be added as the order progresses from "processing" to "complete". Invalid orders will be marked as "failed".

Note: This extension does not provide a means of automatically pulling a current BTC exchange rate for presenting BTC prices to shoppers. The invoice automatically displays the correctly converted bitcoin amount as determined by BitPay.


Troubleshooting
----------------
The official BitPay API documentation should always be your first reference for development, errors and troubleshooting:
https://bitpay.com/downloads/bitpayApi.pdf

Some web servers have outdated root CA certificates and will cause this curl error: "SSL certificate problem, verify that the CA cert is OK. Details: error:14090086:SSL routines:SSL3_GET_SERVER_CERTIFICATE:certificate verify failed'".  The fix is to contact your hosting provider or server administrator and request a root CA cert update.

The log file is named 'bplog.txt' and can be found in the same directory as the plugin files.  Checking this log file will give you exact responses from the BitPay network, in case of failures.

Check the version of this plugin agains the official repository to ensure you are using the latest version. Your issue might have been addressed in a newer version of the plugin.

If all else fails, send an email describing your issue *in detail* to support@bitpay.com and attach the bplog.txt file.


Version
-------
Version 1.2
- Added new HTTP header for version tracking

Version 1.1
- Tested against Woocommerce 2.0.1, 2.1.0, 2.1.1, Wordpress versions 3.5.1, 3.8.1, PHP version 5.3.8
