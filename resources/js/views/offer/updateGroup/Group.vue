<template>
  <div style="margin-top: 30px">
    <div class="row">
      <div class="col-md-7 col-lg-8" style="margin-top: 5px">
        <GroupOffers> </GroupOffers>
      </div>
      <div class="col-md-1 col-sm-0"><div class="vr">&nbsp;</div></div>
      <div class="col-md-4 col-lg-3" style="margin-top: 5px">
        <GroupInfo :groupInfo="groupInfo"> </GroupInfo>
      </div>
    </div>
  </div>
</template>

<script>
import GroupInfo from "./GroupInfo.vue";
import GroupOffers from "./GroupOffers";

export default {
  data() {
    return {};
  },
  components: {
    GroupInfo,
    GroupOffers
  },
  props: {
    groupInfo: {
      type: Object
    }
  }
};
</script>

<style>
.vr {
  width: 1px;
  height: 480px;
  background-color: gray;
  margin: 0 auto;
}
</style>
