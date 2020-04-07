<style>
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
        text-align: center;
        width: 100%;
        align-items: center;
        justify-content: center;
    }
    .planBox {
        position: relative;
        display: flex;
        justify-content: center;
        background-color: white;;
        border-radius: 15px;
        width: 70%;
        height: 520px;
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
    .svg-container{
        position: absolute;                  
        bottom: 350px;
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
        color: #000;
    }
    .pricePerMonthText {
        font-family: 'Poppins', sans-serif;
        font-size: 12px;
        color: #000;
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
    .quesText {
        font-family: 'Poppins', sans-serif;
        font-size: 18px;
        font-weight: 600;
        margin: 0px;
        color: #000;
    }
    .action-button{
        position: absolute;                  
        bottom: 20px;
        height: 33px;
        text-align: center;
        width: 132px;
        border-radius: 5px;
        border: none;
        font-family: 'Poppins', sans-serif;
        font-size: 12.5px;
        font-weight: 600;
        box-shadow: 0 1px 2px rgba(0,0,0,0.07), 
                    0 2px 4px rgba(0,0,0,0.07), 
                    0 4px 8px rgba(0,0,0,0.07), 
                    0 8px 16px rgba(0,0,0,0.07),
                    0 16px 32px rgba(0,0,0,0.07), 
                    0 32px 64px rgba(0,0,0,0.07);        
    }
    .startButton {
        color: white;
    }
    .contactButon{
        border: 1px solid;
        color: #000;
    }
    .paymentFormModal {
        display: none;
        position: fixed;
        z-index: 1;
        left: 0;
        top: 0;
        width: 100%;
        height: 100%;
        background-color: rgb(0,0,0);
        background-color: rgba(0,0,0,0.4);
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
    .el-icon-success{
        color: #2FCA5A;
    }

    @media only screen and (max-width: 600px) {
    .planBox{
        margin-left: auto;
        margin-right: auto;
        margin-top: 15px;
    }  
    }

    @media only screen and (min-width: 600px) {
    .planBox{
        width: 230px;
        max-width: 230px;
    }
    .plansContainer{
        display: inline-flex;
    }
    .modal-content{
        border-radius: 10px;
    }
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
            <div class="planBox" v-for="plan in plans" :key="plan.slug">
                <div class="planHeader" v-bind:style="{ 'background-color':  plan.color}">
                    <p class="planHeaderText" v-if="plan.slug == 'free'">Free Plan</p>
                    <p class="planHeaderText" v-else>Starter</p>
                </div>
                <div class="priceContainer">
                    <p>
                        <span class="priceCurrencyText">$</span>
                        <span class="priceValueText"> {{plan.cost}} </span>
                        <span class="pricePerMonthText"> / mon</span>
                    </p>
                </div>
                <div class="planDetailContainer">
                    <p class="impressionAText" v-bind:style="{ 'color': plan.color}"> {{ plan.impression }} impressions</p>
                    <p class="impressionBText">per month</p>
                    <div v-for="detail in plan.details" :key="detail">
                        <p class="detailText"> 
                            <i class="el-icon-success"></i>
                            {{ detail }}
                        </p>
                    </div>
                </div>
                <button class="action-button startButton" 
                        v-if="current_plan === ''"
                        v-bind:style="{ 'background-color': plan.color}" 
                        v-on:click="choosePlan(plan)">
                        Start now
                </button>
                <button class="action-button startButton"
                        v-else-if="current_plan === plan.slug"
                        v-bind:style="{ 'background-color': '#85929E'}" 
                        v-on:click="choosePlan(plan)"
                        v-bind:disabled="true"
                        >
                        Current Plan
                </button>
                <button class="action-button startButton" 
                        data-toggle="modal" data-target="#payModal"
                        v-bind:style="{ 'background-color': plan.color}" 
                        v-else-if="current_plan == 'free'">
                        Upgrade Now
                </button> 
                <button class="action-button" 
                        v-bind:style="{ 'color':'#85929E'}" 
                        v-on:click="choosePlan(plan)" v-else>
                        Down Grade
                </button>               
            </div>
            <div class="planBox">
                <div class="planHeader" v-bind:style="{ 'background-color': '#7D14CF'}">
                    <p class="planHeaderText">Custom</p>
                </div>
                <div class="svg-container">
                <svg width="92" height="92" viewBox="0 0 92 92" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <g clip-path="url(#clip0)">
                    <path d="M55.0667 26.0667C55.0667 22.716 52.3507 20 49 20C45.6493 20 42.9333 22.716 42.9333 26.0667C42.9333 29.4174 45.6493 32.1333 49 32.1333C52.3486 32.1291 55.0625 29.4153 55.0667 26.0667ZM44.6667 26.0667C44.6667 23.6736 46.6069 21.7333 49 21.7333C51.3931 21.7333 53.3333 23.6736 53.3333 26.0667C53.3333 28.4597 51.3931 30.4 49 30.4C46.6078 30.397 44.6696 28.4589 44.6667 26.0667Z" fill="#072856"/>
                    <path d="M72.3132 66.0201C71.948 64.4476 70.5473 63.3346 68.9333 63.3334H68.8233C68.4543 61.9098 67.2275 60.8738 65.7625 60.749C64.2974 60.6237 62.9124 61.4367 62.3077 62.7769L53.2508 56.6662L51.6 45.934V36.4667C51.6 36.1383 51.4146 35.8378 51.1205 35.691L37.2539 28.7577C37.1337 28.6976 37.0012 28.6667 36.8667 28.6667H23.8667C23.3881 28.6667 23 29.0547 23 29.5334V45.1334C23 45.612 23.3881 46 23.8667 46H28.2C28.3418 45.9971 28.4801 45.9585 28.6029 45.8875L29.7374 46.6534L29.1213 48.2949C29.0849 48.3927 29.0667 48.4959 29.0667 48.6V57.9408L23.0817 70.7677C22.9564 71.036 22.9771 71.3496 23.1363 71.5988C23.2954 71.8485 23.5709 72 23.8667 72H29.9333C30.2617 72 30.5622 71.8147 30.709 71.5206L36.7757 59.3872C36.8358 59.267 36.8667 59.1346 36.8667 59V53.7255L41.2 59.2971V71.1334C41.2 71.612 41.5881 72 42.0667 72H48.1333C48.6119 72 49 71.612 49 71.1334V59.6598L58.491 66.0633C56.9841 66.4729 55.9371 67.8389 55.9333 69.4V71.1334C55.9333 71.612 56.3214 72 56.8 72H74.1333C74.6119 72 75 71.612 75 71.1334V69.4C74.9987 67.786 73.8858 66.3853 72.3132 66.0201ZM52.3262 58.1334L60.5345 63.6723C60.0851 63.8814 59.6861 64.1844 59.3636 64.5606L49.837 58.1334H52.3262ZM31.4932 41.9786L29.0667 40.34V35.6H33.8828L31.4932 41.9786ZM29.0667 44.1097V42.4318L30.8652 43.6455L30.3667 44.9861L29.0667 44.1097ZM47.2667 70.2667H42.9333V59C42.9333 58.8071 42.869 58.62 42.7505 58.4681L36.6839 50.6681C36.4566 50.3761 36.0686 50.2606 35.7186 50.3807C35.3686 50.5009 35.1333 50.8297 35.1333 51.2V58.7956L29.3976 70.2667H25.2272L30.7183 58.4998C30.7721 58.3851 30.8 58.2599 30.8 58.1334V48.7579L35.9454 35.0385C36.0457 34.7723 36.0085 34.4735 35.8464 34.2395C35.6843 34.0059 35.4177 33.8663 35.1333 33.8667H28.2C27.7214 33.8667 27.3333 34.2547 27.3333 34.7334V44.2667H24.7333V30.4H36.6623L49.8667 37.0024V46C49.8667 46.044 49.8701 46.088 49.8772 46.1316L51.4561 56.4H48.7956L46.4 47.6174V39.9334C46.4004 39.5174 46.1055 39.1602 45.6971 39.0815C45.2887 39.0028 44.8821 39.2254 44.728 39.6117L41.2614 48.2784C41.1535 48.5497 41.1894 48.8573 41.357 49.0968L47.2667 57.5396V70.2667ZM44.7534 50.9237L43.0476 48.4866L44.6667 44.433V47.7334C44.6667 47.8104 44.6768 47.887 44.6971 47.9614L45.6755 51.5466L44.7534 50.9237ZM73.2667 70.2667H57.6667V69.4C57.6667 68.4428 58.4428 67.6667 59.4 67.6667C59.8786 67.6667 60.2667 67.2786 60.2667 66.8C60.2667 65.8428 61.0428 65.0667 62 65.0667H62.8667C63.3453 65.0667 63.7333 64.6786 63.7333 64.2C63.7333 63.2428 64.5094 62.4667 65.4667 62.4667C66.4239 62.4667 67.2 63.2428 67.2 64.2C67.2 64.6786 67.5881 65.0667 68.0667 65.0667H68.9333C69.8906 65.0667 70.6667 65.8428 70.6667 66.8C70.6667 67.2786 71.0547 67.6667 71.5333 67.6667C72.4906 67.6667 73.2667 68.4428 73.2667 69.4V70.2667Z" fill="#072856"/>
                    <path d="M62 66.8H63.7333V68.5333H62V66.8Z" fill="black"/>
                    <path d="M65.4667 65.9333H67.2V67.6667H65.4667V65.9333Z" fill="black"/>
                    </g>
                    <circle cx="46" cy="46" r="45" stroke="#2FCA5A" stroke-width="2"/>
                    <defs>
                    <clipPath id="clip0">
                    <rect x="23" y="20" width="52" height="52" fill="white"/>
                    </clipPath>
                    </defs>
                </svg>
                </div>
                <div class="planDetailContainer">
                    <p class="quesText">Don’t see <br>the number that fits your needs?</p>
                    <p class="impressionBText">Contact us and <br> we will customize a solution</p>
                </div>
                <button class="action-button contactButon" data-toggle="modal" data-target="#customModal">Contact Us</button>
            </div>
        </div>
        <CustomForm/>
        <Payment @update="update"/>
    </div>
</template>

<script>
    export default {
        components: {
            CustomForm: () => import("@/views/pricing/CustomForm"),
            Payment: () => import("@/views/pricing/Payment")
        },
        data() {
            return {
                plans: [
                    {
                        slug: 'free',
                        details: '',
                        colors: ''
                    },
                    {
                        slug: 'starter',
                        details:'',
                        colors: ''
                    }
                ],
                current_plan: ''
            }
        },
        methods: {
            getData() {

                for (let index = 0; index < this.plans.length; index++) {
                    switch(this.plans[index].slug) {
                        case 'free':
                            this.plans[index].details = ['Unlimited offers', 'Upsell & Cross-sell', 'Sales Booster add-ons', 'Key metrics reports', 'Smart Popup Control', 'Responsive optimized templates'];
                            this.plans[index].color = '#67C23A';
                            this.plans[index].cost = '0.00'
                            this.plans[index].impression = 500
                            break;
                        case 'starter':
                            this.plans[index].details = ['Unlimited offers', 'Upsell & Cross-sell', 'Sales Booster add-ons', 'Key metrics reports', 'Smart Popup Control', 'Responsive optimized templates'];
                            this.plans[index].color = '#0060E5';
                            this.plans[index].cost = '15.5'
                            this.plans[index].impression = 2000
                    }
                }
            },
            choosePlan: function (plan) {
                this.current_plan = plan.slug
            },
            update(value){
                this.current_plan = value
            }
        },
        watch:{
            current_plan: function(value){
                console.log(value)
                let x = document.getElementById("upgrade")
                x.style.backgroundColor = value == 'starter'? '#0060E5' : '#67C23A'
            }
        },
        mounted() {
            this.getData();
        }
    }
</script>
