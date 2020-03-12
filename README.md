## Quick Start Guide

To get up and running with our plugin quickly, see the GUIDE here: https://docs.btcpayserver.org/integrations/woocommerce

## Brief Description

Add the ability to accept bitcoin in WooCommerce via BTCPayServer.
This plugin is also available through the [wordpress store](https://wordpress.org/plugins/btcpay-for-woocommerce/).

## Detail Description

Bitcoin is a powerful new peer-to-peer platform for the next generation of financial technology. The decentralized nature of the Bitcoin network allows for a highly resilient value transfer infrastructure, and this allows merchants to gain greater profits.

This is because there are little to no fees for transferring Bitcoins from one person to another. Unlike other payment methods, Bitcoin payments cannot be reversed, so once you are paid you can ship! No waiting days for a payment to clear.

## Development

### Setup

 * NodeJS & NPM
 * Grunt
 * Composer

Clone the repo:
```bash
$ git clone https://github.com/btcpayserver/woocommerce-plugin
$ cd woocommerce-plugin
```

Install the dependencies:
```bash
$ npm install
$ curl -sS https://getcomposer.org/installer | php
$ ./composer.phar install
```

### Build

Perform the [setup](#Setup), then:
```bash
$ ./node_modules/.bin/grunt build
# Outputs plugin at dist/woocommerce-plugin
# Outputs plugin archive at dist/woocommerce-plugin.zip
```

## Support

### BitPay Support

* Last Version Tested: Wordpress 4.8.1 WooCommerce 3.1.2
* [GitHub Issues](https://github.com/btcpayserver/woocommerce-plugin/issues)
  * Open an issue if you are having issues with this plugin.
* [Support](https://docs.btcpayserver.org)
  * BitPay merchant support documentation

### WooCommerce Support

* [Homepage](http://www.woothemes.com/woocommerce/)
* [Documentation](http://docs.woothemes.com)
* [Support](https://support.woothemes.com)

## Troubleshooting

1. Ensure a valid SSL certificate is installed on your server. Also ensure your root CA cert is updated. If your CA cert is not current, you will see curl SSL verification errors.
2. Verify that your web server is not blocking POSTs from servers it may not recognize. Double check this on your firewall as well, if one is being used.
3. Check the version of this plugin against the official plugin repository to ensure you are using the latest version. Your issue might have been addressed in a newer version! See the [Releases](https://github.com/btcpayserver/woocommerce-plugin/releases) page for the latest.
4. If all else fails, enable debug logging in the plugin options and send the log along with an email describing your issue **in detail** to support@bitpay.com

**TIP**: When contacting support it will help us is you provide:

* WordPress and WooCommerce Version
* Other plugins you have installed
  * Some plugins do not play nice
* Configuration settings for the plugin (Most merchants take screen grabs)
* Any log files that will help
  * Web server error logs
* Screen grabs of error message if applicable.

## build with docker

Powershell:
```
./docker-build.ps1
```

Linux:
```
rm -rf dist/
docker build -t woocommerce_bitpay .
docker run -ti -v "`pwd`/dist:/app/dist" --rm woocommerce_bitpay
echo "Output available in `pwd`/dist/btcpay-for-woocommerce.zip"
```

## Common errors

### SSL certificate problem: unable to get local issuer certificate

This can come in two conditions:

* Your BTCPayServer is running on a test certificate
* You have not installed root certificates on the wordpress host

In the first case, please, make sure a valid SSL certificates is installed on your BTCPayServer. You can check this is the case by browsing to the BTCPayServer page, and check there is no browser warnings.

In the second case run,

```
sudo apt-get install ca-certificates
```

## Contribute

Would you like to help with this project?  Great!  You don't have to be a developer, either.  If you've found a bug or have an idea for an improvement, please open an [issue](https://github.com/btcpayserver/woocommerce-plugin/issues) and tell us about it.

If you *are* a developer wanting contribute an enhancement, bugfix or other patch to this project, please fork this repository and submit a pull request detailing your changes.  We review all PRs!

This open source project is released under the [MIT license](http://opensource.org/licenses/MIT) which means if you would like to use this project's code in your own project you are free to do so.  Speaking of, if you have used our code in a cool new project we would like to hear about it!  Please send us an email or post a new thread on [BitPay Labs](https://labs.bitpay.com).

## License

Please refer to the [LICENSE](https://github.com/btcpayserver/woocommerce-plugin/blob/master/LICENSE) file that came with this project.
