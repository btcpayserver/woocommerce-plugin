<?php

/*
    Plugin Name: BTCPay for WooCommerce
    Plugin URI:  https://wordpress.org/plugins/btcpay-for-woocommerce
    Description: Enable your WooCommerce store to accept Bitcoin with BTCPay.
    Author:      BTCPay
    Text Domain: BTCPay
    Author URI:  https://github.com/btcpayserver

    Version:           3.0.7
    License:           Copyright 2011-2018 BTCPay & BitPay Inc., MIT License
    License URI:       https://github.com/btcpayserver/woocommerce-plugin/blob/master/LICENSE
    GitHub Plugin URI: https://github.com/btcpayserver/woocommerce-plugin
 */


// Exit if accessed directly
if (false === defined('ABSPATH')) {
    exit;
}

define("BTCPAY_VERSION", "3.0.7");
$autoloader_param = __DIR__ . '/lib/Bitpay/Autoloader.php';

// Load up the BitPay library
if (true === file_exists($autoloader_param) &&
    true === is_readable($autoloader_param))
{
  if(false === class_exists("Bitpay\Autoloader")){
    require_once $autoloader_param;
    \Bitpay\Autoloader::register();
  }
} else {
    throw new \Exception('The BTCPay payment plugin was not installed correctly or the files are corrupt. Please reinstall the plugin. If this message persists after a reinstall, contact the BTCPay team through http://slack.btcpayserver.org with this message.');
}

// Exist for quirks in object serialization...
if (false === class_exists('Bitpay\PrivateKey')) {
    include_once(__DIR__ . '/lib/Bitpay/PrivateKey.php');
}

if (false === class_exists('Bitpay\PublicKey')) {
    include_once(__DIR__ . '/lib/Bitpay/PublicKey.php');
}

if (false === class_exists('Bitpay\Token')) {
    include_once(__DIR__ . '/lib/Bitpay/Token.php');
}

// Ensures WooCommerce is loaded before initializing the BitPay plugin
add_action('plugins_loaded', 'woocommerce_btcpay_init', 0);
add_action( 'admin_notices', 'fx_admin_notice_show_migration_message' );
register_activation_hook(__FILE__, 'woocommerce_btcpay_activate');

function woocommerce_btcpay_init()
{
    if (true === class_exists('WC_Gateway_BtcPay')) {
        return;
    }

    if (false === class_exists('WC_Payment_Gateway')) {
        return;
    }

	// Exist for quirks in object serialization...
	if (false === class_exists('Bitpay\PrivateKey')) {
		include_once(__DIR__ . '/lib/Bitpay/PrivateKey.php');
	}

	if (false === class_exists('Bitpay\PublicKey')) {
		include_once(__DIR__ . '/lib/Bitpay/PublicKey.php');
	}

	if (false === class_exists('Bitpay\Token')) {
		include_once(__DIR__ . '/lib/Bitpay/Token.php');
	}

    class WC_Gateway_BtcPay extends WC_Payment_Gateway
    {
        private $is_initialized = false;

        /**
         * Constructor for the gateway.
         */
        public function __construct()
        {
            // General
            $this->id                 = 'btcpay';
            $this->icon               = plugin_dir_url(__FILE__).'assets/img/icon.png';
            $this->has_fields         = false;
            $this->order_button_text  = __('Proceed to BTCPay', 'btcpay');
            $this->method_title       = 'BTCPay';
            $this->method_description = 'BTCPay allows you to accept bitcoin payments on your WooCommerce store.';

            // Load the settings.
            $this->init_form_fields();
            $this->init_settings();

            // Define user set variables
            $this->title              = $this->get_option('title');
            $this->description        = $this->get_option('description');
            $this->order_states       = $this->get_option('order_states');
            $this->debug              = 'yes' === $this->get_option('debug', 'no');

            // Define BitPay settings
            $this->api_key            = get_option('woocommerce_btcpay_key');
            $this->api_pub            = get_option('woocommerce_btcpay_pub');
            $this->api_sin            = get_option('woocommerce_btcpay_sin');
            $this->api_token          = get_option('woocommerce_btcpay_token');
            $this->api_token_label    = get_option('woocommerce_btcpay_label');
            $this->api_url        = get_option('woocommerce_btcpay_url');

            // Define debugging & informational settings
            $this->debug_php_version    = PHP_MAJOR_VERSION . '.' . PHP_MINOR_VERSION;
            $this->debug_plugin_version = constant("BTCPAY_VERSION");

            $this->log('BTCPay Woocommerce payment plugin object constructor called. Plugin is v' . $this->debug_plugin_version . ' and server is PHP v' . $this->debug_php_version);
            $this->log('    [Info] $this->api_key            = ' . $this->api_key);
            $this->log('    [Info] $this->api_pub            = ' . $this->api_pub);
            $this->log('    [Info] $this->api_sin            = ' . $this->api_sin);
            $this->log('    [Info] $this->api_token          = ' . $this->api_token);
            $this->log('    [Info] $this->api_token_label    = ' . $this->api_token_label);
            $this->log('    [Info] $this->api_url        = ' . $this->api_url);

            // Process Credentials
            if (false === empty($this->api_key)) {
                try {
                    $this->api_key    = $this->btcpay_decrypt($this->api_key);

                    if (false === empty($this->api_key)) {
                        $this->log('    [Info] Private Key decrypted successfully.');
                    } else {
                        $this->log('    [Error] Private Key decrypted successfully BUT the value itself is null or empty!');
                    }
                } catch (\Exception $e) {
                    $this->log('    [Error] Private Key corrupt. Message is: ' . $e->getMessage());
                }
            } else {

            }

            if (false === empty($this->api_pub)) {
                try {
                    $this->api_pub    = $this->btcpay_decrypt($this->api_pub);

                    if (false === empty($this->api_pub)) {
                        $this->log('    [Info] Public Key decrypted successfully.');
                    } else {
                        $this->log('    [Error] Public Key decrypted successfully BUT the value itself is null or empty!');
                    }
                } catch (\Exception $e) {
                    $this->log('    [Error] Public Key corrupt. Message is: ' . $e->getMessage());
                }
            }

            if (false === empty($this->api_token)) {
                try {
                    $this->api_token    = $this->btcpay_decrypt($this->api_token);

                    if (true === isset($this->api_token) && false === empty($this->api_token)) {
                        $this->log('    [Info] API Token decrypted successfully.');
                    } else {
                        $this->log('    [Error] API Token decrypted successfully BUT the value itself is null or empty!');
                    }
                } catch (\Exception $e) {
                    $this->log('    [Error] API Token corrupt. Message is: ' . $e->getMessage());
                }
            }

            // Check API Credentials
            if (!($this->api_key instanceof \Bitpay\PrivateKey)) {
                $this->api_key        = null;
                $this->log('    [Error] The API Key was NOT an instance of PrivateKey!  Instead, it appears to be a ' . gettype($this->api_key) . ' value.');
            }

            if (!($this->api_pub instanceof \Bitpay\PublicKey)) {
                $this->api_pub        = null;
                $this->log('    [Error] The Public Key was NOT an instance of PublicKey!  Instead, it appears to be a ' . gettype($this->api_pub) . ' value.');
            }

            if (!($this->api_token instanceof \Bitpay\Token)) {
                $this->api_token      = null;
                $this->log('    [Error] The API Token was NOT an instance of Token!  Instead, it appears to be a ' . gettype($this->api_token) . ' value.');
            }

            $this->transaction_speed  = $this->get_option('transaction_speed');
            $this->log('    [Info] Transaction speed is now set to: ' . $this->transaction_speed);

            // Actions
            add_action('woocommerce_update_options_payment_gateways_' . $this->id, array($this, 'process_admin_options'));
            add_action('woocommerce_update_options_payment_gateways_' . $this->id, array($this, 'save_order_states'));

            // Valid for use and IPN Callback
            if (false === $this->is_valid_for_use()) {
                $this->enabled = 'no';
                $this->log('    [Info] The plugin is NOT valid for use!');
            } else {
                $this->enabled = 'yes';
                $this->log('    [Info] The plugin is ok to use.');
                add_action('woocommerce_api_wc_gateway_btcpay', array($this, 'ipn_callback'));
            }

            $this->is_initialized = true;
        }

        public function is_btcpay_payment_method($order)
        {
            $actualMethod = '';
            if(method_exists($order, 'get_payment_method'))
            {
                $actualMethod = $order->get_payment_method();
            }
            else
            {
                $actualMethod = get_post_meta( $order->id, '_payment_method', true );
            }
            return $actualMethod === 'btcpay';
        }

        public function __destruct()
        {
        }

        public function is_valid_for_use()
        {
            // Check that API credentials are set
            if (true === is_null($this->api_key) ||
                true === is_null($this->api_pub) ||
                true === is_null($this->api_sin) ||
                true === is_null($this->api_token))
            {
                return false;
            }

            // Ensure the currency is supported by BitPay
            try {
                $currency = new \Bitpay\Currency(get_woocommerce_currency());

                if (false === isset($currency) || true === empty($currency)) {
                    $this->log('    [Error] The BTCPay payment plugin was called to check if it was valid for use but could not instantiate a currency object.');
                    throw new \Exception('The BTCPay payment plugin was called to check if it was valid for use but could not instantiate a currency object. Cannot continue!');
                }
            } catch (\Exception $e) {
                $this->log('    [Error] In is_valid_for_use: ' . $e->getMessage());
                return false;
            }

            $this->log('    [Info] Plugin is valid for use.');

            return true;
        }

        /**
         * Initialise Gateway Settings Form Fields
         */
        public function init_form_fields()
        {
            $this->log('    [Info] Entered init_form_fields()...');
            $log_file = 'btcpay-' . sanitize_file_name( wp_hash( 'btcpay' ) ) . '-log';
            $logs_href = get_bloginfo('wpurl') . '/wp-admin/admin.php?page=wc-status&tab=logs&log_file=' . $log_file;

            $this->form_fields = array(
                'title' => array(
                    'title'       => __('Title', 'btcpay'),
                    'type'        => 'text',
                    'description' => __('Controls the name of this payment method as displayed to the customer during checkout.', 'btcpay'),
                    'default'     => __('Bitcoin', 'btcpay'),
                    'desc_tip'    => true,
               ),
                'description' => array(
                    'title'       => __('Customer Message', 'btcpay'),
                    'type'        => 'textarea',
                    'description' => __('Message to explain how the customer will be paying for the purchase.', 'btcpay'),
                    'default'     => 'You will be redirected to BTCPay to complete your purchase.',
                    'desc_tip'    => true,
               ),
                'api_token' => array(
                    'type'        => 'api_token'
               ),
                'transaction_speed' => array(
                    'title'       => __('Invoice pass to "confirmed" state after', 'btcpay'),
                    'type'        => 'select',
                    'description' => 'An invoice becomes confirmed after the payment has...',
                    'options'     => array(
                        'default' => 'Keep store level configuration',
                        'high'    => '0 confirmation on-chain',
                        'medium'  => '1 confirmation on-chain',
                        'low-medium'  => '2 confirmations on-chain',
                        'low'     => '6 confirmations on-chain',
                    ),
                    'default' => 'default',
                    'desc_tip'    => true,
               ),
                'order_states' => array(
                    'type' => 'order_states'
               ),
                'debug' => array(
                    'title'       => __('Debug Log', 'btcpay'),
                    'type'        => 'checkbox',
                    'label'       => sprintf(__('Enable logging <a href="%s" class="button">View Logs</a>', 'btcpay'), $logs_href),
                    'default'     => 'no',
                    'description' => sprintf(__('Log BTCPay events, such as IPN requests, inside <code>%s</code>', 'btcpay'), wc_get_log_file_path('btcpay')),
                    'desc_tip'    => true,
               ),
                'notification_url' => array(
                    'title'       => __('Notification URL', 'btcpay'),
                    'type'        => 'url',
                    'description' => __('BTCPay will send IPNs for orders to this URL with the BTCPay invoice data', 'btcpay'),
                    'default'     => '',
                    'placeholder' => WC()->api_request_url('WC_Gateway_BtcPay'),
                    'desc_tip'    => true,
               ),
                'redirect_url' => array(
                    'title'       => __('Redirect URL', 'btcpay'),
                    'type'        => 'url',
                    'description' => __('After paying the BTCPay invoice, users will be redirected back to this URL', 'btcpay'),
                    'default'     => '',
                    'placeholder' => $this->get_return_url(),
                    'desc_tip'    => true,
               ),
                'support_details' => array(
		            'title'       => __( 'Plugin & Support Information', 'btcpay' ),
		            'type'        => 'title',
		            'description' => sprintf(__('This plugin version is %s and your PHP version is %s. If you need assistance, please come on our slack http://slack.btcpayserver.org.  Thank you for using BTCPay!', 'btcpay'), constant("BTCPAY_VERSION"), PHP_MAJOR_VERSION . '.' . PHP_MINOR_VERSION),
	           ),
           );

            $this->log('    [Info] Initialized form fields: ' . var_export($this->form_fields, true));
            $this->log('    [Info] Leaving init_form_fields()...');
        }

        /**
         * HTML output for form field type `api_token`
         */
        public function generate_api_token_html()
        {
            $this->log('    [Info] Entered generate_api_token_html()...');

            ob_start();

            // TODO: CSS Imports aren't optimal, but neither is this.  Maybe include the css to be css-minimized?
            wp_enqueue_style('font-awesome', '//netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css');
            wp_enqueue_style('btcpay-token', plugins_url('assets/css/style.css', __FILE__));
            wp_enqueue_script('btcpay-pairing', plugins_url('assets/js/pairing.js', __FILE__), array('jquery'), null, true);
            wp_localize_script( 'btcpay-pairing', 'BtcPayAjax', array(
                'ajaxurl'     => admin_url( 'admin-ajax.php' ),
                'pairNonce'   => wp_create_nonce( 'btcpay-pair-nonce' ),
                'revokeNonce' => wp_create_nonce( 'btcpay-revoke-nonce' )
                )
            );

            $pairing_form = file_get_contents(plugin_dir_path(__FILE__).'templates/pairing.tpl');
            $token_format = file_get_contents(plugin_dir_path(__FILE__).'templates/token.tpl');
            ?>
            <tr valign="top">
                <th scope="row" class="titledesc">API Token:</th>
                <td class="forminp" id="btcpay_api_token">
                    <div id="btcpay_api_token_form">
                        <?php
                            if (true === empty($this->api_token)) {
                                echo sprintf($pairing_form, 'visible');
                                echo sprintf($token_format, 'hidden', plugins_url('assets/img/logo.png', __FILE__),'','');
                            } else {
                                echo sprintf($pairing_form, 'hidden');
                                echo sprintf($token_format, 'livenet', plugins_url('assets/img/logo.png', __FILE__), $this->api_token_label, $this->api_sin);
                            }

                        ?>
                    </div>
                       <script type="text/javascript">
                        var ajax_loader_url = '<?php echo plugins_url('assets/img/ajax-loader.gif', __FILE__); ?>';
                    </script>
                </td>
            </tr>
            <?php

            $this->log('    [Info] Leaving generate_api_token_html()...');

            return ob_get_clean();
        }

        /**
         * HTML output for form field type `order_states`
         */
        public function generate_order_states_html()
        {
            $this->log('    [Info] Entered generate_order_states_html()...');

            ob_start();

            $bp_statuses = array(
			'new'=>'New Order', 
			'paid'=>'Paid', 
			'confirmed'=>'Confirmed', 
			'complete'=>'Complete', 
			'invalid'=>'Invalid', 
			'expired'=>'Expired', 
			'event_invoice_paidAfterExpiration'=>'Paid after expiration', 
			'event_invoice_expiredPaidPartial' => 'Expired with partial payment');
            $df_statuses = array(
			'new'=>'wc-pending', 
			'paid'=>'wc-on-hold', 
			'confirmed'=>'wc-processing', 
			'complete'=>'wc-processing', 
			'invalid'=>'wc-failed', 
			'expired'=>'wc-cancelled', 
			'event_invoice_paidAfterExpiration' => 'wc-failed', 
			'event_invoice_expiredPaidPartial' => 'wc-failed');

            $wc_statuses = wc_get_order_statuses();
            $wc_statuses = array('BTCPAY_IGNORE' => '') + $wc_statuses;
            ?>
            <tr valign="top">
                <th scope="row" class="titledesc">Order States:</th>
                <td class="forminp" id="btcpay_order_states">
                    <table cellspacing="0">
                        <?php

                            foreach ($bp_statuses as $bp_state => $bp_name) {
                            ?>
                            <tr>
                            <th><?php echo $bp_name; ?></th>
                            <td>
                                <select name="woocommerce_btcpay_order_states[<?php echo $bp_state; ?>]">
                                <?php

                                $order_states = get_option('woocommerce_btcpay_settings');
                                $order_states = $order_states['order_states'];
                                foreach ($wc_statuses as $wc_state => $wc_name) {
                                    $current_option = $order_states[$bp_state];

                                    if (true === empty($current_option)) {
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

            $this->log('    [Info] Leaving generate_order_states_html()...');

            return ob_get_clean();
        }

        /**
         * Save order states
         */
        public function save_order_states()
        {
            $this->log('    [Info] Entered save_order_states()...');

            $bp_statuses = array(
                'new'      => 'New Order',
                'paid'      => 'Paid',
                'confirmed' => 'Confirmed',
                'complete'  => 'Complete',
                'invalid'   => 'Invalid',
                'expired'   => 'Expired',
                'event_invoice_paidAfterExpiration' => 'Paid after expiration',
                'event_invoice_expiredPaidPartial' => 'Expired with partial payment'
            );

            $wc_statuses = wc_get_order_statuses();

            if (true === isset($_POST['woocommerce_btcpay_order_states'])) {

                $bp_settings = get_option('woocommerce_btcpay_settings');
                $order_states = $bp_settings['order_states'];

                foreach ($bp_statuses as $bp_state => $bp_name) {
                    if (false === isset($_POST['woocommerce_btcpay_order_states'][ $bp_state ])) {
                        continue;
                    }

                    $wc_state = $_POST['woocommerce_btcpay_order_states'][ $bp_state ];

                    if (true === array_key_exists($wc_state, $wc_statuses)) {
                        $this->log('    [Info] Updating order state ' . $bp_state . ' to ' . $wc_state);
                        $order_states[$bp_state] = $wc_state;
                    }

                }
                $bp_settings['order_states'] = $order_states;
                update_option('woocommerce_btcpay_settings', $bp_settings);
            }

            $this->log('    [Info] Leaving save_order_states()...');
        }

        /**
         * Validate API Token
         */
        public function validate_api_token_field()
        {
            return '';
        }

        /**
         * Validate Support Details
         */
        public function validate_support_details_field()
        {
            return '';
        }

        /**
         * Validate Order States
         */
        public function validate_order_states_field()
        {
            $order_states = $this->get_option('order_states');

            $order_states_key = $this->plugin_id . $this->id . '_order_states';
            if ( isset( $_POST[ $order_states_key ] ) ) {
                $order_states = $_POST[ $order_states_key ];
            }
            return $order_states;
        }

        /**
         * Validate Notification URL
         */
        public function validate_url_field($key)
        {
            $url = $this->get_option($key);

            if ( isset( $_POST[ $this->plugin_id . $this->id . '_' . $key ] ) ) {
                 if (filter_var($_POST[ $this->plugin_id . $this->id . '_' . $key ], FILTER_VALIDATE_URL) !== false) {
                     $url = $_POST[ $this->plugin_id . $this->id . '_' . $key ];
                 } else {
                     $url = '';
                 }
             }
             return $url;
        }

        /**
         * Validate Redirect URL
         */
        public function validate_redirect_url_field()
        {
            $redirect_url = $this->get_option('redirect_url', '');

            if ( isset( $_POST['woocommerce_btcpay_redirect_url'] ) ) {
                 if (filter_var($_POST['woocommerce_btcpay_redirect_url'], FILTER_VALIDATE_URL) !== false) {
                     $redirect_url = $_POST['woocommerce_btcpay_redirect_url'];
                 } else {
                     $redirect_url = '';
                 }
             }
             return $redirect_url;
        }

        /**
         * Output for the order received page.
         */
        public function thankyou_page($order_id)
        {
            $this->log('    [Info] Entered thankyou_page with order_id =  ' . $order_id);

            // Remove cart
            WC()->cart->empty_cart();
            
            // Intentionally blank.

            $this->log('    [Info] Leaving thankyou_page with order_id =  ' . $order_id);
        }

        public function get_btcpay_redirect($order_id, $client)
        {
            $redirect = get_post_meta($order_id, 'BTCPay_redirect', true);
            if($redirect)
            {
                $invoice_id = get_post_meta($order_id, 'BTCPay_id', true);;
                $invoice = $client->getInvoice($invoice_id);
                $status = $invoice->getStatus();
                if($status === 'invalid' || $status === 'expired')
                {
                    $redirect = null;
                }
            }
            return $redirect;
        }

        /**
         * Process the payment and return the result
         *
         * @param   int     $order_id
         * @return  array
         */
        public function process_payment($order_id)
        {
            $this->log('    [Info] Entered process_payment() with order_id = ' . $order_id . '...');

            if (true === empty($order_id)) {
                $this->log('    [Error] The BTCPay payment plugin was called to process a payment but the order_id was missing.');
                throw new \Exception('The BTCPay payment plugin was called to process a payment but the order_id was missing. Cannot continue!');
            }

            $order = wc_get_order( $order_id );

            if (false === $order) {
                $this->log('    [Error] The BTCPay payment plugin was called to process a payment but could not retrieve the order details for order_id ' . $order_id);
                throw new \Exception('The BTCPay payment plugin was called to process a payment but could not retrieve the order details for order_id ' . $order_id . '. Cannot continue!');
            }

            $notification_url = $this->get_option('notification_url', WC()->api_request_url('WC_Gateway_BtcPay'));
            $this->log('    [Info] Generating payment form for order ' . $order->get_order_number() . '. Notify URL: ' . $notification_url);
           
            // Mark new order according to user settings (we're awaiting the payment)
            $new_order_states = $this->get_option('order_states');
            $new_order_status = $new_order_states['new'];
            $this->log('    [Info] Changing order status to: '.$new_order_status);
            
            $order->update_status($new_order_status);
            $this->log('    [Info] Changed order status result');
            $thanks_link = $this->get_return_url($order);

            $this->log('    [Info] The variable thanks_link = ' . $thanks_link . '...');

            // Redirect URL & Notification URL
            $redirect_url = $this->get_option('redirect_url', $thanks_link);

            if($redirect_url !== $thanks_link)
            {
                $order_received_len = strlen('order-received');
                if(substr($redirect_url, -$order_received_len) === 'order-received')
                {
                    $this->log('substr($redirect_url, -$order_received_pos) === order-received');
                    $redirect_url = $redirect_url . '=' . $order->get_id();
                }
                else
                {
                    $redirect_url = add_query_arg( 'order-received', $order->get_id(), $redirect_url);
                }
                $redirect_url = add_query_arg( 'key', $order->get_order_key(), $redirect_url);
            }

            $this->log('    [Info] The variable redirect_url = ' . $redirect_url  . '...');

            $this->log('    [Info] Notification URL is now set to: ' . $notification_url . '...');

            // Setup the currency
            $currency_code = get_woocommerce_currency();

            $this->log('    [Info] The variable currency_code = ' . $currency_code . '...');

            $currency = new \Bitpay\Currency($currency_code);

            if (false === isset($currency) && true === empty($currency)) {
                $this->log('    [Error] The BTCPay payment plugin was called to process a payment but could not instantiate a Currency object.');
                throw new \Exception('The BTCPay payment plugin was called to process a payment but could not instantiate a Currency object. Cannot continue!');
            }

            // Get a BitPay Client to prepare for invoice creation
            $client = new \Bitpay\Client\Client();

            if (false === isset($client) && true === empty($client)) {
                $this->log('    [Error] The BTCPay payment plugin was called to process a payment but could not instantiate a client object.');
                throw new \Exception('The BTCPay payment plugin was called to process a payment but could not instantiate a client object. Cannot continue!');
            }
            $url = $this->api_url;
            $client->setUri($url);
            $this->log('    [Info] Set url to ' + $this->api_url);


            $curlAdapter = new \Bitpay\Client\Adapter\CurlAdapter();

            if (false === isset($curlAdapter) || true === empty($curlAdapter)) {
                $this->log('    [Error] The BTCPay payment plugin was called to process a payment but could not instantiate a CurlAdapter object.');
                throw new \Exception('The BTCPay payment plugin was called to process a payment but could not instantiate a CurlAdapter object. Cannot continue!');
            }

            $client->setAdapter($curlAdapter);

            if (false === empty($this->api_key)) {
                $client->setPrivateKey($this->api_key);
            } else {
                $this->log('    [Error] The BTCPay payment plugin was called to process a payment but could not set client->setPrivateKey to this->api_key. The empty() check failed!');
                throw new \Exception(' The BTCPay payment plugin was called to process a payment but could not set client->setPrivateKey to this->api_key. The empty() check failed!');
            }

            if (false === empty($this->api_pub)) {
                $client->setPublicKey($this->api_pub);
            } else {
                $this->log('    [Error] The BTCPay payment plugin was called to process a payment but could not set client->setPublicKey to this->api_pub. The empty() check failed!');
                throw new \Exception(' The BTCPay payment plugin was called to process a payment but could not set client->setPublicKey to this->api_pub. The empty() check failed!');
            }

            if (false === empty($this->api_token)) {
                $client->setToken($this->api_token);
            } else {
                $this->log('    [Error] The BTCPay payment plugin was called to process a payment but could not set client->setToken to this->api_token. The empty() check failed!');
                throw new \Exception(' The BTCPay payment plugin was called to process a payment but could not set client->setToken to this->api_token. The empty() check failed!');
            }

            $redirect = $this->get_btcpay_redirect($order_id, $client);

            if($redirect)
            {
                $this->log('    [Info] Existing BTCPay invoice has already been created, redirecting to it...');
                $this->log('    [Info] Leaving process_payment()...');
                return array(
                    'result'   => 'success',
                    'redirect' => $redirect,
                );
            }

            $this->log('    [Info] Key and token empty checks passed.  Parameters in client set accordingly...');

            // Setup the Invoice
            $invoice = new \Bitpay\Invoice();

            if (false === isset($invoice) || true === empty($invoice)) {
                $this->log('    [Error] The BTCPay payment plugin was called to process a payment but could not instantiate an Invoice object.');
                throw new \Exception('The BTCPay payment plugin was called to process a payment but could not instantiate an Invoice object. Cannot continue!');
            } else {
                $this->log('    [Info] Invoice object created successfully...');
            }

            $order_number = $order->get_order_number();
            $invoice->setOrderId((string)$order_number);
            $invoice->setCurrency($currency);
            $invoice->setFullNotifications(true);
            $invoice->setExtendedNotifications(true);

            // Add a priced item to the invoice
            $item = new \Bitpay\Item();

            if (false === isset($item) || true === empty($item)) {
                $this->log('    [Error] The BTCPay payment plugin was called to process a payment but could not instantiate an item object.');
                throw new \Exception('The BTCPay payment plugin was called to process a payment but could not instantiate an item object. Cannot continue!');
            } else {
                $this->log('    [Info] Item object created successfully...');
            }

            $order_total = $order->calculate_totals();
            if (true === isset($order_total) && false === empty($order_total)) {
                $order_total = (float)$order_total;
                if($order_total == 0 || $order_total === '0')
                    throw new \Bitpay\Client\ArgumentException("Price must be formatted as a float ". $order_total);
                $item->setPrice($order_total);
                $taxIncluded = $order->get_cart_tax();
                $item->setTaxIncluded($taxIncluded);
            } else {
                $this->log('    [Error] The BTCPay payment plugin was called to process a payment but could not set item->setPrice to $order->calculate_totals(). The empty() check failed!');
                throw new \Exception('The BTCPay payment plugin was called to process a payment but could not set item->setPrice to $order->calculate_totals(). The empty() check failed!');
            }
            // Add buyer's email to the invoice
            $buyer = new \Bitpay\Buyer();
            $buyer->setEmail($order->get_billing_email());
            $invoice->setBuyer($buyer);
            $invoice->setItem($item);

            // Add the Redirect and Notification URLs
            $invoice->setRedirectUrl($redirect_url);
            $invoice->setNotificationUrl($notification_url);
            $invoice->setTransactionSpeed($this->transaction_speed);  
            
            try {
                $this->log('    [Info] Attempting to generate invoice for ' . $order->get_order_number() . '...');

                $invoice = $client->createInvoice($invoice);

                if (false === isset($invoice) || true === empty($invoice)) {
                    $this->log('    [Error] The BTCPay payment plugin was called to process a payment but could not instantiate an invoice object.');
                    throw new \Exception('The BTCPay payment plugin was called to process a payment but could not instantiate an invoice object. Cannot continue!');
                } else {
                    $this->log('    [Info] Call to generate invoice was successful: ' . $client->getResponse()->getBody());
                }
            } catch (\Exception $e) {
                $this->log('    [Error] Error generating invoice for ' . $order->get_order_number() . ', "' . $e->getMessage() . '"');
                error_log($e->getMessage());

                return array(
                    'result'    => 'success',
                    'messages'  => 'Sorry, but Bitcoin checkout with BTCPay does not appear to be working.'
                );
            }

            $responseData = json_decode($client->getResponse()->getBody());

            // If another BTCPay invoice was created before, returns the original one
            $redirect = $this->get_btcpay_redirect($order_id, $client);
            if($redirect)
            {
                $this->log('    [Info] Existing BTCPay invoice has already been created, redirecting to it...');
                $this->log('    [Info] Leaving process_payment()...');
                return array(
                    'result'   => 'success',
                    'redirect' => $redirect,
                );
            }

            update_post_meta($order_id, 'BTCPay_redirect', $invoice->getUrl());
            update_post_meta($order_id, 'BTCPay_id', $invoice->getId());
            update_post_meta($order_id, 'BTCPay_rate', $invoice->getRate());
            $formattedRate = number_format($invoice->getRate(), wc_get_price_decimals(), wc_get_price_decimal_separator(), wc_get_price_thousand_separator()); 
            update_post_meta($order_id, 'BTCPay_formatted_rate', $formattedRate);

            $this->update_btcpay($order_id, $responseData);

            // Reduce stock levels
            if (function_exists('wc_reduce_stock_levels'))
            {
                wc_reduce_stock_levels($order_id);		       
            }
            else
            {
                $order->reduce_order_stock();
            }
        

            $this->log('    [Info] BTCPay invoice assigned ' . $invoice->getId());
            $this->log('    [Info] Leaving process_payment()...');

            // Redirect the customer to the BitPay invoice
            return array(
                'result'   => 'success',
                'redirect' => $invoice->getUrl(),
            );
        }

        public function ipn_callback()
        {
            $this->log('    [Info] Entered ipn_callback()...');
            // Retrieve the Invoice ID and Network URL from the supposed IPN data
            $post = file_get_contents("php://input");

            if (true === empty($post)) {
                $this->log('    [Error] No post data sent to IPN handler!');
                error_log('[Error] BTCPay plugin received empty POST data for an IPN message.');

                wp_die('No post data');
            } else {
                $this->log('    [Info] The post data sent to IPN handler is present...');
            }

            $json = json_decode($post, true);
            $event = "";

            if(true === array_key_exists('event', $json) && true === array_key_exists('data', $json)) // extended notification type
            {
                $this->log('    [Info] Event IPN received...');
                $event = $json['event'];
                $json = $json['data'];
            }
            else
            {
                $this->log('    [Info] Normal IPN received...');
            }

            if (true === empty($json)) {
                $this->log('    [Error] Invalid JSON payload sent to IPN handler: ' . $post);
                error_log('[Error] BTCPay plugin received an invalid JSON payload sent to IPN handler: ' . $post);

                wp_die('Invalid JSON');
            } else {
                $this->log('    [Info] The post data was decoded into JSON...');
            }

            if (false === array_key_exists('id', $json)) {
                $this->log('    [Error] No invoice ID present in JSON payload: ' . var_export($json, true));
                error_log('[Error] BTCPay plugin did not receive an invoice ID present in JSON payload: ' . var_export($json, true));

                wp_die('No Invoice ID');
            } else {
                $this->log('    [Info] Invoice ID present in JSON payload...');
            }

            if (false === array_key_exists('url', $json)) {
                $this->log('    [Error] No invoice URL present in JSON payload: ' . var_export($json, true));
                error_log('[Error] BTCPay plugin did not receive an invoice URL present in JSON payload: ' . var_export($json, true));

                wp_die('No Invoice URL');
            } else {
                $this->log('    [Info] Invoice URL present in JSON payload...');
            }

            // Get a BitPay Client to prepare for invoice fetching
            $client = new \Bitpay\Client\Client();

            if (false === isset($client) && true === empty($client)) {
                $this->log('    [Error] The BTCPay payment plugin was called to handle an IPN but could not instantiate a client object.');
                throw new \Exception('The BTCPay payment plugin was called to handle an IPN but could not instantiate a client object. Cannot continue!');
            } else {
                $this->log('    [Info] Created new Client object in IPN handler...');
            }
            
            $url = $this->api_url;
            $client->setUri($url);
            $this->log('    [Info] Set url to ' + $this->api_url);

            $curlAdapter = new \Bitpay\Client\Adapter\CurlAdapter();

            if (false === isset($curlAdapter) && true === empty($curlAdapter)) {
                $this->log('    [Error] The BTCPay payment plugin was called to handle an IPN but could not instantiate a CurlAdapter object.');
                throw new \Exception('The BTCPay payment plugin was called to handle an IPN but could not instantiate a CurlAdapter object. Cannot continue!');
            } else {
                $this->log('    [Info] Created new CurlAdapter object in IPN handler...');
            }

            // Setting the Adapter param to a new BitPay CurlAdapter object
            $client->setAdapter($curlAdapter);

            if (false === empty($this->api_key)) {
                $client->setPrivateKey($this->api_key);
            } else {
                $this->log('    [Error] The BTCPay payment plugin was called to handle an IPN but could not set client->setPrivateKey to this->api_key. The empty() check failed!');
                throw new \Exception('The BTCPay payment plugin was called to handle an IPN but could not set client->setPrivateKey to this->api_key. The empty() check failed!');
            }

            if (false === empty($this->api_pub)) {
                $client->setPublicKey($this->api_pub);
            } else {
                $this->log('    [Error] The BTCPay payment plugin was called to handle an IPN but could not set client->setPublicKey to this->api_pub. The empty() check failed!');
                throw new \Exception('The BTCPay payment plugin was called to handle an IPN but could not set client->setPublicKey to this->api_pub. The empty() check failed!');
            }

            if (false === empty($this->api_token)) {
                $client->setToken($this->api_token);
            } else {
                $this->log('    [Error] The BTCPay payment plugin was called to handle an IPN but could not set client->setToken to this->api_token. The empty() check failed!');
                throw new \Exception('The BTCPay payment plugin was called to handle an IPN but could not set client->setToken to this->api_token. The empty() check failed!');
            }

            $this->log('    [Info] Key and token empty checks passed.  Parameters in client set accordingly...');

            // Fetch the invoice from BitPay's server to update the order
            try {
                $invoice = $client->getInvoice($json['id']);

                if (true === isset($invoice) && false === empty($invoice)) {
                    $this->log('    [Info] The IPN check appears to be valid.');
                } else {
                    $this->log('    [Error] The IPN check did not pass!');
                    wp_die('Invalid IPN');
                }
            } catch (\Exception $e) {
                $error_string = 'IPN Check: Can\'t find invoice ' . $json['id'];
                $this->log("    [Error] $error_string");
                $this->log("    [Error] " . $e->getMessage());

                wp_die($e->getMessage());
            }

            $order_id = $invoice->getOrderId();
            $responseData = json_decode($client->getResponse()->getBody());

            if (false === isset($order_id) && true === empty($order_id)) {
                $this->log('    [Error] The BTCPay payment plugin was called to process an IPN message but could not obtain the order ID from the invoice.');
                throw new \Exception('The BTCPay payment plugin was called to process an IPN message but could not obtain the order ID from the invoice. Cannot continue!');
            } else {
                $this->log('    [Info] Order ID is: ' . $order_id);
            }

	    //this is for the basic and advanced woocommerce order numbering plugins
	    //if we need to apply other filters, just add them in place of the this one
            $order_id = apply_filters('woocommerce_order_id_from_number', $order_id);

            $order = wc_get_order($order_id);


            if (false === $order || ('WC_Order' !== get_class($order) && 'WC_Admin_Order' !== get_class($order))) {
                $this->log('    [Error] The BTCPay payment plugin was called to process an IPN message but could not retrieve the order details for order_id: "' . $order_id . '". If you use an alternative order numbering system, please see class-wc-gateway-btcpay.php to apply a search filter.');
                throw new \Exception('The BTCPay payment plugin was called to process an IPN message but could not retrieve the order details for order_id ' . $order_id . '. Cannot continue!');
            } else {
                $this->log('    [Info] Order details retrieved successfully...');
            }

            if(!$this->is_btcpay_payment_method($order))
            {
                $this->log('    [Info] Not using btcpay payment method...');
                $this->log('    [Info] Leaving ipn_callback()...');
                return;
            }

            $expected_invoiceId = get_post_meta($order_id, 'BTCPay_id', true);

            if (false !== isset($expected_invoiceId) || true === empty($expected_invoiceId)) {
                $this->log('    [Info] Receiving IPN for an order which has no expected invoice ID, ignoring the IPN...');
                return;
            }

            if($expected_invoiceId !== $json['id'])
            {
                $this->log('    [Error] Received IPN for order '. $order_id . ' with BTCPay invoice id ' . $json['id'] . ' while expected BTCPay invoice is ' . $expected_invoiceId);
                throw new \Exception('Received IPN for order '. $order_id . ' with BTCPay invoice id ' . $json['id'] . ' while expected BTCPay invoice is ' . $expected_invoiceId);
            }

            $current_status = $order->get_status();

            if (false === isset($current_status) && true === empty($current_status)) {
                $this->log('    [Error] The BTCPay payment plugin was called to process an IPN message but could not obtain the current status from the order.');
                throw new \Exception('The BTCPay payment plugin was called to process an IPN message but could not obtain the current status from the order. Cannot continue!');
            } else {
                $this->log('    [Info] The current order status for this order is ' . $current_status);
            }

            $order_states = $this->get_option('order_states');

            $new_order_status = $order_states['new'];
            $paid_status      = $order_states['paid'];
            $confirmed_status = $order_states['confirmed'];
            $complete_status  = $order_states['complete'];
            $invalid_status   = $order_states['invalid'];
            $expired_status   = $order_states['expired'];
            $event_invoice_paidAfterExpiration   = $order_states['event_invoice_paidAfterExpiration'];
            $event_invoice_expiredPaidPartial    = $order_states['event_invoice_expiredPaidPartial'];

            $checkStatus = $invoice->getStatus();

            if (false === isset($checkStatus) && true === empty($checkStatus)) {
                $this->log('    [Error] The BTCPay payment plugin was called to process an IPN message but could not obtain the current status from the invoice.');
                throw new \Exception('The BTCPay payment plugin was called to process an IPN message but could not obtain the current status from the invoice. Cannot continue!');
            } else {
                $this->log('    [Info] The current status for this invoice is ' . $checkStatus);
            }

            if($event === "")
            {
                switch ($checkStatus) {

                    // The "paid" IPN message is received almost
                    // immediately after the BitPay invoice is paid.
                    case 'paid':
                        $this->log('    [Info] This order has not been updated yet so setting new status...');
                        if($paid_status !== 'BTCPAY_IGNORE')
                            $order->update_status($paid_status);
                        $order->add_order_note(__('BTCPay invoice paid. Awaiting network confirmation and payment completed status.', 'btcpay'));
                        break;

                    // The "confirmed" status is sent when the payment is
                    // confirmed based on your transaction speed setting.
                    case 'confirmed':
                        $this->log('    [Info] This order has not been updated yet so setting confirmed status...');
                        if($confirmed_status !== 'BTCPAY_IGNORE')
                            $order->update_status($confirmed_status);
                        $order->add_order_note(__('BTCPay invoice confirmed. Awaiting payment completed status.', 'btcpay'));
                        break;

                    // The complete status is when the Bitcoin network
                    // obtains 6 confirmations for this transaction.
                    case 'complete':

                        $this->log('    [Info] This order has not been updated yet so setting complete status...');

                        $order->payment_complete();
                        if($complete_status !== 'BTCPAY_IGNORE')
                            $order->update_status($complete_status);
                        $order->add_order_note(__('BTCPay invoice payment completed. Payment credited to your merchant account.', 'btcpay'));
                        break;

                    // This order is invalid for some reason.
                    // Either it's a double spend or some other
                    // problem occurred.
                    case 'invalid':

                        $this->log('    [Info] This order has a problem so setting "invalid" status...');
                        if($invalid_status !== 'BTCPAY_IGNORE')
                            $order->update_status($invalid_status, __('Bitcoin payment is invalid for this order! The payment was not confirmed by the network within on time. Do not ship the product for this order!', 'btcpay'));
                        break;

                    case 'expired':

                        $this->log('    [Info] The invoice is in the "expired" status...');
                        if($expired_status !== 'BTCPAY_IGNORE')
                            $order->update_status($expired_status, __('Bitcoin payment has expired for this order! The payment was not broadcasted before its expiration. Do not ship the product for this order!', 'btcpay'));
                        break;

                    // There was an unknown message received.
                    default:

                        $this->log('    [Info] IPN response is an unknown message type. See error message below:');
                        $error_string = 'Unhandled invoice status: ' . $invoice->getStatus();
                        $this->log("    [Warning] $error_string");
                }
                $this->update_btcpay($order_id, $responseData);
            }
            else //  is an event
            {
                $this->log('    [Info] Received event: '. $event['code'] . " " . $event['name']);
                if ($event['code'] === 1009)
                {
                    $this->log('    [Info] The invoice has received a payment after expiration...');
                    if($event_invoice_paidAfterExpiration !== 'BTCPAY_IGNORE')
                        $order->update_status($event_invoice_paidAfterExpiration , __('A payment has arrived late for this order!', 'btcpay'));
                    $order->add_order_note(__('A payment has been received after expiration', 'btcpay'));
                }
                if ($event['code'] === 2000)
                {
                    $this->log('    [Info] The invoice has expired while a partial payment has been sent...');
                    if($event_invoice_expiredPaidPartial !== 'BTCPAY_IGNORE')
                        $order->update_status($event_invoice_expiredPaidPartial , __('The invoice has expired while a partial payment has been sent'));
                    $order->add_order_note(__('The invoice has expired while a partial payment has been sent', 'btcpay'));
                }
            }
            $this->log('    [Info] Leaving ipn_callback()...');
        }

        public function update_btcpay($order_id, $responseData)
        {
            update_post_meta($order_id, 'BTCPay_btcPrice', $responseData->data->btcPrice);
            update_post_meta($order_id, 'BTCPay_btcPaid', $responseData->data->btcPaid);
            update_post_meta($order_id, 'BTCPay_BTCaddress', $responseData->data->bitcoinAddress);		
        }

        public function log($message)
        {
            if (true === isset($this->debug) && 'yes' == $this->debug) {
                if (false === isset($this->logger) || true === empty($this->logger)) {
                    $this->logger = new WC_Logger();
                }

                $this->logger->add('btcpay', $message);
            }
        }

        public function btcpay_encrypt($data)
        {
            if (false === isset($data) || true === empty($data)) {
                throw new \Exception('The BTCPay payment plugin was called to encrypt data but no data was passed!');
            }

            $this->log('    [Info] Entered btcpay_encrypt...');

            $openssl_ext = new \Bitpay\Crypto\OpenSSLExtension();
            $fingerprint = sha1(sha1(__DIR__));

            if (true === isset($fingerprint) &&
                true === isset($openssl_ext)  &&
                strlen($fingerprint) > 24)
            {
                $fingerprint = substr($fingerprint, 0, 24);

                if (false === isset($fingerprint) || true === empty($fingerprint)) {
                    throw new \Exception('The BTCPay payment plugin was called to encrypt data but could not generate a fingerprint parameter!');
                }

                $encrypted = $openssl_ext->encrypt(base64_encode(serialize($data)), $fingerprint, '1234567890123456');

                if (true === empty($encrypted)) {
                    throw new \Exception('The BTCPay payment plugin was called to encrypt a serialized object and failed!');
                }

                $this->log('    [Info] Leaving class level btcpay_encrypt...');

                return $encrypted;
            } else {
                $this->log('    [Error] Invalid server fingerprint generated in btcpay_encrypt()');
                wp_die('Invalid server fingerprint generated');
            }
        }

        public function btcpay_decrypt($encrypted)
        {
            if (false === isset($encrypted) || true === empty($encrypted)) {
                throw new \Exception('The BTCPay payment plugin was called to decrypt data but no data was passed!');
            }

            $this->log('    [Info] Entered class level btcpay_decrypt...');
         
            $openssl_ext = new \Bitpay\Crypto\OpenSSLExtension();

            $fingerprint = sha1(sha1(__DIR__));

            if (true === isset($fingerprint) &&
                true === isset($openssl_ext)  &&
                strlen($fingerprint) > 24)
            {
                $fingerprint = substr($fingerprint, 0, 24);

                if (false === isset($fingerprint) || true === empty($fingerprint)) {
                    throw new \Exception('The BTCPay payment plugin was called to decrypt data but could not generate a fingerprint parameter!');
                }

                $decrypted = base64_decode($openssl_ext->decrypt($encrypted, $fingerprint, '1234567890123456'));

                // Strict base64 char check
                if (false === base64_decode($decrypted, true)) {
                    $this->log('    [Warning] In btcpay_decrypt: data appears to have already been decrypted. Strict base64 check failed.');
                } else {
                    $decrypted = base64_decode($decrypted);
                }

                if (true === empty($decrypted)) {
                    throw new \Exception('The BTCPay payment plugin was called to unserialize a decrypted object and failed! The decrypt function was called with "' . $encrypted . '"');
                }

                $this->log('    [Info] Leaving class level btcpay_decrypt...');

                return unserialize($decrypted);
            } else {
                $this->log('    [Error] Invalid server fingerprint generated in btcpay_decrypt()');
                wp_die('Invalid server fingerprint generated');
            }
      
    }
}
    /**
    * Add BitPay Payment Gateway to WooCommerce
    **/
    function wc_add_btcpay($methods)
    {
        $methods[] = 'WC_Gateway_BtcPay';

        return $methods;
    }

    add_filter('woocommerce_payment_gateways', 'wc_add_btcpay');

	if (!function_exists('btcpay_log'))  {
		function btcpay_log($message)
		{
			$logger = new WC_Logger();
			$logger->add('btcpay', $message);
		}
	}
    /**
     * Add Settings link to the plugin entry in the plugins menu
     **/
    add_filter('plugin_action_links', 'btcpay_plugin_action_links', 10, 2);

    function btcpay_plugin_action_links($links, $file)
    {
        static $this_plugin;

        if (false === isset($this_plugin) || true === empty($this_plugin)) {
            $this_plugin = plugin_basename(__FILE__);
        }

        if ($file == $this_plugin) {
            $log_file = 'btcpay-' . sanitize_file_name( wp_hash( 'btcpay' ) ) . '-log';
            $settings_link = '<a href="' . get_bloginfo('wpurl') . '/wp-admin/admin.php?page=wc-settings&tab=checkout&section=wc_gateway_btcpay">Settings</a>';
            $logs_link = '<a href="' . get_bloginfo('wpurl') . '/wp-admin/admin.php?page=wc-status&tab=logs&log_file=' . $log_file . '">Logs</a>';
            array_unshift($links, $settings_link, $logs_link);
        }

        return $links;
    }

    // TODO: Try to find a way to make it work within the WC_Gateway_BtcPay class
    add_action('wp_ajax_btcpay_pair_code', 'ajax_btcpay_pair_code');
    add_action('wp_ajax_btcpay_revoke_token', 'ajax_btcpay_revoke_token');
    add_action('wp_ajax_btcpay_create_invoice', 'ajax_btcpay_create_invoice');

    function ajax_btcpay_pair_code()
    {
        $nonce = $_POST['pairNonce'];
        if ( ! wp_verify_nonce( $nonce, 'btcpay-pair-nonce' ) ) {
            die ( 'Unauthorized!');
        }

        if ( current_user_can( 'manage_options' ) ) {

            if (true === isset($_POST['pairing_code']) && trim($_POST['pairing_code']) !== '') {
                // Validate the Pairing Code
                $pairing_code = trim($_POST['pairing_code']);
            } else {
                wp_send_json_error("Pairing Code is required");
                return;
            }

            if (!preg_match('/^[a-zA-Z0-9]{7}$/', $pairing_code)) {
                wp_send_json_error("Invalid Pairing Code");
                return;
            }

            $url = esc_url_raw($_POST['url']);

            if (!filter_var($url, FILTER_VALIDATE_URL) || (substr( $url, 0, 7 ) !== "http://" && substr( $url, 0, 8 ) !== "https://")) {
                wp_send_json_error("Invalid url");
                return;
            }

            // Generate Private Key
            $key = new \Bitpay\PrivateKey();

            if (true === empty($key)) {
                throw new \Exception('The BTCPay payment plugin was called to process a pairing code but could not instantiate a PrivateKey object. Cannot continue!');
            }

            $key->generate();

            // Generate Public Key
            $pub = new \Bitpay\PublicKey();

            if (true === empty($pub)) {
                throw new \Exception('The BTCPay payment plugin was called to process a pairing code but could not instantiate a PublicKey object. Cannot continue!');
            }

            $pub->setPrivateKey($key);
            $pub->generate();

            // Get SIN Format
            $sin = new \Bitpay\SinKey();

            if (true === empty($sin)) {
                throw new \Exception('The BTCPay payment plugin was called to process a pairing code but could not instantiate a SinKey object. Cannot continue!');
            }

            $sin->setPublicKey($pub);
            $sin->generate();

            // Create an API Client
            $client = new \Bitpay\Client\Client();

            if (true === empty($client)) {
                throw new \Exception('The BTCPay payment plugin was called to process a pairing code but could not instantiate a Client object. Cannot continue!');
            }
            $client->setUri($url);
            $curlAdapter = new \Bitpay\Client\Adapter\CurlAdapter();

            if (true === empty($curlAdapter)) {
                throw new \Exception('The BTCPay payment plugin was called to process a pairing code but could not instantiate a CurlAdapter object. Cannot continue!');
            }

            $client->setAdapter($curlAdapter);

            $client->setPrivateKey($key);
            $client->setPublicKey($pub);

            // Sanitize label
            $label = preg_replace('/[^a-zA-Z0-9 \-\_\.]/', '', get_bloginfo());
            $label = substr('WooCommerce - '.$label, 0, 59);

            try {
                $token = $client->createToken(
                    array(
                        'id'          => (string) $sin,
                        'pairingCode' => $pairing_code,
                        'label'       => $label,
                    )
                );
            } catch (\Exception $e) {
                wp_send_json_error($e->getMessage());
                return;
            }

            update_option('woocommerce_btcpay_key', btcpay_encrypt($key));
            update_option('woocommerce_btcpay_pub', btcpay_encrypt($pub));
            update_option('woocommerce_btcpay_sin', (string)$sin);
            update_option('woocommerce_btcpay_token', btcpay_encrypt($token));
            update_option('woocommerce_btcpay_label', $label);
            update_option('woocommerce_btcpay_url', $url);

            wp_send_json(array('sin' => (string) $sin, 'label' => $label));
        }
        exit;
    }

    function ajax_btcpay_revoke_token()
    {
        $nonce = $_POST['revokeNonce'];
        if ( ! wp_verify_nonce( $nonce, 'btcpay-revoke-nonce' ) ) {
            die ( 'Unauthorized!');
        }

        if ( current_user_can( 'manage_options' ) ) {
            update_option('woocommerce_btcpay_key', null);
            update_option('woocommerce_btcpay_pub', null);
            update_option('woocommerce_btcpay_sin', null);
            update_option('woocommerce_btcpay_token', null);
            update_option('woocommerce_btcpay_label', null);
            update_option('woocommerce_btcpay_network', 'testnet');

            wp_send_json(array('success'=>'Token Revoked!'));
        }
        exit;
    }

    function btcpay_encrypt($data)
    {
        if (false === isset($data) || true === empty($data)) {
            throw new \Exception('The BTCPay payment plugin was called to encrypt data but no data was passed!');
        }

        $openssl_ext = new \Bitpay\Crypto\OpenSSLExtension();
        $fingerprint = sha1(sha1(__DIR__));

        if (true === isset($fingerprint) &&
            true === isset($openssl_ext)  &&
            strlen($fingerprint) > 24)
        {
            $fingerprint = substr($fingerprint, 0, 24);

            if (false === isset($fingerprint) || true === empty($fingerprint)) {
                throw new \Exception('The BTCPay payment plugin was called to encrypt data but could not generate a fingerprint parameter!');
            }

            $encrypted = $openssl_ext->encrypt(base64_encode(serialize($data)), $fingerprint, '1234567890123456');

            if (true === empty($encrypted)) {
                throw new \Exception('The BTCPay payment plugin was called to serialize an encrypted object and failed!');
            }

            return $encrypted;
        } else {
            wp_die('Invalid server fingerprint generated');
        }
    }

    function btcpay_decrypt($encrypted)
    {
        if (false === isset($encrypted) || true === empty($encrypted)) {
            throw new \Exception('The BTCPay payment plugin was called to decrypt data but no data was passed!');
        }
        $openssl_ext = new \Bitpay\Crypto\OpenSSLExtension();
       
        $fingerprint = sha1(sha1(__DIR__));

        if (true === isset($fingerprint) &&
            true === isset($openssl_ext)  &&
            strlen($fingerprint) > 24)
        {
            $fingerprint = substr($fingerprint, 0, 24);

            if (false === isset($fingerprint) || true === empty($fingerprint)) {
                throw new \Exception('The BTCPay payment plugin was called to decrypt data but could not generate a fingerprint parameter!');
            }

            $decrypted = base64_decode($openssl_ext->decrypt($encrypted, $fingerprint, '1234567890123456'));

            // Strict base64 char check
            if (false === base64_decode($decrypted, true)) {
                $error_string .= '    [Warning] In btcpay_decrypt: data appears to have already been decrypted. Strict base64 check failed.';
            } else {
                $decrypted = base64_decode($decrypted);
            }

            if (true === empty($decrypted)) {
                throw new \Exception('The BTCPay payment plugin was called to unserialize a decrypted object and failed! The decrypt function was called with "' . $encrypted . '"');
            }

            return unserialize($decrypted);
        } else {
            wp_die('Invalid server fingerprint generated');
        }
    }

    function action_woocommerce_thankyou_btcpay($order_id)
    {
        $wc_order = wc_get_order($order_id);
        
        if($wc_order === false) {
            return;
        }
        $order_data     = $wc_order->get_data();
        $status         = $order_data['status'];
        
        $payment_status = file_get_contents(plugin_dir_path(__FILE__) . 'templates/paymentStatus.tpl');
        $payment_status = str_replace('{$statusTitle}', _x('Payment Status', 'woocommerce_btcpay'), $payment_status);
        switch ($status)
        {
            case 'on-hold':
                $status_desctiption = _x('Waiting for payment', 'woocommerce_btcpay');
                break;
            case 'processing':
                $status_desctiption = _x('Payment processing', 'woocommerce_btcpay');
                break;
            case 'completed':
                $status_desctiption = _x('Payment completed', 'woocommerce_btcpay');
                break;
            case 'failed':
                $status_desctiption = _x('Payment failed', 'woocommerce_btcpay');
                break;
            default:
                $status_desctiption = _x(ucfirst($status), 'woocommerce_btcpay');
                break;
        }
        echo str_replace('{$paymentStatus}', $status_desctiption, $payment_status);
    }
    add_action("woocommerce_thankyou_btcpay", 'action_woocommerce_thankyou_btcpay', 10, 1);
}

function woocommerce_btcpay_failed_requirements()
{
    global $wp_version;
    global $woocommerce;

    $errors = array();
    if (extension_loaded('openssl')  === false){
        $errors[] = 'The BTCPay payment plugin requires the OpenSSL extension for PHP in order to function. Please contact your web server administrator for assistance.';
    } 
    // PHP 5.4+ required
    if (true === version_compare(PHP_VERSION, '5.4.0', '<')) {
        $errors[] = 'Your PHP version is too old. The BTCPay payment plugin requires PHP 5.4 or higher to function. Please contact your web server administrator for assistance.';
    }

    // Wordpress 3.9+ required
    if (true === version_compare($wp_version, '3.9', '<')) {
        $errors[] = 'Your WordPress version is too old. The BTCPay payment plugin requires Wordpress 3.9 or higher to function. Please contact your web server administrator for assistance.';
    }

    // WooCommerce required
    if (true === empty($woocommerce)) {
        $errors[] = 'The WooCommerce plugin for WordPress needs to be installed and activated. Please contact your web server administrator for assistance.';
    }elseif (true === version_compare($woocommerce->version, '2.2', '<')) {
        $errors[] = 'Your WooCommerce version is too old. The BTCPay payment plugin requires WooCommerce 2.2 or higher to function. Your version is '.$woocommerce->version.'. Please contact your web server administrator for assistance.';
    }

    // GMP or BCMath required
    if (false === extension_loaded('gmp') && false === extension_loaded('bcmath')) {
        $errors[] = 'The BTCPay payment plugin requires the GMP or BC Math extension for PHP in order to function. Please contact your web server administrator for assistance.';
    }

    // Curl required
    if (false === extension_loaded('curl')) {
        $errors[] = 'The BTCPay payment plugin requires the Curl extension for PHP in order to function. Please contact your web server administrator for assistance.';
    }

    if (false === empty($errors)) {
        return implode("<br>\n", $errors);
    } else {
        return false;
    }

}

function extractCustomnetFromUrl($url)
{
    $component = parse_url($url);
    if(!$component){
        throw new \Exception('Url was invalid');
    }
    if(array_key_exists("port",$component) && isset($component["port"])){
        $port = $component["port"];
    }else  if($component["scheme"] === "http"){
        $port = 80;

    }else if($component["scheme"] === "https"){
        $port = 443; 
    }
    $host = $component["host"];
    return new \Bitpay\Network\Customnet($host, $port);
}

// Activating the plugin
function woocommerce_btcpay_activate()
{
    // Check for Requirements
    $failed = woocommerce_btcpay_failed_requirements();

    $plugins_url = admin_url('plugins.php');

    // Requirements met, activate the plugin
    if ($failed === false) {

        // Deactivate any older versions that might still be present
        $plugins = get_plugins();

        foreach ($plugins as $file => $plugin) {
            if ('Bitpay Woocommerce' === $plugin['Name'] && true === is_plugin_active($file)) {
                deactivate_plugins(plugin_basename(__FILE__));
                wp_die('BtcPay for WooCommerce requires that the old plugin, <b>Bitpay Woocommerce</b>, is deactivated and deleted.<br><a href="'.$plugins_url.'">Return to plugins screen</a>');
            }
			if ('BTCPay for WooCommerce' === $plugin['Name'] && true === is_plugin_active($file) && (0 > version_compare( $plugin['Version'], '3.0' ))) {
                deactivate_plugins(plugin_basename(__FILE__));
                wp_die('BtcPay for WooCommerce requires that the 2.x version of this plugin is deactivated. <br><a href="'.$plugins_url.'">Return to plugins screen</a>');
            }
            if ('BTCPay for WooCommerce' === $plugin['Name']
             && (0 > version_compare( $plugin['Version'], '3.0.1' ))) { 

               

                update_option('woocommerce_btcpay_key',  
                    get_option( 'woocommerce_btcpay_key', get_option('woocommerce_bitpay_key', null) ) );
                update_option('woocommerce_btcpay_pub', 
                get_option( 'woocommerce_btcpay_pub', get_option('woocommerce_bitpay_pub', null) ) );
                update_option('woocommerce_btcpay_sin', 
                get_option( 'woocommerce_btcpay_sin', get_option('woocommerce_bitpay_sin', null) ) );
                update_option('woocommerce_btcpay_token', 
                get_option( 'woocommerce_btcpay_token', get_option('woocommerce_bitpay_token', null) ) );
                update_option('woocommerce_btcpay_label',
                get_option( 'woocommerce_btcpay_label', get_option('woocommerce_bitpay_label', null) ) );
                update_option('woocommerce_btcpay_network', 
                get_option( 'woocommerce_btcpay_network', get_option('woocommerce_bitpay_network', null) ) );
                update_option('woocommerce_btcpay_settings', 
                get_option( 'woocommerce_btcpay_settings', get_option('woocommerce_bitpay_settings', null) ) );
                update_option('woocommerce_btcpay_url', 
                get_option( 'woocommerce_btcpay_url', get_option('woocommerce_bitpay_url', null) ) );
                update_option('woocommerce_btcpay_notification_url', 
                get_option( 'woocommerce_btcpay_notification_url', get_option('woocommerce_bitpay_notification_url', null) ) );
                update_option('woocommerce_btcpay_redirect_url', 
                get_option( 'woocommerce_btcpay_redirect_url', get_option('woocommerce_bitpay_redirect_url', null) ) );
                update_option('woocommerce_btcpay_transaction_speed', 
                get_option( 'woocommerce_btcpay_transaction_speed', get_option('woocommerce_bitpay_transaction_speed', null) ) );
                update_option('woocommerce_btcpay_order_states', 
                get_option( 'woocommerce_btcpay_order_states', get_option('woocommerce_bitpay_order_states', null) ) );

                set_transient( 'fx_admin_notice_show_migration_message', true, 5 );
            }
        }
        update_option('woocommerce_btcpay_version', constant("BTCPAY_VERSION"));

    } else {
        // Requirements not met, return an error message
        wp_die($failed . '<br><a href="'.$plugins_url.'">Return to plugins screen</a>');
    }
}

function fx_admin_notice_show_migration_message(){
           
    /* Check transient, if available display notice */
    if( get_transient( 'fx_admin_notice_show_migration_message' ) ){
        ?>
        <div class="notice notice-warning notice-alt is-dismissible">
            <p>The BTCPay Plugin for Woocoomerce has been updated from a 2.x version! 
            <strong>We have attempted to migrate your settings. Please double check them 
            <?php echo '<a href="' . get_bloginfo('wpurl') . '/wp-admin/admin.php?page=wc-settings&tab=checkout&section=wc_gateway_btcpay">here</a>'?>.
            If you don't see pairing data in your setting, make sure to pair your store again. </strong></p>
        </div>
        <?php
        /* Delete transient, only display this notice once. */
        delete_transient( 'fx_admin_notice_show_migration_message' );
    }
}
