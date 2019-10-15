<template>
  <div class="card card-left">
    <img :src="data.image" class="card-img-top" :alt="data.id" />
    <div v-if="!data.isBoost" class="card-body">
      <el-button
        :id="data.id"
        type="primary"
        icon="el-icon-files"
        class="card-btn"
        v-on:click="boostBtnClicked()"
      >{{data.btnValue}}</el-button>
    </div>
    <div v-if="data.isBoost && data.id === 'upsell'" class="card-body">
      <el-button
        v-if="isUpSellBoost"
        :id="data.id"
        type="success"
        icon="el-icon-files"
        class="card-btn"
        v-on:click="boostBtnClicked()"
      >Upsell with boost</el-button>
      <el-button
        v-if="!isUpSellBoost"
        :id="data.id"
        type="primary"
        icon="el-icon-files"
        class="card-btn"
        v-on:click="boostBtnClicked()"
      >Upsell with boost</el-button>
    </div>
    <div v-if="data.isBoost && data.id === 'crosssell'" class="card-body">
      <el-button
        v-if="isCrossSellBoost"
        :id="data.id"
        type="success"
        icon="el-icon-files"
        class="card-btn"
        v-on:click="boostBtnClicked()"
      >Upsell with boost</el-button>
      <el-button
        v-if="!isCrossSellBoost"
        :id="data.id"
        type="primary"
        icon="el-icon-files"
        class="card-btn"
        v-on:click="boostBtnClicked()"
      >Upsell with boost</el-button>
    </div>
    <div v-if="isUpSellBoost && data.id === 'upsell' && data.isBoost" class="card-footer">
      <div class="row">
        <div class="col-sm-6">
          <a href="#">Create new</a>
          <span class="separator">|</span>
        </div>
        <div class="col-sm-6">
          <a href="#">Choose from</a>
        </div>
      </div>
    </div>
    <div
      v-else-if="isCrossSellBoost && data.id === 'crosssell' && data.isBoost"
      class="card-footer"
    >
      <div class="row">
        <div class="col-sm-6">
          <a href="#">Create new</a>
          <span class="separator">|</span>
        </div>
        <div class="col-sm-6">
          <a href="#">Choose from</a>
        </div>
      </div>
    </div>
    <div v-else class="card-footer">
      <p class="card-text">{{data.description}}</p>
    </div>
  </div>
</template>

<script>
export default {
  props: ["data", "isUpSellBoost", "isCrossSellBoost"],
  data() {
    return {};
  },

  methods: {
    boostBtnClicked: function() {
      if (this.data.id === "upsell") {
        this.isUpSellBoost = !this.isUpSellBoost;
        this.isCrossSellBoost = false;
        this.$emit("btnClicked", this.isUpSellBoost, this.isCrossSellBoost);
      } else if (this.data.id === "crosssell") {
        this.isUpSellBoost = false;
        this.isCrossSellBoost = !this.isCrossSellBoost;
        this.$emit("btnClicked", this.isUpSellBoost, this.isCrossSellBoost);
      }
    }
  }
};
</script>

<style scoped>
.card {
  width: 282px;
  height: 135.82px;
  text-align: center;
  margin: 0 auto;
}

.card-img-top {
  width: 282px;
  height: 135.82px;
  border-radius: 20px;
  margin-bottom: 8px;
  box-shadow: 3px 3px 1px #ccc;
}

.div.card p {
  font-style: normal;
  font-weight: 300;
  font-size: 11px;
  display: flex;
  align-items: center;
  text-align: center;
}

.card-btn {
  min-width: 282px;
  border-radius: 8px;
}

.separator {
  float: right;
  margin-right: -15px;
}
</style>

