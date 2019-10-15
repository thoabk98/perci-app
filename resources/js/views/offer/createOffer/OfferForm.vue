<template>
  <div>
    <section class="content-header">
      <div class="row">
        <div class="col col-lg-6">
          <h1 class="title">Create new Offer</h1>
        </div>
        <div class="col col-lg-6">
          <el-input
            placeholder="Search Offer, Group ..."
            prefix-icon="el-icon-search"
            suffix-icon="el-icon-close"
            v-model="input2"
          ></el-input>
        </div>
      </div>
    </section>
    <section class="content">
      <div class="container">
        <div class="row link">
          <el-breadcrumb separator-class="el-icon-arrow-right" class="breadcrumb-link">
            <el-breadcrumb-item style="font-weight: bold">Create new offer</el-breadcrumb-item>
            <el-breadcrumb-item>Location</el-breadcrumb-item>
            <el-breadcrumb-item>Offer Settings</el-breadcrumb-item>
          </el-breadcrumb>
        </div>
        <div class="row div-content">
          <h2>Choose your objective</h2>
        </div>
        <div class="row row-center">
          <!-- Basic upsell -->
          <div class="col-md-4 col-sm-12">
            <offer-card :data="upSellBasic"></offer-card>
          </div>
          <!-- Basic Crosssell -->
          <div class="col-md-4 col-sm-12">
            <offer-card :data="upSellBasic"></offer-card>
          </div>
        </div>
        <div class="row row-center top-buffer ">
          <!-- Upsell with boost -->
          <div class="col-md-4 col-sm-12">
            <offer-card
              :data="upSellBoost"
              :isUpSellBoost="isUpSellBoost"
              :isCrossSellBoost="isCrossSellBoost"
              @btnClicked="updateStatus"
            ></offer-card>
          </div>
          <!-- Cross sell with boost -->
          <div class="col-md-4 col-sm-12 col-12">
            <offer-card
              :data="crossSellBoost"
              :isUpSellBoost="isUpSellBoost"
              :isCrossSellBoost="isCrossSellBoost"
              @btnClicked="updateStatus"
            ></offer-card>
          </div>
        </div>
      </div>
    </section>
  </div>
</template>

<script>
import OfferCard from "./OfferCard.vue";

export default {
  data() {
    return {
      isUpSellBoost: false,
      isCrossSellBoost: false,
      upSellBasic: {
        image: "https://via.placeholder.com/300x190",
        description:
          "Encouraging the purchase of anything in conjunction with the primary product",
        id: "upsell",
        btnValue: "Basic Upsell",
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
  props: {},
  methods: {
    updateStatus: function(isUpSellBoost, isCrossSellBoost) {
      this.isUpSellBoost = isUpSellBoost;
      this.isCrossSellBoost = isCrossSellBoost;
    }
  },
  components: {
    "offer-card": OfferCard
  }
};
</script>

<style>
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
</style>
