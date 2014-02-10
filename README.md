2012-2014 BITPAY, INC.

Permission is hereby granted to any person obtaining a copy of this software and associated documentation for use and/or modification in association with the bitpay.com service.

THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY, FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM, OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN THE SOFTWARE.

Bitcoin payment module using the bitpay.com service.

Installation
------------
Copy this folder and its contents into your plugins directory.  It will look something like this: wp-content/plugins/bitpayMagento-master/

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
	c. Select a transaction speed.
	d. Click the Save changes button to store your settings.

Usage
-----
When a shopper chooses the Bitcoin payment method and places their order, they will be redirected to bitpay.com to pay.  Bitpay will send a notification to your server which this plugin handles.  Then the customer will be redirected to n order summary page.  

The order status in the admin panel will be "on-hold" when the order is placed and "processing" if payment has been confirmed. 

Note: This extension does not provide a means of automatically pulling a current BTC exchange rate for presenting BTC prices to shoppers.

Version 1.1
	Tested against Woocommerce 2.0.1, 2.1.0, Wordpress versions 3.5.1, 3.8.1, PHP version 5.3.8

	
	
