<style>
    .box{
        border-radius: 15px;
        border-top: white;
    }
    .active-container{
        border-radius: 5px;
        border: 2px solid #F11010;
    }
    .el-input__inner{
        border-color: white
    }
    .el-input__prefix{
        right: 5px;
        left:auto;
    }
    .el-icon-date{
        color: #E51313
    }
    .content-centre-height{
        margin: auto;
        padding-right: 5%;
    }
    .icon-top-color{
        color: #24DA6D;
    }
    .box-container-y{
        width: 240px;
        height: 83px;
    }
    .box-container-x{
        height: 63px;
    }
    .default-container{
        border-radius: 5px;
        border: 2px solid #B1B1B1
    }
    .icon-down-color{
        color: #DA2424;
    }
    .el-header{
        padding: 0 10px;
    }
    .el-footer{
        padding: 0 10px;
    }
    #doughnut-chart{
        width: 250px;
        height: 250px;
    }
    .button-full-page{
        position: absolute;
        top: -20px;
    }
    .el-pagination.is-background .el-pager li{
        background-color: white
    }
    .el-pagination{
        text-align: center;
    }
    .container-item{
        width: 115px;
        height: 83px;
    }
    .container-main{
        font-size: 25px;
        font-weight: 500;
        font-style: normal;
        line-height: 33px;
    }
    .container-header{
        font-style: normal;
        font-weight: 300;
        font-size: 20px;
        line-height: 24px;
    }
    .container-footer{
        font-style: normal;
        font-weight: normal;
        font-size: 13px;
        line-height: 13px;
    }
    .text-center{
        text-align:left;
    }
    .icon-up-color{
        color: #24DA6D;
    }
</style>
<template>
    <div>
        <section class="content">
            <div class="row">
                <div class="col-xs-12">
                    <div class="box">
                        <div class="box-header" style="padding-right: 15px;">

                            <div class="pull-right">
                                <div class="block" >
                                    <el-container>
                                        <el-main><el-button style="background-color: #E51313; color: white" round>Compare <i class="el-icon-share"></i></el-button></el-main>
                                    </el-container>

                                </div>
                            </div>
                            <div class="pull-right">
                                <div class="block" style="margin-top:4px; margin-right: 10px">
                                    <el-container>
                                        <el-main>
                                            <el-date-picker
                                                    v-model="value1"
                                                    type="date"
                                                    placeholder="Pick a date"
                                                    default-value="2010-10-01">
                                            </el-date-picker>
                                        </el-main>
                                    </el-container>

                                </div>
                            </div>

                        </div>
                        <!--<div class="box-body">-->
                            <!--<div class="col-md-6">-->
                                <!--<div class="col-md-12">-->
                                    <!--<el-container class="active-container box-container-y">-->
                                        <!--<el-container>-->
                                                <!--<el-header style="height: 50%; font-size: 22px; color: #EF0F0F">-->
                                                    <!--Total sales <i class="el-icon-caret-top icon-top-color"></i>-->
                                                <!--</el-header>-->
                                                <!--<el-footer style="height: 50%; font-size: 22px; color: #EF0F0F; font-weight:bold">-->
                                                    <!--$ 2490.53-->
                                                <!--</el-footer>-->
                                        <!--</el-container>-->
                                        <!--<div class="content-centre-height pull-right">-->
                                            <!--<i class="fa fa-eye" style="margin-left: 75%;"></i><br>-->
                                            <!--View cart-->
                                        <!--</div>-->
                                    <!--</el-container>-->
                                <!--</div>-->
                                <!--<div class="col-md-12" style="margin-top: 18px">-->
                                    <!--<el-container class="box-container-y default-container">-->
                                        <!--<el-container>-->
                                            <!--<el-header style="height: 50%; font-size: 22px; color: #EF0F0F">-->
                                                <!--Total sales <i class="el-icon-caret-top icon-top-color"></i>-->
                                            <!--</el-header>-->
                                            <!--<el-footer style="height: 50%; font-size: 22px; color: #EF0F0F; font-weight:bold">-->
                                                <!--$ 2490.53-->
                                            <!--</el-footer>-->
                                        <!--</el-container>-->
                                        <!--<div class="content-centre-height pull-right">-->
                                            <!--<i class="fa fa-eye" style="margin-left: 75%;"></i><br>-->
                                            <!--View cart-->
                                        <!--</div>-->
                                    <!--</el-container>-->
                                <!--</div>-->
                                <!--<div class="col-md-12" style="margin-top: 18px">-->
                                    <!--<el-container class="box-container-y default-container">-->
                                        <!--<el-container>-->
                                            <!--<el-header style="height: 50%; font-size: 22px; color: #EF0F0F">-->
                                                <!--Total sales <i class="el-icon-caret-top icon-top-color"></i>-->
                                            <!--</el-header>-->
                                            <!--<el-footer style="height: 50%; font-size: 22px; color: #EF0F0F; font-weight:bold">-->
                                                <!--$ 2490.53-->
                                            <!--</el-footer>-->
                                        <!--</el-container>-->
                                        <!--<div class="content-centre-height pull-right">-->
                                            <!--<i class="fa fa-eye" style="margin-left: 75%;"></i><br>-->
                                            <!--View cart-->
                                        <!--</div>-->
                                    <!--</el-container>-->
                                <!--</div>-->
                            <!--</div>-->
                            <!--<div class="col-md-6" style="padding-right: 0px;">-->
                                <!--<div class="col-md-3" style="padding-left: 0px">-->
                                    <!--<el-container class="box-container-x active-container" style="border: 1px solid #F20C0C">-->
                                            <!--<el-header style="height: 40%" >-->
                                                <!--View <i class="el-icon-caret-top icon-top-color"></i>-->
                                            <!--</el-header>-->
                                            <!--<el-footer style="height: 60%; font-size:16px; color: #EF0F0F">-->
                                                <!--$ 2490.53-->
                                            <!--</el-footer>-->
                                    <!--</el-container>-->
                                <!--</div>-->

                                <!--<div class="col-md-3" style="padding-left: 0px">-->

                                <!--</div>-->
                                <!--<div class="col-md-3">-->
                                    <!--<el-container class="box-container-x active-container" style="border: 1px solid #F20C0C">-->
                                        <!--<el-header style="height: 40%" >-->
                                            <!--Clicks <i class="el-icon-caret-top icon-down-color"></i>-->
                                        <!--</el-header>-->
                                        <!--<el-footer style="height: 60%; font-size:16px; color: #4B4B4B;">-->
                                            <!--$ 2490.53-->
                                        <!--</el-footer>-->
                                    <!--</el-container>-->
                                <!--</div>-->
                                <!--<div class="col-md-3" style="padding-left: 0px">-->
                                    <!--<el-container class="box-container-x active-container" style="border: 1px solid #F20C0C">-->
                                        <!--<el-header style="height: 40%" >-->
                                            <!--C.O Success <i class="el-icon-caret-top icon-top-color"></i>-->
                                        <!--</el-header>-->
                                        <!--<el-footer style="height: 60%; font-size:16px; color: #EF0F0F">-->
                                            <!--23,4%-->
                                        <!--</el-footer>-->
                                    <!--</el-container>-->
                                <!--</div>-->
                                <!--<div class="col-md-12" style="margin-top: 20px; padding-left: 0px">-->
                                    <!--<line-chart :data="data" ></line-chart>-->
                                <!--</div>-->
                            <!--</div>-->
                        <!--</div>-->
                        <!--<div class="box-footer" style="border: white; text-align:center; padding: 0px; position: relative">-->
                                <!--<el-button style="background-color: #E51313; color: white" round class="button-full-page">Full report <i class="el-icon-arrow-down"></i></el-button>-->
                        <!--</div>-->
                        <div class="box-body">
                            <div class="col-md-2 text-center">
                                <el-container>
                                    <el-header>
                                        <span class="container-header">Total Revenue</span>
                                        <br>
                                        <span class="container-main">$ 2490.53</span>
                                    </el-header>
                                    <el-footer>
                                        <i class="el-icon-caret-top icon-up-color"></i> <span class="container-footer">12.4% since yesterday</span>
                                    </el-footer>
                                </el-container>
                            </div>
                            <div class="col-md-2 text-center">
                                <el-container>
                                    <el-header>
                                        <span class="container-header">Impressions</span>
                                        <br>
                                        <span class="container-main">903</span>
                                    </el-header>
                                    <el-footer>
                                        <span class="container-footer"><i class="el-icon-caret-top icon-up-color"></i> 12.4% since yesterday</span>
                                    </el-footer>
                                </el-container>
                            </div>
                            <div class="col-md-2 text-center">
                                <el-container>
                                    <el-header>
                                        <span class="container-header">Clicks</span>
                                        <br>
                                        <span class="container-main">200</span>
                                    </el-header>
                                    <el-footer>
                                        <i class="el-icon-caret-top icon-up-color"></i> <span class="container-footer">12.4% since yesterday</span>
                                    </el-footer>
                                </el-container>
                            </div>
                            <div class="col-md-2 text-center">
                                <el-container>
                                    <el-header>
                                        <span class="container-header">AOV</span>
                                        <br>
                                        <span class="container-main">$ 290.53</span>
                                    </el-header>
                                    <el-footer>
                                        <i class="el-icon-caret-bottom icon-down-color"></i> <span class="container-footer">12.4% since yesterday</span>
                                    </el-footer>
                                </el-container>
                            </div>
                            <div class="col-md-2 text-center">
                                <el-container>
                                    <el-header>
                                        <span class="container-header">C.O Success</span>
                                        <br>
                                        <span class="container-main">32</span>
                                    </el-header>
                                    <el-footer>
                                        <i class="el-icon-caret-top icon-up-color"></i> <span class="container-footer">12.4% since yesterday</span>
                                    </el-footer>
                                </el-container>
                            </div>
                            <div class="col-md-2 text-center">
                                <el-container>
                                    <el-header>
                                        <span class="container-header">Rev. Increase</span>
                                        <br>
                                        <span class="container-main">$ 290.53</span>
                                    </el-header>
                                    <el-footer>
                                        <i class="el-icon-caret-top icon-up-color"></i> <span class="container-footer">12.4% since yesterday</span>
                                    </el-footer>
                                </el-container>
                            </div>
                            <div class="col-md-8">
                                <h3 style="padding: 0 10px;font-weight: 500;">Performance</h3>
                                <apexchart type=line height=350 :options="chartOptions" :series="series" />
                            </div>
                            <div class="col-md-4" style="text-align: center">
                                <h3>Revenue Ratio</h3>
                                <vc-donut style="margin-top:15px;padding: 25px;"
                                        background="white" foreground="grey"
                                        :size="200" unit="px" :thickness="30"
                                        has-legend legend-placement="bottom"
                                        :sections="sections" :total="100"
                                        :start-angle="0"
                                        @section-click="handleSectionClick"
                                >
                                </vc-donut>
                            </div>
                        </div>

                    </div>
                </div>
                <div class="col-xs-12" style="margin-top: 16px">
                    <div class="box">
                        <div class="box-header" style="padding-right: 15px;">
                            <div class="pull-left">
                                <h3>Best Offers <span style="color: #E51313">Cross-sell  &emsp;<i class="fa fa-exchange"></i></span>&emsp; Up sell</h3>
                            </div>
                            <div class="pull-right">
                                <h4>Export to excel <i class="fa fa-share-square-o"></i></h4>

                            </div>
                        </div>
                        <div class="box-body">
                            <el-table
                                    :data="tableData"
                                    style="width: 100%">
                                <el-table-column
                                        prop="date"
                                        label="Date"
                                        width="180">
                                </el-table-column>
                                <el-table-column
                                        prop="name"
                                        label="Name"
                                        width="180">
                                </el-table-column>
                                <el-table-column
                                        prop="address"
                                        label="Address">
                                </el-table-column>
                            </el-table>
                            <el-pagination
                                    style="tex-align: center"
                                    background
                                    layout="prev, pager, next"
                                    :total="1000">
                            </el-pagination>
                        </div>
                    </div>
                </div>
            </div>

        </section>
    </div>
</template>

<script>
    import Form from 'form-backend-validation';
    import PieChart from "./PieChart.js";

    export default {
        data() {
            return {
                user: {
                    role: 1
                },
                activeName: 'first',
                data : [
                    {name: 'Workout', data: {'2017-01-01': 3, '2017-01-02': 4}},
                    {name: 'Call parents', data: {'2017-01-01': 5, '2017-01-02': 3}}
                ],
                tableData: [{
                    date: '2016-05-03',
                    name: 'Tom',
                    address: 'No. 189, Grove St, Los Angeles'
                }, {
                    date: '2016-05-02',
                    name: 'Tom',
                    address: 'No. 189, Grove St, Los Angeles'
                }, {
                    date: '2016-05-04',
                    name: 'Tom',
                    address: 'No. 189, Grove St, Los Angeles'
                }, {
                    date: '2016-05-01',
                    name: 'Tom',
                    address: 'No. 189, Grove St, Los Angeles'
                }],
                value1: '',
                pwd: {
                    current_pwd: '',
                    change_pwd: '',
                    change_pwd_confirmation: '',
                },
                roles: [
                    {id: 1, label: 'admin'}
                ],
                sections: [
                    { label: 'Red section', value: 25, color: 'red' },
                    { label: 'Green section', value: 25, color: 'green' },
                ],
                activeTab: 'profile',
                form: new Form(),
                loading: false,

                series: [{
                    name: 'Website Blog',
                    type: 'column',
                    data: [440, 505, 414, 671, 227, 413, 201, 352, 752, 320, 257, 160]
                }, {
                    name: 'Social Media',
                    type: 'line',
                    data: [23, 42, 35, 27, 43, 22, 17, 31, 22, 22, 12, 16]
                }],
                chartOptions: {
                    stroke: {
                        width: [0, 4]
                    },
                    // title: {
                    //     text: 'Traffic Sources'
                    // },
                    // labels: ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"],
                    labels: ['01 Jan 2001', '02 Jan 2001', '03 Jan 2001', '04 Jan 2001', '05 Jan 2001', '06 Jan 2001',
                        '07 Jan 2001', '08 Jan 2001', '09 Jan 2001', '10 Jan 2001', '11 Jan 2001', '12 Jan 2001'
                    ],
                    xaxis: {
                        type: 'datetime'
                    },
                    yaxis: [{
                        title: {
                            text: 'Website Blog',
                        },

                    }, {
                        opposite: true,
                        title: {
                            text: 'Social Media'
                        }
                    }]
                }
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
            },
            handleClick(tab, event) {
                console.log(tab, event);
            },
            handleSectionClick(section) {
                console.log(`${section.label} clicked.`);
            }
        },
        mounted() {

        }
    }
</script>