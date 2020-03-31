<template>
    <div class="main-container choose-offer-type">
        <section class="content-header">
            <div class="row">
                <div class="col-md-12">
                    <h2>Create new offer</h2>
                </div>
            </div>
            <div class="col-md-12" style="font-size: 16px">
                <el-breadcrumb class="create-offer-step" separator-class="el-icon-arrow-right">
                    <el-breadcrumb-item><strong>Offer Type</strong></el-breadcrumb-item>
                    <el-breadcrumb-item>Location</el-breadcrumb-item>
                    <el-breadcrumb-item>Offer settings</el-breadcrumb-item>
                </el-breadcrumb>
            </div>
        </section>
        <section class="content">
			<div class="row div-content">
				<h2>Choose your objective</h2>
			</div>
			<div class="row">
				<!-- Basic upsell -->
				<div class="col-md-2"></div>
				<div class="col-md-4 col-sm-12">
					<offer-card :data="upSellBasic" :step="step" :offer="offer" @nextStep='next'></offer-card>
				</div>
				<!-- Basic Crosssell -->
				<div class="col-md-4 col-sm-12">
					<offer-card :data="crossSellBasic" :step="step" :offer="offer" @nextStep='next'></offer-card>
				</div>
			</div>
			<div class="row top-buffer ">
				<div class="col-md-2"></div>
				<!-- Upsell with boost -->
				<div class="col-md-4 col-sm-12">
					<offer-card :data="upSellBoost" :isUpSellBoost="isUpSellBoost" :isCrossSellBoost="isCrossSellBoost" @btnClicked="updateStatus"></offer-card>
				</div>
				<!-- Cross sell with boost -->
				<div class="col-md-4 col-sm-12 col-12">
					<offer-card :data="crossSellBoost" :isUpSellBoost="isUpSellBoost" :isCrossSellBoost="isCrossSellBoost" @btnClicked="updateStatus"></offer-card>
				</div>
			</div>
        </section>
    </div>
</template>

<script>
    import OfferCard from "./OfferCard.vue";

    export default {
		props: ["step", "offer"],
        data() {
                return {
                    isUpSellBoost: false,
                    isCrossSellBoost: false,
                    upSellBasic: {
                        image: "https://via.placeholder.com/300x190",
                        description: "Encouraging the purchase of anything in conjunction with the primary product",
                        id: "upsell",
                        btnValue: "Basic Upsell",
                        isBoost: false
                    },
                    crossSellBasic: {
                        image: "https://via.placeholder.com/300x190",
                        description: "Encouraging the purchase of anything in conjunction with the primary product",
                        id: "crosssell",
                        btnValue: "Basic Crossel",
                        isBoost: false
                    },
                    upSellBoost: {
                        image: "https://via.placeholder.com/300x190",
                        description: "Create urgencies with boosters",
                        id: "upsell",
                        isBoost: true
                    },
                    crossSellBoost: {
                        image: "https://via.placeholder.com/300x190",
                        description: "Create urgencies with boosters",
                        id: "crosssell",
                        isBoost: true
                    }
                };
            },
            methods: {
                updateStatus: function(isUpSellBoost, isCrossSellBoost) {
                    this.isUpSellBoost = isUpSellBoost;
                    this.isCrossSellBoost = isCrossSellBoost;
                },
				next(step, offer) {
					this.step = step;
                    this.offer = offer
					this.$emit("nextStep", this.step, this.offer);
				},
            },
            components: {
                OfferCard
            }
    };
</script>

<style lang="scss" scoped>
.choose-offer-type {
    .content {
        min-height: 800px;
    }

    .header {
        margin-top: 10px;
    }

    .title {
        width: 400px;
        display: inline-block !important;
        text-align: left;
        margin-top: 0px;
        margin: 0px;
        line-height: 40px;
        padding-left: 9px;
        font-size: 44px;
    }

    .el-input {
        line-height: 40px;
        width: 450px;
        margin: auto;
    }

    .el-input__inner {
        border: none;
        border-radius: 10px;
    }

    .breadcrumb {
        background-color: transparent;
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
        margin-bottom: 40px;
    }

    .top-buffer {
        margin-top: 150px;
    }

    .row-center {
        display: flex;
        justify-content: center;
        flex-flow: row wrap;
    }
}

</style>
