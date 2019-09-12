<template>
    <div>
        <div class="content-header">
            <h1>
                Thêm nhân viên
            </h1>
            <ol class="breadcrumb">
                <li><a><i class="fa fa-dashboard"></i> Home</a></li>
                <li class="active"><router-link :to="{name: 'user.index'}">Danh sách nhân viên</router-link></li>
                <li class="active">Thêm nhân viên</li>
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
                                    <select class="form-control" v-model="user.role">
                                        <option v-for="r in roles" :value="r.id">{{r.label}}</option>
                                    </select>
                                    <span class="help-block" v-if="form.errors.has('role')">{{ form.errors.first('role') }}</span>
                                </div>
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
                    name: '',
                    email: '',
                    phone: '',
                    role: 1
                },
                roles: [
                    {id: 1, label: 'admin'}
                ],
                form: new Form(),
                loading: false,
            }
        },
        methods: {
            onSubmit() {
                this.loading = true;
                this.form = new Form(this.user);

                this.form.post(route('api.user.store'))
                    .then(res=> {
                        this.loading = false;
                        if (res.success) {
                            this.$router.push({ name: 'user.index' });
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
    }
</script>