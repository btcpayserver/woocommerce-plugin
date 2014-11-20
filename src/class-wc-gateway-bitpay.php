<?php
/*
    Plugin Name: BitPay for WooCommerce
    Plugin URI:  https://bitpay.com
    Description: Enable your WooCommerce store to accept Bitcoin with BitPay.
    Author:      bitpay
    Author URI:  https://bitpay.com

    Version: 	       2.0.2
    License:           Copyright 2011-2014 BitPay Inc., MIT License
    License URI:       https://github.com/bitpay/woocommerce-plugin/blob/master/LICENSE
    GitHub Plugin URI: https://github.com/bitpay/woocommerce-plugin
 */

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

// Load up the BitPay library
require_once __DIR__ . '/lib/Bitpay/Autoloader.php';
\Bitpay\Autoloader::register();

// Ensures WooCommerce is loaded before initializing the BitPay plugin
add_action('plugins_loaded', 'woocommerce_bitpay_init', 0);
register_activation_hook( __FILE__, 'woocommerce_bitpay_activate' );

function woocommerce_bitpay_init()
{
    if ( !class_exists( 'WC_Payment_Gateway' ) ) return;

        class WC_Gateway_Bitpay extends WC_Payment_Gateway
        {
            /**
             * Constructor for the gateway.
             */
            public function __construct()
            {

                $this->id                 = 'bitpay';
                $this->icon               = plugin_dir_url(__FILE__).'assets/img/icon.png';
                $this->has_fields         = false;
                $this->order_button_text    = __( 'Proceed to BitPay', 'bitpay' );
                $this->method_title       = 'BitPay';
                $this->method_description = 'BitPay allows you to accept bitcoin on your WooCommerce store.';

                // Load the settings.
                $this->init_form_fields();
                $this->init_settings();

                // Define user set variables
                $this->title              = $this->get_option( 'title' );
                $this->description        = $this->get_option( 'description' );
                $this->debug              = $this->get_option( 'debug' );

                // Define BitPay settings
                $this->api_key            = bitpay_decrypt(get_option( 'woocommerce_bitpay_key' ));
                $this->api_pub            = bitpay_decrypt(get_option( 'woocommerce_bitpay_pub' ));
                $this->api_sin            = get_option( 'woocommerce_bitpay_sin' );
                $this->api_token          = bitpay_decrypt(get_option( 'woocommerce_bitpay_token' ));
                $this->api_token_label    = get_option( 'woocommerce_bitpay_label' );
                $this->api_network        = get_option( 'woocommerce_bitpay_network' );

                $this->notification_url   = WC()->api_request_url( 'WC_Gateway_Bitpay' );

                // Logs
                if ('yes' == $this->debug) {
                    $this->log = new WC_Logger();
                }

                // Actions
                add_action( 'woocommerce_update_options_payment_gateways_' . $this->id, array( $this, 'process_admin_options' ) );
                add_action( 'woocommerce_update_options_payment_gateways_' . $this->id, array( $this, 'save_order_states' ) );

                // IPN Callback
                add_action( 'woocommerce_api_wc_gateway_bitpay', array( $this, 'ipn_callback' ) );

            }

            public function is_valid_for_use()
            {
                if (is_null($this->api_key) || is_null($this->api_pub) || is_null($this->api_sin) || is_null($this->api_token)) {
                    return false;
                }

                return true;
            }

            /**
             * Initialise Gateway Settings Form Fields
             */
            public function init_form_fields()
            {
                $this->form_fields = array(
                    'enabled' => array(
                        'title'   => __( 'Enable/Disable', 'woocommerce' ),
                        'type'    => 'checkbox',
                        'label'   => __( 'Enable Bitcoin via BitPay', 'bitpay' ),
                        'default' => 'yes'
                    ),
                    'title' => array(
                        'title'       => __( 'Title', 'woocommerce' ),
                        'type'        => 'text',
                        'description' => __( 'This controls the title which the user sees during checkout.', 'woocommerce' ),
                        'default'     => __( 'Bitcoin', 'bitpay' ),
                    ),
                    'description' => array(
                        'title' => __( 'Customer Message', 'woocommerce' ),
                        'type' => 'textarea',
                        'description' => __( 'Message to explain how the customer will be paying for the purchase.', 'bitpay' ),
                        'default' => 'You will be redirected to bitpay.com to complete your purchase.'
                    ),
                    'api_token' => array(
                        'type'        => 'api_token'
                    ),
                    'transactionSpeed' => array(
                        'title' => __('Risk/Speed', 'bitpay'),
                        'type' => 'select',
                        'description' => 'Choose a transaction speed.  For details, see the API documentation at bitpay.com',
                        'options' => array(
                            'high' => 'High',
                            'medium' => 'Medium',
                            'low' => 'Low',
                        ),
                        'default' => 'high',
                    ),
                    'order_states' => array(
                        'type'        => 'order_states'
                    ),
                    'debug' => array(
                        'title'       => __( 'Debug Log', 'woocommerce' ),
                        'type'        => 'checkbox',
                        'label'       => __( 'Enable logging', 'woocommerce' ),
                        'default'     => 'no',
                        'description' => sprintf( __( 'Log BitPay events, such as IPN requests, inside <code>%s</code>', 'bitpay' ), wc_get_log_file_path( 'bitpay' ) )
                    )
                );
            }

            /**
             * HTML output for form field type `api_token`
             */
            public function generate_api_token_html()
            {
                ob_start();

                // TODO: CSS Imports aren't optimal, but neither is this.  Maybe include the css to be css-minimized?
                wp_enqueue_style( 'font-awesome', '//netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css' );
                wp_enqueue_style( 'woocommerce-plugin', plugins_url( 'assets/css/style.css', __FILE__ ) );
                wp_enqueue_script( 'woocommerce-plugin', plugins_url( 'assets/js/pairing.js', __FILE__ ), array('jquery'), null, true);

                $pairing_form = file_get_contents(plugin_dir_url(__FILE__).'templates/pairing.tpl');
                $token_format = file_get_contents(plugin_dir_url(__FILE__).'templates/token.tpl');

                ?>
                <tr valign="top">
                    <th scope="row" class="titledesc">API Token:</th>
                    <td class="forminp" id="bitpay_api_token">
                        <div id="bitpay_api_token_form">
                            <?php
                                if (empty($this->api_token)) {
                                    echo sprintf($pairing_form, 'visible');
                                    echo sprintf($token_format, 'hidden', plugins_url( 'assets/img/logo.png', __FILE__ ),'','');
                                } else {
                                    echo sprintf($pairing_form, 'hidden');
                                    echo sprintf($token_format, $this->api_network, plugins_url( 'assets/img/logo.png', __FILE__ ), $this->api_token_label, $this->api_sin);
                                }

                            ?>
                        </div>
                           <script type="text/javascript">
                            var ajax_loader_url = '<?= plugins_url( 'assets/img/ajax-loader.gif', __FILE__ ); ?>';
                        </script>
                    </td>
                </tr>
                <?php

                return ob_get_clean();
            }

            /**
             * HTML output for form field type `order_states`
             */
            public function generate_order_states_html()
            {
                ob_start();

                // TODO: CSS Imports aren't optimal, but neither is this.  Maybe include the css to be css-minimized?
                wp_enqueue_style( 'font-awesome', '//netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css' );
                wp_enqueue_style( 'woocommerce-plugin', plugins_url( 'assets/css/style.css', __FILE__ ) );
                wp_enqueue_script( 'woocommerce-plugin', plugins_url( 'assets/js/pairing.js', __FILE__ ), array('jquery'), null, true);

                $pairing_form = file_get_contents(plugin_dir_url(__FILE__).'templates/pairing.tpl');
                $token_format = file_get_contents(plugin_dir_url(__FILE__).'templates/token.tpl');

                $bp_statuses = ['paid'=>'Paid', 'confirmed'=>'Confirmed', 'complete'=>'Complete', 'invalid'=>'Invalid'];
                $df_statuses = ['paid'=>'wc-processing', 'confirmed'=>'wc-processing', 'complete'=>'wc-completed', 'invalid'=>'wc-failed'];
                $wc_statuses = wc_get_order_statuses();

                ?>
                <tr valign="top">
                    <th scope="row" class="titledesc">Order States:</th>
                    <td class="forminp" id="bitpay_order_states">
                        <table cellspacing="0">
                            <?php

                            foreach ($bp_statuses as $bp_state => $bp_name) {
                                ?>
                                <tr>
                                <th><?= $bp_name; ?></th>
                                <td>
                                    <select name="bitpay_order_state[<?= $bp_state; ?>]">
                                    <?php

                                    foreach ($wc_statuses as $wc_state => $wc_name) {
                                        $current_option = get_option('woocommerce_bitpay_order_state_'.$bp_state);
                                        if (empty($current_option)) {
                                            $current_option = $df_statuses[$bp_state];
                                        }
                                        if ($current_option === $wc_state) {
                                            echo "<option value=\"$wc_state\" selected>$wc_name</option>\n";
                                        } else {
                                            echo "<option value=\"$wc_state\">$wc_name</option>\n";
                                        }
                                    }

                                    ?>
                                    </select>
                                </td>
                                </tr>
                                <?php
                            }

                            ?>
                        </table>
                    </td>
                </tr>
                <?php

                return ob_get_clean();
            }

            /**
             * Save order states
             */
            public function save_order_states()
            {
                $bp_statuses = ['paid'=>'Paid', 'confirmed'=>'Confirmed', 'complete'=>'Complete', 'invalid'=>'Invalid'];
                $wc_statuses = wc_get_order_statuses();

                if ( isset( $_POST['bitpay_order_state'] ) ) {

                    foreach ($bp_statuses as $bp_state => $bp_name) {
                        if ( ! isset( $_POST['bitpay_order_state'][ $bp_state ] ) ) {
                            continue;
                        }

                        $wc_state = $_POST['bitpay_order_state'][ $bp_state ];
                        if (array_key_exists($wc_state, $wc_statuses)) {
                            update_option('woocommerce_bitpay_order_state_'.$bp_state, $wc_state );
                        }

                    }
                }

            }

            /**
             * Output for the order received page.
             */
            public function thankyou_page($order_id)
            {
            }

            /**
             * Process the payment and return the result
             *
             * @param int $order_id
             * @return array
             */
            public function process_payment($order_id)
            {
                $order = wc_get_order( $order_id );

                if ('yes' == $this->debug) {
                    $this->log->add( 'bitpay', 'Generating payment form for order ' . $order->get_order_number() . '. Notify URL: ' . $this->notification_url );
                }

                // Mark as on-hold (we're awaiting the payment)
                $order->update_status( 'on-hold', 'Awaiting payment notification from BitPay.' );

                // invoice options
                $vcheck = explode('.',WC_VERSION);
                if(trim($vcheck[0]) >= '2' && trim($vcheck[1]) >= '1')
                    $thanks_link = $this->get_return_url( $order );
                else
                    $thanks_link =  get_permalink(get_option('woocommerce_thanks_page_id'));

                // Redirect URL & Notification URL
                $redirectUrl = add_query_arg('key', $order->order_key, add_query_arg('order', $order_id, $thanks_link));

                // Setup the currency
                $currency_code = get_woocommerce_currency();
                $currency = new \Bitpay\Currency();
                $currency->setCode( $currency_code );

                // Get a BitPay Client to prepare for invoice creation
                $client = new \Bitpay\Client\Client();
                if ($this->api_network === 'livenet') {
                    $client->setNetwork(new \Bitpay\Network\Livenet());
                } else {
                    $client->setNetwork(new \Bitpay\Network\Testnet());
                }
                $client->setAdapter(new \Bitpay\Client\Adapter\CurlAdapter());
                $client->setPrivateKey($this->api_key);
                $client->setPublicKey($this->api_pub);
                $client->setToken($this->api_token);

                // Setup the Invoice
                $invoice = new \Bitpay\Invoice();
                $invoice->setOrderId( $order_id );
                $invoice->setCurrency( $currency );
                $invoice->setFullNotifications( true );

                // Add a priced item to the invoice
                $item = new \Bitpay\Item();
                $item->setPrice( $order->order_total );
                $invoice->setItem( $item );

                // Add the Redirect and Notification URLs
                $invoice->setRedirectUrl( $redirectUrl );
                $invoice->setNotificationUrl( $this->notification_url );

                try {
                    $invoice = $client->createInvoice($invoice);
                } catch (Exception $e) {
                    // TODO: add error logging
                    error_log($e->getMessage());
                    error_log($client->getResponse()->getBody());

                    return array(
                        'result'    => 'error'
                        // TODO: add error message
                    );
                }
                // Reduce stock levels
                $order->reduce_order_stock();

                // Remove cart
                WC()->cart->empty_cart();

                // Redirect the customer to the BitPay invoice
                return array(
                    'result'    => 'success',
                    'redirect'    => $invoice->getUrl()
                );
            }

            public function ipn_callback()
            {

                // Retrieve the Invoice ID and Network URL from the supposed IPN data
                $post = file_get_contents("php://input");
                if (!$post) {
                    return array('error' => 'No post data');
                }

                $json = json_decode($post, true);
                if (is_string($json)) {
                    return array('error' => $json);
                }

                if (!array_key_exists('id', $json)) {
                    return array('error' => 'No Invoice ID');
                }

                if (!array_key_exists('url', $json)) {
                    return array('error' => 'No Invoice URL');
                }

                // Get a BitPay Client to prepare for invoice fetching
                $client = new \Bitpay\Client\Client();
                if (strpos($json['url'], 'test') === false) {
                    $network = new \Bitpay\Network\Livenet();

                } else {
                    $network = new \Bitpay\Network\Testnet();
                }

                if ('yes' == $this->debug) {
                    $this->log->add( 'bitpay', 'Checking IPN response is valid via ' . $network->getName() . '...' );
                }

                $client->setNetwork($network);
                $client->setAdapter(new \Bitpay\Client\Adapter\CurlAdapter());
                $client->setPrivateKey($this->api_key);
                $client->setPublicKey($this->api_pub);
                $client->setToken($this->api_token);

                // Fetch the invoice from BitPay's server to update the order
                try {
                    $invoice = $client->getInvoice($json['id']);
                } catch (Exception $e) {
                    $error_string = 'IPN Check: Can\'t find invoice '.$json['id'];
                    if ('yes' == $this->debug) {
                        $this->log->add( 'bitpay', "[Error] $error_string" );
                    }

                    return array(
                        'error'    => 'error'
                        // TODO: add error message
                    );
                }

                $orderId = $invoice->getOrderId();
                $order = new WC_Order( $orderId );
                $current_status = $order->get_status();

                $paid_status = get_option('woocommerce_bitpay_order_state_paid', 'processing');
                $confirmed_status = get_option('woocommerce_bitpay_order_state_confirmed', 'processing');
                $complete_status = get_option('woocommerce_bitpay_order_state_complete', 'completed');
                $invalid_status = get_option('woocommerce_bitpay_order_state_invalid', 'failed');

                switch ($invoice->getStatus()) {
                    case 'paid':

                        if ($current_status == $complete_status || 'wc_'.$current_status == $complete_status || $current_status == 'completed') {
                            $error_string = 'Paid IPN, but order has status: '.$current_status;
                            if ('yes' == $this->debug) {
                                $this->log->add( 'bitpay', "[Warning] $error_string" );
                            }
                        } else {
                            $order->update_status($paid_status);
                            $order->add_order_note(__('BitPay invoice paid. Awaiting network confirmation and payment completed status.', 'bitpay'));
                        }
                        break;

                    case 'confirmed':

                        if ($current_status == $complete_status || 'wc_'.$current_status == $complete_status || $current_status == 'completed') {
                            $error_string = 'Confirmed IPN, but order has status: '.$current_status;
                            if ('yes' == $this->debug) {
                                $this->log->add( 'bitpay', "[Warning] $error_string" );
                            }
                        } else {
                            $order->update_status($confirmed_status);
                            $order->add_order_note(__('BitPay invoice confirmed. Awaiting payment completed status.', 'bitpay'));
                        }
                        break;

                    case 'complete':

                        if ($current_status == $complete_status || 'wc_'.$current_status == $complete_status || $current_status == 'completed') {
                            $error_string = 'Complete IPN, but order has status: '.$current_status;
                            if ('yes' == $this->debug) {
                                $this->log->add( 'bitpay', "[Warning] $error_string" );
                            }
                        } else {
                            $order->payment_complete();
                            $order->update_status($complete_status);
                            $order->add_order_note(__('BitPay invoice payment completed. Payment credited to your merchant account.', 'bitpay'));
                        }
                        break;

                    case 'invalid':

                        if ($current_status == $complete_status || 'wc_'.$current_status == $complete_status || $current_status == 'completed') {
                            $error_string = 'Paid IPN, but order has status: '.$current_status;
                            if ('yes' == $this->debug) {
                                $this->log->add( 'bitpay', "[Warning] $error_string" );
                            }
                        } else {
                            $order->update_status($invalid_status, __('Bitcoin payment is invalid for this order! The payment was not confirmed by the network within 1 hour.', 'bitpay'));
                        }
                        break;
                    default:
                        $error_string = 'Unhandled invoice status: '.$invoice->getStatus();
                        if ('yes' == $this->debug) {
                            $this->log->add( 'bitpay', "[Warning] $error_string" );
                        }

                }

            }

        }

    /**
    * Add BitPay Payment Gateway to WooCommerce
    **/
    function wc_add_bitpay($methods)
    {
        $methods[] = 'WC_Gateway_Bitpay';

        return $methods;
    }

    add_filter('woocommerce_payment_gateways', 'wc_add_bitpay' );

    /**
    * Add Settings link to the plugin entry in the plugins menu for WC below 2.1
    **/
    if ( version_compare( WOOCOMMERCE_VERSION, "2.1" ) <= 0 ) {

        add_filter('plugin_action_links', 'bitpay_plugin_action_links', 10, 2);

        function bitpay_plugin_action_links($links, $file)
        {
            static $this_plugin;

            if (!$this_plugin) {
                $this_plugin = plugin_basename(__FILE__);
            }

            if ($file == $this_plugin) {
            $settings_link = '<a href="' . get_bloginfo('wpurl') . '/wp-admin/admin.php?page=woocommerce_settings&tab=payment_gateways&section=wc_gateway_bitpay">Settings</a>';
                array_unshift($links, $settings_link);
            }

            return $links;
        }
    }
    /**
    * Add Settings link to the plugin entry in the plugins menu for WC 2.1 and above
    **/
    else{
        add_filter('plugin_action_links', 'bitpay_plugin_action_links', 10, 2);

        function bitpay_plugin_action_links($links, $file)
        {
            static $this_plugin;

            if (!$this_plugin) {
                $this_plugin = plugin_basename(__FILE__);
            }

            if ($file == $this_plugin) {
                $settings_link = '<a href="' . get_bloginfo('wpurl') . '/wp-admin/admin.php?page=wc-settings&tab=checkout&section=wc_gateway_bitpay">Settings</a>';
                array_unshift($links, $settings_link);
            }

            return $links;
        }
    }

    // TODO: Try to find a way to make it work within the WC_Gateway_Bitpay class
    add_action( 'wp_ajax_bitpay_pair_code', 'ajax_bitpay_pair_code' );
    add_action( 'wp_ajax_bitpay_revoke_token', 'ajax_bitpay_revoke_token' );
    add_action( 'wp_ajax_bitpay_create_invoice', 'ajax_bitpay_create_invoice' );

    function ajax_bitpay_pair_code()
    {
        // Validate the Pairing Code
        $pairing_code = $_POST['pairing_code'];
        if (!preg_match('/^[a-zA-Z0-9]{7}$/',$pairing_code)) {
            wp_send_json(array("error"=>"Invalid Pairing Code"));
        }

        // Validate the Network
        $network = ($_POST['network'] === 'livenet') ? 'livenet' : 'testnet';

        // Generate Private Key
        $key = new \Bitpay\PrivateKey();
        $key->generate();

        // Generate Public Key
        $pub = new \Bitpay\PublicKey();
        $pub->setPrivateKey($key);
        $pub->generate();

        // Get SIN Format
        $sin = new \Bitpay\SinKey();
        $sin->setPublicKey($pub);
        $sin->generate();

        // Create an API Client
        $client = new \Bitpay\Client\Client();
        if ($network === 'livenet') {
            $client->setNetwork(new \Bitpay\Network\Livenet());
        } else {
            $client->setNetwork(new \Bitpay\Network\Testnet());
        }
        $client->setAdapter(new \Bitpay\Client\Adapter\CurlAdapter());
        $client->setPrivateKey($key);
        $client->setPublicKey($pub);

        try {
            $token = $client->createToken(
                array(
                    'id'          => (string) $sin,
                    'pairingCode' => $pairing_code,
                    'label'       => substr("WooCommerce - {$_SERVER['SERVER_NAME']}", 0, 60),
                )
            );
        } catch (Exception $e) {
            wp_send_json(array("error"=>$e->getMessage()));
        }

        update_option('woocommerce_bitpay_key', bitpay_encrypt($key));
        update_option('woocommerce_bitpay_pub', bitpay_encrypt($pub));
        update_option('woocommerce_bitpay_sin', (string) $sin);
        update_option('woocommerce_bitpay_token', bitpay_encrypt($token));
        update_option('woocommerce_bitpay_label', "WooCommerce - {$_SERVER['SERVER_NAME']}");
        update_option('woocommerce_bitpay_network', $network);
        wp_send_json(array('sin'=>(string) $sin, 'label'=>"WooCommerce - {$_SERVER['SERVER_NAME']}", 'network'=>$network));
    }

    function ajax_bitpay_revoke_token()
    {
        update_option('woocommerce_bitpay_key', null);
        update_option('woocommerce_bitpay_pub', null);
        update_option('woocommerce_bitpay_sin', null);
        update_option('woocommerce_bitpay_token', null);
        update_option('woocommerce_bitpay_label', null);
        update_option('woocommerce_bitpay_network', null);
        wp_send_json(array('success'=>'Token Revoked!'));
    }

    function bitpay_encrypt($data)
    {
        $mcrypt_ext = new \Bitpay\Crypto\McryptExtension();
        $fingerprint = \Bitpay\Util\Fingerprint::generate();
        $fingerprint = substr($fingerprint, 0, 24);

        $encrypted = $mcrypt_ext->encrypt(serialize($data), $fingerprint, '00000000');

        return $encrypted;
    }

    function bitpay_decrypt($encrypted)
    {
        $mcrypt_ext = new \Bitpay\Crypto\McryptExtension();
        $fingerprint = \Bitpay\Util\Fingerprint::generate();
        $fingerprint = substr($fingerprint, 0, 24);

        $decrypted = unserialize($mcrypt_ext->decrypt($encrypted, $fingerprint, '00000000'));

        return $decrypted;
    }

}

// Activating the plugin
function woocommerce_bitpay_activate()
{
    // Currently requires GMP
    if ( !extension_loaded( 'gmp' ) ) {
        $plugins_url = admin_url('plugins.php');
        deactivate_plugins( plugin_basename( __FILE__ ) );
        wp_die( 'BitPay for WooCommerce requires the GMP extension for PHP.  Sorry about that.<br><a href="'.$plugins_url.'">Return to plugins screen</a>' );
    }

    // Deactivate any older versions that might still be present
    $plugins = get_plugins();
    foreach ($plugins as $file => $plugin) {
        if ($plugin['Name'] == 'Bitpay Woocommerce') {
            if (is_plugin_active( $file )) {
                $plugins_url = admin_url('plugins.php');
                deactivate_plugins( plugin_basename( __FILE__ ) );
                wp_die( 'BitPay for WooCommerce requires that the old plugin, <b>Bitpay Woocommerce</b>, is deactivated and deleted.<br><a href="'.$plugins_url.'">Return to plugins screen</a>' );
            }
        }
    }

    // TODO: Refactor the version
    update_option('woocommerce_bitpay_version', '2.0.1');
}
