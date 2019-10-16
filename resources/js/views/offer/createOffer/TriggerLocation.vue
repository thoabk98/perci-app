<template>
    <div class="main-container choose-offer-location">
        <section class="content-header">
            <div class="row">
                <div class="col-md-12">
                    <h2>Create new offer</h2>
                </div>
            </div>
            <div class="col-md-12" style="font-size: 16px">
                <el-breadcrumb class="create-offer-step" separator-class="el-icon-arrow-right">
                    <el-breadcrumb-item>Offer Type</el-breadcrumb-item>
                    <el-breadcrumb-item><strong>Location</strong></el-breadcrumb-item>
                    <el-breadcrumb-item>Offer settings</el-breadcrumb-item>
                </el-breadcrumb>
            </div>
        </section>
        <!-- section content -->
        <section class="content">
            <!-- div containter -->
            <!-- div link -->
            <!-- /div link -->
            <!-- div content -->
            <div class="row div-content">
                <h2>Choose your trigger location</h2>
            </div>
            <!-- /div content -->
            <div class="row row-center">
                <div class="col-md-3 col-sm-12 col-custom">
                    <trigger-card :data="addToCart" @nextStep='next' :step="step"></trigger-card>
                </div>
                <div class="col-md-3 col-sm-12 col-custom">
                    <trigger-card :data="beforeCheckout" @nextStep='next' :step="step"></trigger-card>
                </div>
                <div class="col-md-3 col-sm-12 col-custom">
                    <trigger-card :data="afterCheckout" @nextStep='next' :step="step"></trigger-card>
                </div>
            </div>
            <!-- div container -->
        </section>
        <!-- /section content -->
    </div>
</template>

<script>
    import TriggerCard from "./TriggerCard.vue";

    export default {
        data() {
			return {
				addToCart: {
					image: "https://via.placeholder.com/300x190",
					btnType: "primary",
					description: "Offer will trigger when customer click on the add-to-cart button of the target product.",
					disable: false,
					id: "add to cart",
					btnValue: "Add-to-cart"
				},
				beforeCheckout: {
					image: "https://via.placeholder.com/300x190",
					btnType: "primary",
					description: "Offer will trigger when customer click on the add-to-cart button of the target product.",
					disable: false,
					id: "before checkout",
					btnValue: "Before Checkout"
				},
				afterCheckout: {
					image: "https://via.placeholder.com/300x190",
					btnType: "primary",
					description: "Beta version. Coming soon",
					disable: false,
					id: "after checkout",
					btnValue: "After Checkout"
				}
			};
		},
		components: {
			"trigger-card": TriggerCard
		},
		methods: {
			next(step) {
				this.step = step;
				this.$emit("nextStep", this.step);
			},
		},
		props: [
			'step'
		],
    };
</script>

<style lang="scss" scoped>
.choose-offer-location {
    .title {
        width: 800px;
        display: inline-block !important;
        text-align: left;
        margin-top: 0px;
        margin: 0px;
        line-height: 40px;
        padding-left: 9px;
        font-size: 44px;
    }

    .content {
        min-height: 800px;
    }

    .div-content {
        h2 {
            width: 1000px;
        }
    }

    .search-box {
        line-height: 40px;
        width: 450px;
        margin: auto;
    }

    .link {
        margin-left: auto;
        margin-top: 40px;
        margin-bottom: 40px;
        line-height: 30px;
    }

    .breadcrumb-link {
        font-size: 24px;
    }

    .div-content {
        width: 300px;
        margin: 0 auto;
    }

    .row-center {
        display: flex;
        justify-content: center;
        flex-flow: row wrap;
        margin-top: 40px;
    }

    .col-custom {
        margin-right: 30px;
    }
}
</style>

<style lang="scss" scoped>
    .choose-offer-location {
        .el-input__inner {
            border: none;
            border-radius: 10px !important;
        }
    }
</style>
