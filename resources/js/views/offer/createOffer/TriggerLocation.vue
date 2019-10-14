<template>
  <div>
    <section class="content-header">
      <div class="row">
        <!-- div title -->
        <div class="col col-lg-6">
          <h1 class="title">Create new Offer</h1>
        </div>
        <!-- /div title -->
        <!-- div search-box -->
        <div class="col col-lg-6">
          <el-input
            placeholder="Search Offer, Group ..."
            prefix-icon="el-icon-search"
            suffix-icon="el-icon-close"
            v-model="input2"
            class="search-box"
          ></el-input>
        </div>
        <!-- /div search-box -->
      </div>
    </section>
    <!-- section content -->
    <section class="content">
      <!-- div containter -->
      <div class="container">
        <!-- div link -->
        <div class="row link">
          <el-breadcrumb separator-class="el-icon-arrow-right" class="breadcrumb-link">
            <el-breadcrumb-item>Create new offer</el-breadcrumb-item>
            <el-breadcrumb-item style="font-weight: bold">Location</el-breadcrumb-item>
            <el-breadcrumb-item>Offer Settings</el-breadcrumb-item>
          </el-breadcrumb>
        </div>
        <!-- /div link -->
        <!-- div content -->
        <div class="row div-content">
          <h2>Choose your trigger location</h2>
        </div>
        <!-- /div content -->
        <div class="row row-center">
          <div class="col-md-3 col-sm-12 col-custom">
            <trigger-card :data="addToCart"></trigger-card>
          </div>
          <div class="col-md-3 col-sm-12 col-custom">
            <trigger-card :data="beforeCheckout"></trigger-card>
          </div>
          <div class="col-md-3 col-sm-12 col-custom">
            <trigger-card :data="afterCheckout"></trigger-card>
          </div>
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
        description:
          "Offer will trigger when customer click on the add-to-cart button of the target product.",
        disable: false,
        id: "add to cart",
        btnValue: "Add-to-cart"
      },
      beforeCheckout: {
        image: "https://via.placeholder.com/300x190",
        btnType: "primary",
        description:
          "Offer will trigger when customer click on the add-to-cart button of the target product.",
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
  }
};
</script>

<style scoped>
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

.div-content h2 {
    width: 1000px;
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
</style>

<style>
.el-input__inner {
  border: none;
  border-radius: 10px !important;
}
</style>