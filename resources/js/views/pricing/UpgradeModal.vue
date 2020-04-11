<template>
  <div class="modal" id="upgradeModal" role="dialog">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="header">
          <img :src="'/images/success.png'">
        </div>
        <div class="modal-body">
          <div class="title-modal">
            Let’s rocket your sale!
          </div>
          <div class="detail-modal">
            <p>
              Please enjoy the features of advanced plan. We are always working hard to give you the best experience. 
            </p>
            <p>
              You are always our # 1 priority
            </p>
          </div>
          <el-row>
            <el-col :span="4" :offset="12">
              <el-button size="medium" data-dismiss="modal" class="cancel"> Cancel </el-button>
            </el-col>
            <el-col :span="6">
              <el-button data-dismiss="modal" data-toggle="modal" data-target="#payModal" v-bind:style="{'background-color':'#47CA67', 'color': '#fff'}">
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
.title-modal{
  color: #2FCA5A;
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