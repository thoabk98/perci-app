<template>
    <div>
        <div class="content-header">
            <h1>
                Thông tin cá nhân
            </h1>
            <ol class="breadcrumb">
                <li><a><i class="fa fa-dashboard"></i> Home</a></li>
                <li class="active">Thông tin cá nhân</li>
            </ol>
        </div>

        <section class="content">
            <el-form ref="form"
                     :model="user"
                     label-width="120px"
                     label-position="top">
                <div class="row">
                    <div class="col-sm-12">
                        <div class="box box-primary">
                            <div class="box-body">
                                <el-tabs v-model="activeTab">
                                    <el-tab-pane label="Profile" name="profile">
                                        <div class="form-group" :class="{ 'has-error': form.errors.has('name') }">
                                            <label class="control-label">Tên</label>
                                            <input type="text" name="name" v-model="user.name" class="form-control" @keydown="keydown">
                                            <span class="help-block" v-if="form.errors.has('name')">{{ form.errors.first('name') }}</span>
                                        </div>
                                        <div class="form-group" :class="{ 'has-error': form.errors.has('phone') }">
                                            <label class="control-label">Số điện thoại</label>
                                            <input type="text" name="phone" v-model="user.phone" class="form-control" @keydown="keydown">
                                            <span class="help-block" v-if="form.errors.has('phone')">{{ form.errors.first('phone') }}</span>
                                        </div>
                                        <div class="form-group" :class="{ 'has-error': form.errors.has('email') }">
                                            <label class="control-label">Email</label>
                                            <input type="text" name="email" v-model="user.email" class="form-control" @keydown="keydown">
                                            <span class="help-block" v-if="form.errors.has('email')">{{ form.errors.first('email') }}</span>
                                        </div>
                                        <div class="form-group" :class="{ 'has-error': form.errors.has('role') }">
                                            <label class="control-label">Quyền</label>
                                            <select class="form-control" v-model="user.role" disabled>
                                                <option v-for="r in roles" :value="r.id">{{r.label}}</option>
                                            </select>
                                            <span class="help-block" v-if="form.errors.has('role')">{{ form.errors.first('role') }}</span>
                                        </div>
                                    </el-tab-pane>
                                    <el-tab-pane label="Mật khẩu" name="pwd">
                                        <div class="form-group" :class="{ 'has-error': form.errors.has('current_pwd') }">
                                            <label class="control-label">Mật khẩu hiện tại</label>
                                            <input type="password" name="current_pwd" v-model="pwd.current_pwd" class="form-control" @keydown="keydown">
                                            <span class="help-block" v-if="form.errors.has('current_pwd')">{{ form.errors.first('current_pwd') }}</span>
                                        </div>
                                        <div class="form-group" :class="{ 'has-error': form.errors.has('change_pwd') }">
                                            <label class="control-label">Mật khẩu mới</label>
                                            <input type="password" name="change_pwd" v-model="pwd.change_pwd" class="form-control" @keydown="keydown">
                                            <span class="help-block" v-if="form.errors.has('change_pwd')">{{ form.errors.first('change_pwd') }}</span>
                                        </div>
                                        <div class="form-group" :class="{ 'has-error': form.errors.has('change_pwd_confirm') }">
                                            <label class="control-label">Nhập lại mật khẩu mới</label>
                                            <input type="password" name="change_pwd_confirm" v-model="pwd.change_pwd_confirmation" class="form-control" @keydown="keydown">
                                            <span class="help-block" v-if="form.errors.has('change_pwd_confirm')">{{ form.errors.first('change_pwd_confirm') }}</span>
                                        </div>
                                    </el-tab-pane>
                                </el-tabs>
                            </div>
                            <div class="box-footer">
                                <el-form-item>
                                    <el-button type="success" @click="onSubmit()" :loading="loading">
                                        Submit
                                    </el-button>
                                </el-form-item>
                            </div>
                        </div>
                    </div>
                </div>
            </el-form>
        </section>
    </div>
</template>

<script>
    import Form from 'form-backend-validation';

    export default {
        data() {
            return {
                user: {
                    role: 1
                },
                pwd: {
                    current_pwd: '',
                    change_pwd: '',
                    change_pwd_confirmation: '',
                },
                roles: [
                    {id: 1, label: 'admin'}
                ],
                activeTab: 'profile',
                form: new Form(),
                loading: false,
            }
        },
        methods: {
            getData() {
                axios.get(route('api.account.profile'))
                    .then(res=>{
                        this.user = res.data.data;
                    })
            },
            onSubmit() {
                let api = '';
                if (this.activeTab==='profile') {
                    this.form = new Form(this.user);
                    api = 'api.update.profile'
                } else {
                    this.form = new Form(this.pwd);
                    api = 'api.profile.changePassword'
                }
                this.loading = true;

                this.form.post(route(api))
                    .then(res=> {
                        this.loading = false;
                        if (res.success) {
                            if (this.activeTab==='pwd') this.pwd={};
                            this.$message({
                                message: res.msg,
                                type: 'success'
                            });
                        } else {
                            this.$notify.error({
                                title: 'Error',
                                message: res.msg
                            });
                        }
                    })
                    .catch(error=> {
                        this.loading = false;
                        console.log(error);
                        this.$notify.error({
                            title: 'Error',
                            message: 'đã có lỗi xảy ra, vui lòng thử lai.'
                        });
                    })
            },
            keydown(event){
                this.form.errors.clear(event.target.name);
            }
        },
        mounted() {
            this.getData()
        }
    }
</script>