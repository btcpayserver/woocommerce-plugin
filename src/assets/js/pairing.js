/**
 * @license Copyright 2011-2014 BitPay Inc., MIT License
 * see https://github.com/bitpay/woocommerce-bitpay/blob/master/LICENSE
 */

'use strict';

(function ( $ ) {

  $(function () {

    /**
     * Update the API Token helper link on Network selection
    */

    var updatePairingLink = function (e) {
            var url = $('.bitpay-url').val().replace(/^(.+?)\/*?$/, "$1");
            if(url.indexOf("http://") == 0 || url.indexOf("https://") == 0)
            {
              url = url  + "/api-tokens";
              $('.bitpay-pairing__link').attr('href', url).html(url);
            }
            else
            {
              $('.bitpay-pairing__link').attr('href', '').html('');
            }
    };

    updatePairingLink();
    $('#bitpay_api_token_form').on('change', '.bitpay-url', updatePairingLink);

    /**
     * Try to pair with BitPay using an entered pairing code
    */
    $('#bitpay_api_token_form').on('click', '.bitpay-pairing__find', function (e) {

      // Don't submit any forms or follow any links
      e.preventDefault();

      // Hide the pairing code form
      $('.bitpay-pairing').hide();
      $('.bitpay-pairing').after('<div class="bitpay-pairing__loading" style="width: 20em; text-align: center"><img src="'+ajax_loader_url+'"></div>');

      // Attempt the pair with BitPay
      $.post(BitpayAjax.ajaxurl, {
        'action':       'bitpay_pair_code',
        'pairing_code': $('.bitpay-pairing__code').val(),
        'url':      $('.bitpay-url').val(),
        'pairNonce':    BitpayAjax.pairNonce
      })
      .done(function (data) {

        $('.bitpay-pairing__loading').remove();

        // Make sure the data is valid
        if (data && data.sin && data.label) {

          // Set the token values on the template
          $('.bitpay-token').removeClass('bitpay-token--livenet').removeClass('bitpay-token--testnet').addClass('bitpay-token--livenet');
          $('.bitpay-token__token-label').text(data.label);
          $('.bitpay-token__token-sin').text(data.sin);

          // Display the token and success notification
          $('.bitpay-token').hide().removeClass('bitpay-token--hidden').fadeIn(500);
          $('.bitpay-pairing__code').val('');
          $('#message').remove();
          $('h2.woo-nav-tab-wrapper').after('<div id="message" class="updated fade"><p><strong>You have been paired with your BitPay account!</strong></p></div>');
        }
        // Pairing failed
        else if (data && data.success === false) {
          $('.bitpay-pairing').show();
          alert(data.data);
        }

      });
    });

    // Revoking Token
    $('#bitpay_api_token_form').on('click', '.bitpay-token__revoke', function (e) {

      // Don't submit any forms or follow any links
      e.preventDefault();

      if (confirm('Are you sure you want to revoke the token?')) {
        $.post(BitpayAjax.ajaxurl, {
          'action': 'bitpay_revoke_token',
          'revokeNonce':    BitpayAjax.revokeNonce
        })
        .always(function (data) {
          $('.bitpay-token').fadeOut(500, function () {
            $('.bitpay-pairing').removeClass('.bitpay-pairing--hidden').show();
            $('#message').remove();
            $('h2.woo-nav-tab-wrapper').after('<div id="message" class="updated fade"><p><strong>You have revoked your token!</strong></p></div>');
          });
        });
      }

    });

  });

}( jQuery ));
