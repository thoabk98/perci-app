<!-- Modal -->

<link rel="stylesheet" href="https://peasisoft.com/storefront/css/theme1.css" type="text/css" media="all" />
<link rel="stylesheet" href="https://peasisoft.com/storefront/css/loader.css" type="text/css" media="all" />

<div id="get-store-hash" data-store_hash="{{ $store_hash }}"></div>
<div id="ult-upsell-popup-modal" class="ult-upsell modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="popup-modal-content">
            <div class="popup-modal-body ult-upsell-modal-body">
                {{-- Insert modal content here --}}
                <div style="text-align: center">
                    <div class="lds-ripple"><div></div><div></div></div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
var product_id = $("input[name='product_id']").val()
var store_hash = $("#get-store-hash").data("store_hash");
var offer_id = null;
var cart_id = '';
var hasOffer = false;

$(function() {
    var ip_data = '';
    var apiUri = "{{ config('app.url') }}"
    $.get('https://www.cloudflare.com/cdn-cgi/trace', function(data) {
        ip_data = data.match(/ip=(.*)\nts/)[1]
    })

    var data = {
        id: product_id,
        store_hash: store_hash,
        customer_ip: ip_data
    };

    $.ajax({
        url: apiUri + "/api/popup-content",
        headers: { "Access-Control-Allow-Headers": "*" },
        type: "GET",
        crossDomain: true,
        data: data,
        dataType: "json",
        success: function (res) {
            $('.ult-upsell-modal-body').html(res.responseText);
            if (res.responseText) {
                hasOffer = true;
            }
            console.log("Load offer popup completed");
            offer_id = res.offer_id
        },
        error: function (res) {
            $('.ult-upsell-modal-body').html(res.responseText);
            console.log("Error occured");
        },
    });

    $.get('/api/storefront/cart', function(data) {
        cart_id = data[0]['id'];
    })
});

$("#form-action-addToCart").on('click', function(e) {
    if (hasOffer) {
        e.preventDefault();
        $('#ult-upsell-popup-modal').modal('show');
        storeConversion(offer_id, "OPEN_OFFER_POPUP");
    }
});

function storeConversion(offer_id, type) {
      const data = {
        offer_id: offer_id,
        type: type
      }

      $.ajax({
          url: apiUri + "/conversion",
          headers: { "Access-Control-Allow-Headers": "*" },
          type: "POST",
          crossDomain: true,
          data: data,
          dataType: "json",
          success: function(res) {
              console.log(res);
          },
          error: function (res) {
              console.log(res);
          }
      });
}

function addToCart(quantity, cartId, productId, variantId = 0) {
    var data = JSON.stringify({
        "lineItems": [
            {
            "quantity": quantity,
            "productId": productId,
            "variantId": variantId
            }
        ],
    });

    var xhr = new XMLHttpRequest();
    xhr.withCredentials = true;

    xhr.addEventListener("readystatechange", function () {
        if (this.readyState === this.DONE) {
            console.log(this.responseText);
        }
    });

    xhr.open("POST", location.origin + "/api/storefront/carts/" + cartId + "/items?include=lineItems.digitalItems.options%2ClineItems.physicalItems.options");
    xhr.setRequestHeader("content-type", "application/json");

    xhr.send(data);
    xhr.onload= function() {
        console.log("Done add to cart");
        window.location.href = location.origin + "/cart.php";
    }
}
</script>

