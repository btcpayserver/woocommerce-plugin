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

    var isValidUrl = function(url){
      if(typeof url === "string" && (url.indexOf("http://") == 0 || url.indexOf("https://") == 0)){
        return true;
      }
      return false;
    }

    var formatUrl = function(url){
      if(typeof url === "string"){
        return url.replace(/^(.+?)\/*?$/, "$1");
      }
      return null;
    }
    

    var updatePairingLink = function (e) {
            var txtPairingUrl = $('.btcpay-url');
            var pairingLinkElement = $('.btcpay-pairing__link');
            // var requestpairingButton = $('.btcpay-pairing__request_pairing');
            
            var pairingLinkMessage = $(".btcpay-pairing__link_message")
            if(txtPairingUrl.length == 0 ){
              return;
            }

            var url = formatUrl(txtPairingUrl.val());
            if(isValidUrl(url))
            {
              url = url  + "/api-tokens";
              pairingLinkElement
                .attr('href', url)
                .html(url)
                .show();
              // requestpairingButton.show();
              pairingLinkMessage.hide();
            }
            else
            {
              // requestpairingButton.hide();
              pairingLinkElement.hide();
              pairingLinkMessage.show().text('Please enter BTCPay Url first');
            }
    };

     
    // var requestPairing = function(){
      
    //   var pairingLinkElement = $('.btcpay-pairing__link');
    //   if(pairingLinkElement.is(":hidden")){
    //     return;
    //   }
    //   var url = pairingLinkElement.attr("href");
    //   var btcpayWindow = window.open(url, "_blank");
    //   btcpayWindow.focus();

    //   $(btcpayWindow).on("message", function(e){
    //       if(url.indexOf(e.origin) > 0){
    //         try{
    //           var data = JSON.stringify(e.data);
    //           if(data && data.event == 'btcpay-pairing-sin' && data.pairingCode){
    //             if(pairingCode){
    //                   btcpayWindow.close();
    //                   $(".btcpay-pairing__code").val(data.pairingCode);
    //                   $(".btcpay-pairing__find").click();
    //             }
    //           }
    //         }catch{
              
    //         }
    //       }
    //   });
    // }

    // $('.btcpay-pairing__request_pairing').on('click', requestPairing);
   

    updatePairingLink();
    $('#btcpay_api_token_form').on('input', '.btcpay-url', updatePairingLink);

    /**
     * Try to pair with BtcPay using an entered pairing code
    */
    $('#btcpay_api_token_form').on('click', '.btcpay-pairing__find', function (e) {

      // Don't submit any forms or follow any links
      e.preventDefault();

      // Hide the pairing code form
      $('.btcpay-pairing').hide();
      $('.btcpay-pairing').after('<div class="btcpay-pairing__loading" style="width: 20em; text-align: center"><img src="'+ajax_loader_url+'"></div>');

      // Attempt the pair with BtcPay
      $.post(BtcPayAjax.ajaxurl, {
        'action':       'btcpay_pair_code',
        'pairing_code': $('.btcpay-pairing__code').val(),
        'url':      $('.btcpay-url').val(),
        'pairNonce':    BtcPayAjax.pairNonce
      })
      .done(function (data) {

        $('.btcpay-pairing__loading').remove();

        // Make sure the data is valid
        if (data && data.sin && data.label) {

          // Set the token values on the template
          $('.btcpay-token').removeClass('btcpay-token--livenet').removeClass('btcpay-token--testnet').addClass('btcpay-token--livenet');
          $('.btcpay-token__token-label').text(data.label);
          $('.btcpay-token__token-sin').text(data.sin);

          // Display the token and success notification
          $('.btcpay-token').hide().removeClass('btcpay-token--hidden').fadeIn(500);
          $('.btcpay-pairing__code').val('');
          $('#message').remove();
          $('h2.woo-nav-tab-wrapper').after('<div id="message" class="updated fade"><p><strong>You have been paired with your BtcPay store!</strong></p></div>');
        }
        // Pairing failed
        else if (data && data.success === false) {
          $('.btcpay-pairing').show();
          alert(data.data);
        }

      });
    });

    // Revoking Token
    $('#btcpay_api_token_form').on('click', '.btcpay-token__revoke', function (e) {

      // Don't submit any forms or follow any links
      e.preventDefault();

      if (confirm('Are you sure you want to revoke the token?')) {
        $.post(BtcPayAjax.ajaxurl, {
          'action': 'btcpay_revoke_token',
          'revokeNonce':    BtcPayAjax.revokeNonce
        })
        .always(function (data) {
          $('.btcpay-token').fadeOut(500, function () {
            $('.btcpay-pairing').removeClass('.btcpay-pairing--hidden').show();
            $('#message').remove();
            $('h2.woo-nav-tab-wrapper').after('<div id="message" class="updated fade"><p><strong>You have revoked your token!</strong></p></div>');
          });
        });
      }

    });

  });

}( jQuery ));
