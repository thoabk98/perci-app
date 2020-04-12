<template>
  <div class="modal" id="downgrade" role="dialog">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="header">
          <img :src="'/images/downgrade.png'">
        </div>
        <div class="modal-body">
          <div class="title-dg">
            We had a great time together
          </div>
          <div class="detail-dg">
            <p>
              Looks like we have supported you achieving some goals but it isn’t good enough. I know there are lots of things that we have to improve.
            </p> 
            <p>
              So, i wonder can you <a>give us some advice?</a> How can we make this product better? It means alot for us
            </p>
          </div>
          <el-row>
            <el-col :span="6" :offset="8">
              <el-button size="medium" data-dismiss="modal" class="cancle">I change my mind</el-button>
            </el-col>
            <el-col :span="6">
              <el-button data-dismiss="modal" v-on:click="change" v-bind:style="{'background-color':'#47CA67', 'color': '#fff'}">
                Change my subscription
                <i class="el-icon-arrow-right el-icon-right"></i>
              </el-button>
            </el-col>
          </el-row>
        </div>
      </div>
    </div>
  </div>
</template>
<script>
export default {
    methods: {
    change(){
      this.$emit('update', 'free')
    }
  },
}
</script>
<style>
.title-dg{
  color: #2FCA5A;
  font-family: 'Poppins', sans-serif;
  font-size: 24px;
  font-weight: normal;
  margin-bottom: 15px;
}
.header{
  text-align: center;
}
.cancle{
  border: none;
}
.detail-dg{
  color: #000000;
  font-family: 'Poppins', sans-serif;
  font-size: 16px;
  font-weight: normal;
  font-style: normal;
  line-height: 24px;
  margin-bottom: 40px;
}


</style>