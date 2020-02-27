<link href='https://fonts.googleapis.com/css?family=Pathway Gothic One' rel='stylesheet'>
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
        <div class = "progressBarBackground">
            <div class = "progressBar"></div>
        </div>
        <div class = "countdownContainer">
            <div class = "countdownTextBox">
                <p id = "day1" class = "countdownText">0</p>
            </div>
            <div class = "countdownTextBox">
                <p id = "day2" class = "countdownText">0</p>
            </div>
            <p class = "countdownColon">:</p>
            <div class = "countdownTextBox">
                <p id = "hour1" class = "countdownText">0</p>
            </div>
            <div class = "countdownTextBox">
                <p id = "hour2" class = "countdownText">0</p>
            </div>
            <p class = "countdownColon">:</p>
            <div class = "countdownTextBox">
                <p id = "minute1" class = "countdownText">0</p>
            </div>
            <div class = "countdownTextBox">
                <p id = "minute2" class = "countdownText">0</p>
            </div>
            <p class = "countdownColon">:</p>
            <div class = "countdownTextBox">
                <p id = "second1" class = "countdownText">0</p>
            </div>
            <div class = "countdownTextBox">
                <p id = "second2" class = "countdownText">0</p>
            </div>
        </div>
    </div>
</div>

<style type="text/css">
.progressBarBackground {
    margin: 16px 0px;
    height: 11px;
    width: 291px;
    background-color: #DDDBDB;
    border-radius: 5.5px;
}
.progressBar {
    height: 11px;
    width: 25%;
    background-color: #EB5757;
    background-image: linear-gradient(225deg, #EB5757, #EC7575);
    border-radius: 5.5px;
}

.countdownContainer {
    margin: 16px 0px;
    width: 291px;
    height: 55px;
    display: inline-flex;
}
.countdownTextBox {
    height: 55px;
    width: 30px;
    line-height: 55px;
    text-align: center;
    color: white;
    background-color: #072856;
    border-radius: 4.25px;
    margin: 0px 1px;
}
.countdownText {
    margin: 0px;
    font-family: 'Pathway Gothic One';
    font-size: 44px;
}
.countdownColon {
    margin: 0px 3px;
    height: 100%;
    font-family: 'Pathway Gothic One';
    font-size: 44px;
}
</style>

<script>
var countdownSecond = 0
var countdown = setInterval(runCountdown, 1000)

window.onload = function initCountdown() { 
    countdownSecond = Math.floor(Math.random() * 0) + 60;
    runCountdown();
}

function runCountdown() {
    countdownSecond -= 1;
    second = countdownSecond;
    var minute = Math.floor(second / 60);
    var hour = Math.floor(minute / 60);
    second %= 60;
    minute %= 60;
    hour %= 24;

    second = (second < 10) ? "0" + second : second.toString();
    minute = (minute < 10) ? "0" + minute : minute.toString();
    hour = (hour < 10) ? "0" + hour : hour.toString();

    document.getElementById('second1').innerHTML = second.charAt(0);
    document.getElementById('second2').innerHTML = second.charAt(1);
    document.getElementById('minute1').innerHTML = minute.charAt(0);
    document.getElementById('minute2').innerHTML = minute.charAt(1);
    document.getElementById('hour1').innerHTML = hour.charAt(0);
    document.getElementById('hour2').innerHTML = hour.charAt(1);

    if (countdownSecond == 0) {
        clearInterval(countdown);
    }
}

$("#ult-upsell-add-to-cart").on("click", function() {
    $(this).attr('disabled', true);
    $(this).css('opacity', 0.65);
    var offer_product_id = $("#offer-product-id").data("offer_product_id");
    $('.ult-upsell-modal-body').prepend('<div style="text-align: center"><div class="lds-ripple"><div></div><div></div></div></div>')
    storeConversion(offer_id, "POPUP_ADD_TO_CART");
    addToCart(1, cart_id, offer_product_id);
})
</script>
