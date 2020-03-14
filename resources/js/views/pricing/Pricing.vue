<style>
    .container {
        
    }
    .headerContainer {
        text-align: center;
        width: 100%;
        height: 100px;
    }
    .footerContainer {
        text-align: center;
        width: 100%;
        height: 80px;
    }
    .title {
        margin-top: 12px;
        font-family: 'Poppins', sans-serif;
        font-size: 24px;
        font-weight: 600;
    }
    .subtitle {
        padding: 15px;
        font-family: 'Poppins', sans-serif;
        font-size: 15px;
    }
    .plansContainer {
        display: inline-flex;
        text-align: center;
        width: 100%;
        align-items: center;
        justify-content: center;
        margin: 20px 0px;
    }
    .planBox {
        position: relative;
        display: flex;
        justify-content: center;
        background-color: white;;
        border-radius: 15px;
        width: 230px;
        min-width: 230px;
        height: 526px;
        margin: 11.5px;
        box-shadow:
            0 2.8px 2.2px rgba(0, 0, 0, 0.03),
            0 6.7px 5.3px rgba(0, 0, 0, 0.03),
            0 12.5px 10px rgba(0, 0, 0, 0.03),
            0 22.3px 17.9px rgba(0, 0, 0, 0.03),
            0 41.8px 33.4px rgba(0, 0, 0, 0.03),
            0 100px 80px rgba(0, 0, 0, 0.03);
    }
    .planHeader {
        width: 100%;
        height: 45px;
        line-height: 45px;
        border-radius: 15px 15px 0px 0px;
        text-align: center;
    }
    .planHeaderText {
        margin: 0px;
        font-family: 'Poppins', sans-serif;
        font-size: 14px;
        font-weight: 600;
        text-transform: uppercase;
        color: white;
    }
    .priceContainer {
        position: absolute;                  
        bottom: 330px;
        width: 100%;
        height: 100px;
        background-color: white;
        text-align: center;
    }
    .priceCurrencyText {
        font-family: 'Poppins', sans-serif;
        font-size: 19px;
    }
    .priceValueText {
        font-family: 'Poppins', sans-serif;
        font-size: 37px;
        font-weight: 600;
    }
    .pricePerMonthText {
        font-family: 'Poppins', sans-serif;
        font-size: 12px;
    }
    .planDetailContainer {
        padding: 0px 30px;
        position: absolute;                  
        bottom: 73px;
        width: 100%;
        height: 265px;
        background-color: white;
        text-align: left;
    }
    .impressionAText {
        font-family: 'Poppins', sans-serif;
        font-size: 18px;
        font-weight: 600;
        margin: 0px;
    }
    .impressionBText {
        font-family: 'Poppins', sans-serif;
        font-size: 18px;
        font-weight: 200;
        margin-bottom: 30px;
    }
    .detailText {
        font-family: 'Poppins', sans-serif;
        font-size: 12px;
        font-weight: 200;
    }
    .startButton {
        position: absolute;                  
        bottom: 20px;
        height: 33px;
        text-align: center;
        width: 132px;
        border-radius: 5px;
        border: none;
        color: white;
        font-family: 'Poppins', sans-serif;
        font-size: 12.5px;
        font-weight: 600;
    }
    .paymentFormModal {
        display: none;
        position: fixed;
        z-index: 1;
        left: 0;
        top: 0;
        width: 100%;
        height: 100%;
        background-color: rgb(0,0,0); /* Fallback color */
        background-color: rgba(0,0,0,0.4); /* Black w/ opacity */
    }
    .paymentFormContent {
        position: relative;
        background-color: #fefefe;
        margin: 15% auto;
        padding: 20px;
        border: 1px solid #888;
        width: 30%;
        -webkit-animation-name: animatetop;
        -webkit-animation-duration: 0.3s;
        animation-name: animatetop;
        animation-duration: 0.3s;
        box-shadow:
            0 2.8px 2.2px rgba(0, 0, 0, 0.08),
            0 6.7px 5.3px rgba(0, 0, 0, 0.08),
            0 12.5px 10px rgba(0, 0, 0, 0.08),
            0 22.3px 17.9px rgba(0, 0, 0, 0.08),
            0 41.8px 33.4px rgba(0, 0, 0, 0.08),
            0 100px 80px rgba(0, 0, 0, 0.08);
    }

    @-webkit-keyframes animatetop {
        from {top: -100px; opacity: 0} 
        to {top: 0; opacity: 1}
    }

    @keyframes animatetop {
        from {top: -100px; opacity: 0}
        to {top: 0; opacity: 1}
    }

    .formContainer {
        position: relative;
        display: flex;
        justify-content: center;
    }
    .formGroup {
        width: 100%;
        margin-top: 30px;
        margin-bottom: 93px;
    }
    .formLabel {
        font-family: 'Poppins', sans-serif;
        font-size: 12.5px;
        font-weight: 600;
    }
    .form-control {
        margin-top: 4px;
        margin-bottom: 20px;
    }
    .close {
        color: #aaa;
        float: right;
        font-size: 28px;
        font-weight: bold;
    }
    .close:hover, .close:focus {
        color: black;
        text-decoration: none;
        cursor: pointer;
    }
</style>

<template>
    <div class='container'>
        <div class='content-header'>
            <div class="row">
                <div class="col-xs-12">
                    <p class="title">Upgrade</p>
                </div>
            </div>
        </div>

        <div class="headerContainer">
            <p class="title">Try Peasi Ultimate Upsell for FREE</p>
            <p class="subtitle">Risk-free. No credit card required. Cancel anytime</p>
        </div>

        <div class="plansContainer">
            <div class="planBox" v-for="plan in plans" :key="plan.name">
                <div class="planHeader" v-bind:style="{ 'background-image': 'linear-gradient(225deg, ' + plan.colors[1] + ', ' + plan.colors[0] + ')'}">
                    <p class="planHeaderText">{{ plan.name }}</p>
                </div>
                <div class="priceContainer">
                    <p>
                        <span class="priceCurrencyText">$</span>
                        <span class="priceValueText">{{ plan.cost.toFixed(2) }}</span>
                        <span class="pricePerMonthText"> / mon</span>
                    </p>
                </div>
                <div class="planDetailContainer">
                    <p class="impressionAText" v-bind:style="{ 'color': plan.colors[1]}">{{ plan.impressions.toLocaleString() }} impressions</p>
                    <p class="impressionBText">per month</p>

                    <div v-for="detail in plan.details" :key="detail">
                        <p class="detailText">{{ detail }}</p>
                    </div>


                </div>
                <button class="startButton" v-bind:style="{ 'background-image': 'linear-gradient(225deg, ' + plan.colors[1] + ', ' + plan.colors[0] + ')'}" v-on:click="choosePlan(plan)">Start now</button>
            </div>
        </div>

        <div class="footerContainer">
            <p class="subtitle">30-Day Money Back Guarantee. 100% satisfied or your money back.</p>
        </div>

        <div id="paymentFormModalId" class="paymentFormModal">
            <div class="paymentFormContent">
                <span class="close">&times;</span>
                <div class="formContainer">
                    <form>
                        <div class="formGroup">
                            <label class="formLabel">Credit Card Number</label>
                            <div id="creditCardNumber" class="form-control"></div>

                            <label class="formLabel">Expiration Date</label>
                            <div id="expireDate" class="form-control"></div>

                            <label class="formLabel">CVV</label>
                            <div id="cvv" class="form-control"></div>
                        </div>
                    </form>
                    <br>
                    <button id="payButtonId" class="startButton" v-on:click="payWithCreditCard()">Pay</button>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    import braintree from 'braintree-web';
    
    export default {
        data() {
            return {
                plans: [{
                }],
                paymentFieldInstance: false,
                selectedPlanId: false,
                userBraintreeId: false,
            }
        },
        methods: {
            getData() {
                axios.get(route('api.pricing.getAllPlans', {}))
                    .then(res=>{
                        this.plans = res.data.data;
                        this.plans.sort((a, b) => (a.cost > b.cost) ? 1 : -1)

                        for (let index = 0; index < this.plans.length; index++) {
                            switch(this.plans[index].slug) {
                                case 'free':
                                    this.plans[index].details = ['Unlimited offers', 'Upsell & Cross-sell', 'Sales Booster add-ons', 'Key metrics reports', 'Smart Popup Control', 'Responsive optimized templates'];
                                    this.plans[index].colors = ['#11DE7B', '#7DDFC3'];
                                    break;
                                case 'starter':
                                    this.plans[index].details = ['Unlimited offers', 'Upsell & Cross-sell', 'Sales Booster add-ons', 'Key metrics reports', 'Smart Popup Control', 'Responsive optimized templates'];
                                    this.plans[index].colors = ['#00C5E0', '#00E0D3'];
                                    break;
                                case 'professional':
                                    this.plans[index].details = ['Unlimited offers', 'Upsell & Cross-sell', 'Pre & post-purchase', 'Detailed reports', '15+ stunning pre-design template'];
                                    this.plans[index].colors = ['#2F54D6', '#1C6FED'];
                                    break;
                                case 'advance':
                                    this.plans[index].details = ['Unlimited offers', 'Upsell & Cross-sell', 'Pre & post-purchase', 'Detailed reports', '15+ stunning pre-design template'];
                                    this.plans[index].colors = ['#7828E7', '#A539E9'];
                                    break;
                            }
                        }
                    })
            },
            choosePlan: function (plan) {

                let id = plan.braintree_plan;

                var payButton = document.getElementById("payButtonId");
                payButton.style.backgroundImage = "linear-gradient(225deg, " + plan.colors[1] + ", " + plan.colors[0] + ")";

                var modal = document.getElementById("paymentFormModalId");
                modal.style.display = "block";

                var span = document.getElementsByClassName("close")[0];
                span.onclick = function() {
                    modal.style.display = "none";
                }

                window.onclick = function(event) {
                    if (event.target == modal) {
                        modal.style.display = "none";
                    }
                }



                this.selectedPlanId = id;
                axios.get(route('api.pricing.getUserBraintreeId', {}))
                    .then(res=>{
                        this.userBraintreeId = res.data.data;
                        axios.get(route('api.pricing.getClientToken', {}))
                            .then(res=>{
                                let clientToken = res.data;

                                braintree.client.create({
                                    authorization: clientToken,
                                })
                                .then(clientInstance => {
                                    let options = {
                                        client: clientInstance,
                                        styles: {
                                            input: {
                                                'font-family': 'Poppins, sans-serif',
                                                'font-size': '12.5px',
                                            }
                                        },
                                        fields: {
                                            number: {
                                                selector: '#creditCardNumber',
                                                placeholder: '4111 1111 1111 1111'
                                            },
                                            cvv: {
                                                selector: '#cvv',
                                                placeholder: '000'
                                            },
                                            expirationDate: {
                                                selector: '#expireDate',
                                                placeholder: '00 / 0000'
                                            }
                                        }
                                    }
                                    return braintree.hostedFields.create(options)
                                })
                                .then(paymentFieldInstance => {
                                    this.paymentFieldInstance = paymentFieldInstance;
                                })
                                .catch(err => {
                                });
                            })
                    })
            },
            payWithCreditCard() {
                if (this.userBraintreeId && this.paymentFieldInstance && this.selectedPlanId) {
                    this.paymentFieldInstance.tokenize().then(payload => {
                        let nonce = payload.nonce;
                        axios.get(route('api.pricing.createPaymentMethod', {customerId: this.userBraintreeId, nonce: nonce}))
                            .then(res=>{
                                let token = res.data.data.paymentMethod.token;
                                axios.get(route('api.pricing.subscribeToPlan', {token: token, planId: this.selectedPlanId}))
                                    .then(res=>{
                                        console.log(res);
                                    })
                            })
                    })
                    .catch(err => {
                        console.error(err);
                        
                    })
                }
            }
        },
        mounted() {
            this.getData();
        }
    }
</script>