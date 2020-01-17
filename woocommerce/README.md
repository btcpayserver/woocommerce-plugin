# Test framework

You can run the whole infrastructure (BTCPay + Woocommerce) via `docker-compose up`.
This will expose btcpay on `http://localhost:8081/` and woocommerce on `http://localhost:8080/`.

You can use Selenium IDE plugin for chrome and run `selenium-woocommerce-btcpay-test.side`.

This selenium project is meant to recreate a store easily, to test btcpayserver.
It is not very reliable yet, so it may need some fixing.