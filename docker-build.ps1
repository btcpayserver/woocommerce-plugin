rm dist -Force -Recurse
mkdir "dist"
docker build -t woocommerce_bitpay . 
docker run -ti -v "$pwd/dist:/app/dist" --rm woocommerce_bitpay
echo "Output available in $pwd\dist\btcpay-woocommerce.zip"
Copy-Item "$pwd\dist\btcpay-woocommerce\*" "$pwd\woocommerce\html\wp-content\plugins\btcpay-woocommerce" -Force -Recurse