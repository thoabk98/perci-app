<template>
  <div class="modal" id="customModal" role="dialog">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">What is in your mine?</h4>
        </div>
        <div class="modal-body">
          <el-form ref="form" :model="form">
            <el-form-item>
              <span>Your email</span>
              <el-input v-model="form.email"></el-input>
            </el-form-item>
            <el-form-item>
              <span>Number of impression</span>
              <el-input v-model="form.impression"></el-input>
            </el-form-item>
            <el-form-item>
              <span>Price Suggestion</span>
              <el-input v-model="form.suggest"></el-input>
            </el-form-item>
              <el-form-item>
              <span>Futher Request?</span>
            <el-input type="textarea" v-model="form.request"></el-input>
              </el-form-item>
            <el-form-item>
              <el-button type="primary">Submit</el-button>
              <el-button data-dismiss="modal" >Cancel</el-button>
            </el-form-item>
          </el-form>
        </div>
      </div>
    </div>
  </div>
</template>
<script>
export default {
  data(){
    return{
      form: {
        email: '',
        impression: '',
        suggest: '',
        request: ''
      }
    }
  }
}
</script>
<style>
.modal{
  color: black;
}
</style>