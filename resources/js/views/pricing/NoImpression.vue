<template>
  <div class="modal fade" id="noImpression" role="dialog">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="header">
          <img :src="'/images/impression.png'">
        </div>
        <div class="modal-body">
          <div class="title-impression">
            You have 0 impression left!
          </div>
          <div class="detail-modal">
            <p>
              Unfortunately,  your store is out of impression for this month. Don’t worry! we still keep all your setting until next month for you.
            </p>
            <p>
              Or you can Upgrade your plan for a price of 15$ and continue generating more revenue. Can you imagine what we can achieve together with 2000+ impressions/ month?
            </p>
          </div>
          <el-row>
            <el-col :span="4" :offset="12">
              <el-button size="medium" data-dismiss="modal" class="cancel"> Cancel </el-button>
            </el-col>
            <el-col :span="6">
              <el-button data-dismiss="modal" v-bind:style="{'background-color':'#47CA67', 'color': '#fff'}">
                Upgrade Plan
                <i class="el-icon-arrow-right el-icon-right"></i>
              </el-button>
            </el-col>
          </el-row>
        </div>
      </div>
    </div>
  </div>
</template>

<style>
.title-impression{
  color: #E23535;
  font-family: 'Poppins', sans-serif;
  font-size: 24px;
  font-weight: normal;
  margin-bottom: 15px;

}
.header{
  text-align: center;
}
.cancel{
  border: none;
}
.detail-modal{
  color: #000000;
  font-family: 'Poppins', sans-serif;
  font-size: 16px;
  font-weight: normal;
  font-style: normal;
  line-height: 24px;
  margin-bottom: 40px;
}


</style>