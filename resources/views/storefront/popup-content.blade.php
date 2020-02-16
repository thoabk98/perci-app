<div id="offer-product-id" data-offer_product_id="{{ $offer_item->data['id'] }}"></div>
<div class="popup-title">
    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
    <h3>LIMITED TIME OFFER!</h3>
</div>
<div class="popup-des">Add these Items and Save</div>
<div class="flex popup-content">
    <div class="column left-container "><img class="round-border" width="290" src="{{ $offer_item->image }}" class="img-fluid" alt="" /></div>
    <div class="column right-container ">
        <h4>{{ $offer_item->data["name"] }}</h4>
        <ul class="info">
            <li class="name">Laptop - Classic Rose</li>
            <li class="price">
                <span style="color: #28a745;">${{ $offer_item->data["calculated_price"] }}</span>
                <s style="color: #6c757d; margin-left: 1rem; ">{{ $offer_item->data["calculated_price"] < $offer_item->data["price"] ?  "$" . $offer_item->data["price"] : "" }}</s>
            </li>
            {{--
            <li class="color">Colors</li>
            <ul>
                <li class="inline"><button type="button" class="color-picker popup-button"></button></li>
                <li class="inline"><button type="button" class="color-picker popup-button"></button></li>
            </ul>
            --}}
        </ul>
        <button type="button" id="ult-upsell-add-to-cart" class="add-to-cart popup-button round-border column">Add to cart</button>
    </div>
</div>

<script>
$("#ult-upsell-add-to-cart").on("click", function() {
    $(this).attr('disabled', true);
    $(this).css('opacity', 0.65);
    var offer_product_id = $("#offer-product-id").data("offer_product_id");
    $('.ult-upsell-modal-body').prepend('<div style="text-align: center"><div class="lds-ripple"><div></div><div></div></div></div>')
    storeConversion(offer_id, "popupAddToCart");
    addToCart(1, cart_id, offer_product_id);
})
</script>
