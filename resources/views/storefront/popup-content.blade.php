<link href='https://fonts.googleapis.com/css?family=Pathway Gothic One' rel='stylesheet'>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<div id="offer-product-id" data-offer_product_id="{{ $offer_item->data['id'] }}"></div>
<div style="text-align: center">
    <button type="button" class="close" data-dismiss="modal">&times;</button>
    <div class= "ptitle">FLASH SALE: 60% OFF</div>
</div>
<div class="popup-description" style="margin-bottom: 20px">Hang on! we have this offer just for you </div>
<div class="flex popup-content">
    <div class="flex added">
        <div class="left-container "><img class="round-border" width="290" id="product-imag" class="img-fluid" alt="" /></div>
        <div class="right-container">
            <div class="name" id="product-name" style="color: #fff"></div>
            <ul class="info">
                <li class="product-price">
                    <span style="color: #fff" id="product-price"></span>
                </li>
                <!-- <li>Color</li>
                <li>Size</li> -->
            </ul>
            <button type="button" class="added-button">
            <i class="fa fa-check-circle" style="color:#2FCA5A"></i>
                <span>You just added</span>
            </button>
        </div>
    </div>
    <div class="flex offer">
        <div class="left-container "><img class="round-border" width="290" src="{{ $offer_item->image }}" class="img-fluid" alt="" /></div>
        <div class="right-container ">
            <div class="offer-time"> 
                <svg width="10" height="10" viewBox="0 0 13 13" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M3.37862 2.09042C3.13279 1.87838 2.81351 1.74951 2.46354 1.74951C1.68876 1.74951 1.06079 2.37777 1.06079 3.1524C1.06079 3.36245 1.10833 3.56121 1.19113 3.74009C1.79761 3.05233 2.54083 2.4877 3.37862 2.09042Z" fill="#E23535"/>
                <path d="M6.27142 14.4862C9.73478 14.4862 12.5426 11.6784 12.5426 8.21517C12.5426 5.1136 10.2905 2.53988 7.3324 2.03532V1.78029V1.52488V0.859945H7.87639C8.05622 0.859945 8.20217 0.667544 8.20217 0.429972C8.20217 0.192543 8.05622 0 7.87639 0H4.66616C4.4861 0 4.3401 0.192543 4.3401 0.429972C4.3401 0.667544 4.48605 0.859945 4.66616 0.859945H5.20987V1.52464V1.78005V2.03508C4.68173 2.12524 4.1766 2.28115 3.7024 2.49452C2.84469 2.88023 2.0897 3.45235 1.48887 4.16032C0.561023 5.25361 0 6.66832 0 8.21493C0.000284687 11.6784 2.80806 14.4862 6.27142 14.4862ZM2.57684 4.5502C2.92976 4.19444 3.33331 3.88925 3.77618 3.64656C4.51756 3.23993 5.36787 3.00777 6.27166 3.00777C9.1432 3.00777 11.479 5.34381 11.479 8.21517C11.479 11.0866 9.14315 13.4226 6.27166 13.4226C3.40025 13.4226 1.06425 11.0866 1.06425 8.21517C1.06402 6.78708 1.6425 5.49194 2.57684 4.5502Z" fill="#E23535"/>
                <path d="M3.1226 11.3633C3.32407 11.5647 3.54479 11.747 3.78156 11.907C3.89999 11.9868 4.02259 12.0615 4.14861 12.1298C4.77953 12.4726 5.50258 12.6674 6.271 12.6674C6.36708 12.6674 6.46241 12.6642 6.55687 12.658C7.0296 12.6283 7.48239 12.5246 7.90377 12.3583C8.07231 12.292 8.23591 12.2153 8.39363 12.1296C8.51993 12.0611 8.64225 11.9868 8.76068 11.9068C8.99754 11.7466 9.21817 11.5648 9.41964 11.363C10.2255 10.5572 10.7237 9.44426 10.7237 8.21455C10.7237 6.98499 10.2255 5.87168 9.41964 5.06592C9.21817 4.86436 8.99754 4.6823 8.76068 4.52221C8.64225 4.44222 8.51969 4.36782 8.39363 4.29926C8.23591 4.21352 8.07231 4.13736 7.90377 4.07065C7.48263 3.90458 7.0296 3.80067 6.55687 3.77083C6.46241 3.76466 6.36708 3.76172 6.271 3.76172C5.50235 3.76172 4.77953 3.95644 4.14861 4.29907C4.02231 4.36758 3.89999 4.44207 3.78156 4.52202C3.5446 4.68206 3.32383 4.86412 3.1226 5.06573C2.31675 5.87144 1.81836 6.98456 1.81836 8.21436C1.8186 9.44445 2.31699 10.5574 3.1226 11.3633ZM6.27124 4.67139V8.0074L2.91753 9.29632C2.32387 6.98371 3.94725 4.67139 6.27124 4.67139Z" fill="#E23535"/>
                </svg>        
                <span> Offer ends in: 
                    <span id="time">
                        <span id="sale-hours">00</span>:
                        <span id="sale-minutes">00</span>:
                        <span id="sale-seconds">00</span>
                    </span>
                </span>
            </div>
            <div class="name">{{ $offer_item->data["name"] }}</div>
            <ul class="info">
                <li class="price">
                    <s style="color: #6c757d; margin-left: 1rem; ">${{ $offer_item->data["price"] }}</s>
                    <span class="calculated_price">${{ $offer_item->data["calculated_price"] }}</span>
                </li>
                {{--
                <li class="color">Colors</li>
                <ul>
                    <li class="inline"><button type="button" class="color-picker popup-button"></button></li>
                    <li class="inline"><button type="button" class="color-picker popup-button"></button></li>
                </ul>
                --}}
            </ul>
            <div class = "progressBarBackground">
                <div class = "progressBar"></div>
            </div>
            <div class="sold-text">Hurry! We already sold <span style="color: #EB5757">25</span>!</div>
            <button type="button" id="ult-upsell-add-to-cart" class="add-button">Add to cart</button>
        </div>
    </div>
</div>
<div class="no">
    No, thanks
</div>

<style type="text/css">
.ult-upsell .popup-des {
  padding: 0.5rem 3rem 0;
}
.ult-upsell .popup-content {
  margin: auto 0;
}
.ult-upsell .popup-content .left-container {
  width: 40%;
  padding: 0.25rem;
}
.ult-upsell .popup-content .right-container {
  text-align: left;
  width: 60%;
  padding: 0.25rem;
}
.added{
    background-color: #A2A2A2;
    border-radius: 0.75rem;
}
.added-button{
    background-color: #fff;
    color: #000;
    font-weight: normal;
    border-radius: 2px;
    padding: 3px 15px;
    float: right;
    margin-right: 15px;
    margin-top: 1.5rem;
    font-size: 12px;
}
.progressBarBackground {
    margin: 5px 0px;
    height: 6px;
    background-color: #DDDBDB;
    border-radius: 5.5px;
    width: 80%
}
.progressBar {
    height: 6px;
    width: 25%;
    background-color: #EB5757;
    background-image: linear-gradient(225deg, #EB5757, #EC7575);
    border-radius: 5.5px;
}

.ult-upsell .popup-content .info {
  margin: 0;
}
.ult-upsell .popup-content .info li {
  display: inline;
  color: #fff;
  margin-right: 15px;
}
.ult-upsell .popup-content .name {
    color: #414141;
    font-weight: 550;
    font-family: Poppins, sans-serif;
    font-size: 15px;
    padding-right: 5px;
}
.ult-upsell .popup-content .price {
    color: #E23535;
    font-size: 12px;
    margin-left: -15px;
}
.ult-upsell .popup-content .color {
  padding-bottom: 0.25rem;
}
.ult-upsell .popup-content .add-to-cart {
  color: #fff;
  font-weight: bold;
  background-color: #28a745;
}
.ult-upsell .popup-content .add-to-cart:hover {
  color: #fff;
  background-color: #1e7e34;
  border-color: #1c7430;
}
.ult-upsell ul {
  list-style-type: none;
}
.ult-upsell .round-border {
  border-radius: 0.75rem !important;
}
.ult-upsell .color-picker {
  width: 20px;
  height: 20px;
  padding: 0 !important;
  margin-right: 0.5rem;
  border-radius: 50%;
}
.ult-upsell .flex {
  display: flex;
  flex-wrap: wrap;
}
.offer-time{
    font-size: 10px;
    color: #E23535;
}
.close{
    float: right
}
.sold-text{
    font-size: 10px
}
.ptitle{
    color: #F53F3F; 
    font-weight: 550;
    font-size: 24px;
    margin-left: 22px;
}
.add-button{
    margin-top:5px;
    float: right;
    padding: 3px 1.5rem;
    font-size: 1rem;
    color: #fff;
    background-color: #E44242;
    margin-right: 13px;
    border-radius: 2px;
    font-size: 12px;
}
.popup-description{
    text-align: center;
    color: #6A6A6A
}
.offer .right-container{
    padding-top: 0.5rem;
}
.calculated_price{
    font-style: normal;
    font-weight: 600;
    font-size: 14px;
    color: #EB5757;   
}
.no{
    margin-top: 30px;
    margin-left: 0.25rem
}
.offer{
    margin-top: 15px;
}
@media only screen and (max-width: 320px) {
    .name{
        font-size: 14px;
    }
    .calculated_price{
        font-size: 13px;
    }
    .price{
        font-size: 10px
    }
    .ptitle{
        font-size: 23px
    }
    .added-button{
        margin-top: 1.25px;
        font-size: 10px;
    }
    .add-button{
        font-size: 10px;
    }
}
@media only screen and (min-width: 992px) {
    .ult-upsell .popup-content .left-container {
        padding: 0.5rem;
    }
    .ult-upsell .popup-content .right-container {
        padding: 0.5rem;
    }
    .add-button{
        margin-top:0px
    }
    .added-button{
        margin-top: 2.25rem;
        margin-bottom: 0px;
    }
}
@media only screen and (min-width: 1600px) {
    .name{
        font-size: 18px;
    }
    .calculated_price{
    font-size: 16px;  
    }
    .sold-text{
        font-size: 12px;
    }
    .ult-upsell .popup-content .left-container {
        padding: 1.75rem;
    }
    .ult-upsell .popup-content .right-container {
        padding: 1.75rem;
    }
    .add-button{
        margin-top:8px
    }
    .added-button{
        margin-top: 2.5rem;
        margin-bottom: 0px;
    }
}
</style>

<script>
let name = $(".productView-title")[0].innerText
let link = $(".productView-img-container a")[0].href
let price = $(".price--withoutTax")[0].textContent
$("#product-name").text(name)
$("#product-price").text($(".price--withoutTax")[0].textContent)
$("#product-imag").attr("src", link)
// Set the date we're counting down to
var countDownDate = new Date("Apr 22, 2020 10:37:25").getTime();

// Update the count down every 1 second
var x = setInterval(function() {

  // Get today's date and time
  var now = new Date().getTime();
    
  // Find the distance between now and the count down date
  var distance = countDownDate - now;
    
  // Time calculations for days, hours, minutes and seconds
  var hours =Math.floor(distance / (1000 * 60 * 60 ))+ Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
  var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
  var seconds = Math.floor((distance % (1000 * 60)) / 1000);
    
  // Output the result in an element with id="demo"
    $("#sale-hours").text(hours)
    $("#sale-minutes").text(minutes)
    $("#sale-seconds").text(seconds)
  // If the count down is over, write some text 
  if (distance < 0) {
    clearInterval(x);
    $(".offer-time").style.display = "none";
  }
}, 1000);
$("#ult-upsell-add-to-cart").on("click", function() {
    $(this).attr('disabled', true);
    $(this).css('opacity', 0.65);
    var offer_product_id = $("#offer-product-id").data("offer_product_id");
    $('.ult-upsell-modal-body').prepend('<div style="text-align: center"><div class="lds-ripple"><div></div><div></div></div></div>')
    storeConversion(offer_id, "POPUP_ADD_TO_CART");
    addToCart(1, cart_id, offer_product_id);
})
$(".no").on("click", function() {
    addToCart($("input[name='qty[]']").val(), cart_id, product_id);

})
</script>
