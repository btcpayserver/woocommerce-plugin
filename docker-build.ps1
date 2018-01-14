rm dist -Force -Recurse
docker build -t woocommerce_bitpay . 
docker run -ti -v "$pwd/dist:/app/dist" --rm woocommerce_bitpay
echo "Output available in $pwd\dist\btcpay-for-woocommerce.zip"