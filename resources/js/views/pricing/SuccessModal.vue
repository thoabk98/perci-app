<template>
  <div class="modal" id="successModal" role="dialog">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="header">
          <img :src="'/images/upgrade.png'">
        </div>
        <div class="modal-body">
          <div class="title-modal">
            Your store is now on set!
          </div>
          <div class="detail-modal">
            <p>
              Thank you for trusting on our application. We hope that with this upgrade, we can bring to you even more incredible value.
            </p>
            <p>
              You can join our community to hear the latest update from us. Here is the link: <a>fb.com/peasicomm</a>
            </p>
          </div>
          <el-row>
            <el-col :span="4" :offset="12">
              <el-button size="medium" data-dismiss="modal" class="cancel"> Cancel </el-button>
            </el-col>
            <el-col :span="6">
              <el-button data-dismiss="modal" v-bind:style="{'background-color':'#47CA67', 'color': '#fff'}">
                Leave us a review
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