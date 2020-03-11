<template>
    <div>
        <div class='content-header'>
            <div class="row">
                <div class="col-xs-12">
                    <h2>Upgrade</h2>
                </div>
            </div>
        </div>
        <section class="content">
			<div class="row">
                <div class="col-md-8 col-md-offset-2">
                    <div class="panel panel-default">
                        <div class="panel-heading">Choose your plan</div>

                        <div class="panel-body">
                            <ul class="list-group">
                                <li class="list-group-item clearfix" v-for="(plan, index) in plans">
                                    <div class="pull-left">
                                        <h4>{{ plan.name }}</h4>
                                        <h4>${{ plan.cost }} monthly</h4>
                                        <div v-if="plan.description != ''">
                                            <p>{{ plan.description }}</p>
                                        </div>
                                    </div>

                                    <button v-on:click="choosePlan(plan.braintree_plan)">Start Now</button>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <form>
            <div class="form-group">
                <label>Credit Card Number</label>
                <div id="creditCardNumber" class="form-control"></div>

                <label>Expire Date</label>
                <div id="expireDate" class="form-control"></div>

                <label>CVV</label>
                <div id="cvv" class="form-control"></div>
            </div>
        </form>
        <button v-on:click="payWithCreditCard()">Pay</button>

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
                    })
            },
            choosePlan: function (id) {
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
                                                'font-size': '14px',
                                                'font-family': 'Open Sans'
                                            }
                                        },
                                        fields: {
                                            number: {
                                                selector: '#creditCardNumber',
                                                placeholder: 'Enter Credit Card'
                                            },
                                            cvv: {
                                                selector: '#cvv',
                                                placeholder: 'Enter CVV'
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