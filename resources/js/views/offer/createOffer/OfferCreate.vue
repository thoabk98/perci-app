<template>
    <div class="main-container">
        <div class="content-header">
            <div class="row">
                <div class="col-md-12">
                    <h2>Set up a sale offer</h2>
                </div>
            </div>
            <div class="col-md-12" style="font-size: 16px">
                <el-breadcrumb class="create-offer-step" separator-class="el-icon-arrow-right">
                    <el-breadcrumb-item>Offer Type</el-breadcrumb-item>
                    <el-breadcrumb-item>Location</el-breadcrumb-item>
                    <el-breadcrumb-item><strong>Offer settings</strong></el-breadcrumb-item>
                </el-breadcrumb>

                <el-button class="publish-btn">Publish</el-button>
                <el-button class="save-btn" @click="save()">Save</el-button>
            </div>
        </div>

        <div class="content">
            <div class="row">
                <div class="col-md-5 left-container">
                    <el-card class="box-card">
                        <h3>Basic Info</h3>
                        <div class="input-wrapper">
                            <span class="input-title">Offer's name</span>
                            <el-input placeholder="Upsell Product " v-model="offerName"></el-input>
                        </div>
                        <div class="input-wrapper">
                            <span class="input-title">Group's name</span>
                            <el-input placeholder="Upsell Product " v-model="groupName"></el-input>
                        </div>
                    </el-card>
                    <el-card class="box-card">
                        <h3>Select Product</h3>
                        <el-radio-group v-model="targetRadio">
                            <el-radio-button label="Normal Cross-sell"></el-radio-button>
                            <el-radio-button label="Bundled Cross-sell"></el-radio-button>
                        </el-radio-group>
                        <div class="block-1" v-if="isActive == false">
                            <ul>
                                <li>
                                    <div class="target-wrapper">
                                        <h5><i class="el-icon-aim"></i>&nbsp;&nbsp;Target Products<span>&nbsp;( {{product_list_choose.length}} product(s) selected )</span></h5>
                                        <p>Order with Target Products will trigger the popup</p>
                                        <p v-for="product in product_list_choose">{{product.name}}</p>
                                        <el-button class="popup-btn" type="text" @click="dialogShow" icon="el-icon-edit-outline">Edit</el-button>
                                        <el-dialog
                                            title="Select Product"
                                            :visible.sync="dialogVisible"
                                            width="80%"
                                            >

                                            <div class="row" v-loading.body="loading">
                                                <div class="col-md-6">
                                                    <el-input
                                                        placeholder="Search products, colecttions,..."
                                                        prefix-icon="el-icon-search"
                                                        v-model="groupName">
                                                    </el-input>
                                                </div>
                                            </div>
                                            <div class="row" v-if="offer.type == 1">
                                                <div class="wrapper results-wrapper" style="overflow:auto" v-infinite-scroll="load" infinite-scroll-disabled="disabled">
                                                    <div v-for="item in product_list" style="padding: 4rem 0;" >
                                                            <img width="30" v-bind:src="item.image" style="vertical-align: super;">
                                                            <div style="width: 35%; display: inline-block; padding-left: 1rem;"><strong>{{ item.name }}</strong><br><strong>{{ item.price }}</strong></div>
                                                            <el-select v-model="variants" placeholder="Select">
                                                                <el-option
                                                                v-for="item in variantOptions"
                                                                :key="item.value"
                                                                :label="item.label"
                                                                :value="item.value">
                                                                </el-option>
                                                            </el-select>
                                                            <el-button style="float: right; padding: 1rem; margin-left: 1rem;" @click="addUpsellListChoose(item)" type="radio"></el-button>
                                                    </div>
                                                    <p v-if="scroll_loading">Loading...</p>
                                                </div>
                                            </div>
                                            <div class="row" v-if="offer.type == 2">
                                                <div class="col-md-6">
                                                    <div class="head">
                                                        <h4 style="display: inline-block">Results</h4>
                                                        <el-button type="text" style="float: right;">Select all</el-button>
                                                    </div>
                                                    <div class="wrapper results-wrapper" style="overflow:auto" v-infinite-scroll="load" infinite-scroll-disabled="disabled">
                                                            <div v-for="item in product_list" style="padding: 1rem 0;" >
                                                                    <img width="30" v-bind:src="item.image" style="vertical-align: super;">
                                                                    <div style="width: 35%; display: inline-block; padding-left: 1rem;"><strong>{{ item.name }}</strong><br><strong>{{ item.price }}</strong></div>
                                                                    <el-button style="float: right; padding: 1rem; margin-left: 1rem;" @click="addListChoose(item)" type="text">ADD</el-button>
                                                                    <!--<el-select style="float: right; width: 40%" v-model="value" placeholder="Select">-->
                                                                    <!--<el-option-->
                                                                    <!--v-for="item in options"-->
                                                                    <!--:key="item.value"-->
                                                                    <!--:label="item.label"-->
                                                                    <!--:value="item.value">-->
                                                                    <!--</el-option>-->
                                                                    <!--</el-select>-->
                                                            </div>
                                                            <p v-if="scroll_loading">Loading...</p>

                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="head">
                                                        <h4 style="display: inline-block">Selected Products</h4>
                                                        <el-button style="float: right;" type="text">Remove all</el-button>
                                                    </div>
                                                    <div class="wrapper selected-wrapper">
                                                        <div style="padding: 1rem 0;" v-if="product_list_choose.length" v-for="it in product_list_choose">
                                                            <img width="30" v-bind:src="it.image" style="vertical-align: super;">
                                                            <div style="width: 35%; display: inline-block; padding-left: 1rem;"><strong>{{ it.name }}</strong><br><strong>${{ it.price }}</strong></div>
                                                            <el-button style="float: right; padding: 1rem; margin-left: 1rem;" type="text" @click="removeItemListChoose(it)"><i class="el-icon-delete-solid"></i></el-button>
                                                            <!--<el-select style="float: right; width: 40%" v-model="value" placeholder="Select">-->
                                                                <!--<el-option-->
                                                                    <!--v-for="item in options"-->
                                                                    <!--:key="item.value"-->
                                                                    <!--:label="item.label"-->
                                                                    <!--:value="item.value">-->
                                                                <!--</el-option>-->
                                                            <!--</el-select>-->
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <!-- <OfferProductList></OfferProductList> -->

                                            <span slot="footer" class="dialog-footer">
                                                <el-button @click="dialogVisible = false">Cancel</el-button>
                                                <el-button type="primary" @click="dialogVisible = false">Continue (3)</el-button>
                                            </span>
                                        </el-dialog>
                                    </div>
                                </li>
                                <li>
                                    <div class="target-wrapper">
                                        <h5><i class="el-icon-star-off"></i>&nbsp;&nbsp;Offer Products</h5>
                                        <p>Vat pham ben trong se duoc them vao gio hang cung voi Target Product</p>
                                        <el-button class="popup-btn" type="text" @click="outerVisible = true" icon="el-icon-document-add">Add</el-button>
                                    </div>
                                </li>
                            </ul>
                        </div>
                        <div class="block-2" v-if="isActive == true">
                            This is block 2
                        </div>
                    </el-card>
                    <el-card class="box-card">
                        <p>OPTIONAL</p>
                        <h3>Discount Settings</h3>
                        <p><el-button type="text" icon="el-icon-shopping-cart-2">Set a Discount</el-button></p>
                        <p><el-button type="text" icon="el-icon-date">Set a Date Range</el-button></p>
                    </el-card>
                </div>

                <div class="col-md-7 right-container">
                    <el-card class="box-card outter-top">
                        <el-card class="box-card inner">
                            <div class="text-component ">
                                <h2>{{ headline }}</h2>
                            </div>
                            <div class="text-component">{{ description }}</div>
                            <div class="row text-component">
                                <div class="col-lg-6 text-left"><img width="100%" src="https://images.unsplash.com/photo-1555089439-9edb4b4b8dfb?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&w=1000&q=80" class="img-fluid" alt="" /></div>
                                <div class="col-lg-6 text-left">
                                    <h4>Apple Macbook Pro</h4>
                                    <ul class="pb-4">
                                        <li class="pt-1">Laptop - Classic Rose</li>
                                        <li class="py-3"><s class="text-muted">$990.00</s><br><span class="ml-3 text-success">$890.00</span></li>
                                        <li class="pb-1">Colors</li>
                                        <ul>
                                            <li class="d-inline"><button type="button" class="px-0 mr-2 color-picker btn btn-info rounded-circle"></button></li>
                                            <li class="d-inline"><button type="button" class="px-0 mr-2 color-picker btn btn-danger rounded-circle"></button></li>
                                        </ul>
                                    </ul>
                                    <button type="button" class="btn btn-success rounded font-weight-bold col-sm-6">Add to cart</button>
                                </div>
                            </div>
                        </el-card>
                    </el-card>
                    <el-card class="box-card outter-bottom">
                        <div class="template">
                            <h3>Display Settings</h3><br>
                            <span class="template-title">Popup Template</span>
                            <span class="template-name">Chirstmas Theme 2019</span>
                            <el-button type="text">Change</el-button>
                        </div>
                        <div>
                            <div class="input-wrapper">
                                <span class="input-title">Headline</span>
                                <el-input placeholder="Enter headline" v-model="headline"></el-input>
                            </div>
                            <div class="input-wrapper">
                                <span class="input-title">Description</span>
                                <el-input
                                    class="des-input"
                                    type="textarea"
                                    placeholder="Add these items and save"
                                    v-model="description">
                                </el-input>
                            </div>
                        </div>
                    </el-card>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
import OfferProductList from './OfferProductList.vue'
import Form from 'form-backend-validation';

export default {
    data() {
        return {
            offerName: '',
            groupName: '',
            headline: 'LIMITED TIME OFFER!',
            description: 'Add these Items and Save',
            searchProduct: '',
            targetRadio: '',
            displayRadio: '',
            isActive: false,
            dialogVisible: false,
            loading: false,
            product_list: [],
            product_list_choose: [],
            scroll_loading: false,
            page: 1,
            limit: 10,
            total: 0,
            form: new Form(),
            variantOptions: [{
                value: 'Big',
                label: 'Big'
            }, {
                value: 'Medium',
                label: 'Medium'
            }]
        }
    },
    watch: {
        'offerName': function(newVal, oldVal) {
            // this.form.errors.clear('offerName');
            if(!newVal)
                this.form.errors.push
        }
    },
    methods: {
        handleClose(done) {
            this.$confirm('Are you sure to close this dialog?')
            .then(_ => {
                done();
            })
            .catch(_ => {});
        },
        save() {
            var content = {
                offerName: this.offerName,
                groupName: this.groupName,
                headLine: this.headline,
                description: this.description
            };
            /* selected product id*/
            var offer_product_id = [];
            this.product_list_choose.forEach(function(element) {
                offer_product_id.push(element.id);
            });
            this.offer.offer_product_id = offer_product_id;
            this.offer.content = content;
            this.$emit("nextStep", 2, this.offer);
            this.submitForm();
        },
        getListProduct(object = {}){
            axios.get(route('api.product.get', object))
                .then(res=>{
                    this.loading = false;
                    this.product_list = this.product_list.concat(res.data.data.data);
                    this.total = res.data.data.total;
                    this.page += 1;
                    this.scroll_loading = false;
                })
        },
        submitForm() {
            this.form = new Form(this.offer);
            console.log(this.form);
            this.form.post('/api/offer/')
                .then(res => {
                    if(res.success) {
                        this.$message({
                            message: res.msg,
                            type: 'success'
                        });
                    } else {
                        this.$notify.error({
                            title: 'Error',
                            message: res.msg
                        });
                        console.log(res);
                    }
                })
                .catch();
        },
        dialogShow(){
            this.loading = true;
            if(this.product_list.length == 0){
                this.getListProduct();
            }
            this.dialogVisible = true;
        },
        load () {
            if(this.page > 1 && (this.page - 1)*5 < this.total){
                //console.log(1);
                this.scroll_loading = true;
                this.getListProduct({
                    page: this.page,
                });
            }
        },
        addListChoose(object){
            this.product_list_choose.push(object);
            var index = this.product_list.map(x => {
                return x.id;
            }).indexOf(object.id);
            this.product_list.splice(index, 1);
        },
        addUpsellListChoose(object){
            this.product_list_choose = [];
            this.product_list_choose.push(object);
            var index = this.product_list.map(x => {
                return x.id;
            }).indexOf(object.id);
        },
        removeItemListChoose(object){
            this.product_list.push(object);
            var index = this.product_list_choose.map(x => {
                return x.id;
            }).indexOf(object.id);
            this.product_list_choose.splice(index, 1);
        }
    },
    components: {
        OfferProductList
    },
    computed: {
        disabled () {
            return this.scroll_loading
        }
    },

    props: [ 'offer' ]
}
</script>

<style lang="scss" scoped>
.main-container {
    padding: 3rem;
    h2 {
        padding-bottom: 4.5rem;
        color: #000;
    }
    .content-header {
        .el-breadcrumb {
            display: inline-block;
            padding-top: 1rem;
            font-size: 16px;
        }
        .el-button {
            float: right;
            border: none;
            padding: 1rem 3rem;
            font-size: 16px;
        }
        .save-btn {
            background-color: inherit;
        }
        .publish-btn {
            background-color: #072856;
            color: #fff;
        }
    }
    .content {
        margin-top: 5rem;
        .box-card {
            margin-bottom: 1.5rem;
            border-radius: 10px;
            .input-wrapper {
                position: relative;
                .input-title {
                    position: absolute;
                    background-color: #fff;
                    z-index: 1;
                    padding: 0 10px;
                    left: 20px;
                    top: 4px;
                }
                .el-input {
                    padding-top: 1.5rem;
                    padding-bottom: 2rem;
                    & /deep/ .el-input__inner {
                        border-radius: 6px;
                        border-color: #000;
                        padding: 1.5rem 15px 1rem;
                        font-size: 16px;
                        height: 45px;
                    }
                }
                .des-input {
                    padding-top: 1.5rem;
                    padding-bottom: 2rem;
                    & /deep/ .el-textarea__inner {
                        border-radius: 6px;
                        border-color: #000;
                        padding: 1.5rem 15px 1rem;
                        font-size: 16px;
                        min-height: 120px!important;
                    }
                }
            }
            .el-radio-button {
                margin: 10px 20px 0 0;
                & /deep/ .el-radio-button__inner {
                    background-color: inherit;
                    color: #bbb;
                    border: 1px solid transparent;
                    border-radius: 5px;
                    box-shadow: 0 2px 12px 0 rgba(0,0,0,.1)!important;
                }
            }
            .is-active {
                & /deep/ .el-radio-button__inner {
                    background-color: inherit;
                    color: #072856;
                    border: 1px solid #072856;
                    border-radius: 5px;
                }
            }
            .el-button--text {
                color: #072856;
            }
            h3 {
                margin-top: 0;
            }
        }
        .left-container {
            ul {
                padding-left: 0;
                list-style-type: none;
                li {
                    font-size: 13px;
                }
            }
            .target-wrapper {
                position: relative;
                margin-top: 2rem;
                p {
                    width: 80%;
                }
                .popup-btn {
                    position: absolute;
                    top: 0;
                    right: 0;
                    padding: .5rem 1.5rem;
                }

                .el-dialog {
                    padding: 0 10px;
                    .head {
                        padding: 3rem 0 2rem;
                    }
                    .wrapper {
                        max-height: 200px;
                        overflow-y: auto;
                    }
                    .el-input {
                        & /deep/ .el-input__inner {
                            border-radius: 6px;
                            padding: 1rem 30px;
                            font-size: 14px;
                            height: 40px;
                        }
                    }
                    .el-select {
                        & /deep/ .el-input__inner {
                            border-radius: 6px;
                        }
                    }
                }
            }
        }
        .right-container {
            .outter-top {
                margin-bottom: 0;
                background-color: #606266;
                border-bottom-left-radius: 0;
                border-bottom-right-radius: 0;
                .inner {
                    width: 90%;
                    margin: 1rem auto;
                    img {
                        margin-top: 1.5rem;
                        border: 1px solid #ccc;
                        border-radius: 10px;
                    }
                    h2 {
                        margin-top: 0;
                        padding-bottom: 0;
                        color: #000;
                    }
                    .text-component {
                        padding-left: 1rem;
                    }
                    ul {
                        padding-left: 0;
                        list-style-type: none;
                        .d-inline {
                            display: inline-block;
                            .color-picker {
                                width: 16px;
                                height: 16px;
                                border-radius: 50%;
                                padding: 0;
                            }
                        }
                    }
                    .rounded {
                        border-radius: 25px;
                        padding: .2rem 1rem;
                        font-weight: bold;
                    }
                }
            }
            .outter-bottom {
                border: none;
                border-top-left-radius: 0;
                border-top-right-radius: 0;
                .template {
                    padding-bottom: 1rem;
                    h3 {
                        display: inline-block;
                    }
                    .template-title {
                        padding-right: 2rem;
                        font-weight: bold;
                    }
                    .el-button {
                        float: right;
                        padding: 0;
                    }
                }
            }
        }
    }
}
</style>
