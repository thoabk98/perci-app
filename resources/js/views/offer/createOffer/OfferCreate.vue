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
                <el-button class="save-btn">Save</el-button>
            </div>
        </div>

        <div class="content">
            <div class="row">
                <div class="col-md-5 left-container">
                    <el-card class="box-card">
                        <h3>Basic Info</h3>
                        <div class="input-wrapper">
                            <span class="input-title">Offer's name</span>
                            <el-input placeholder="Upsell Product "v-model="offerName"></el-input>
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
                                        <h5><i class="el-icon-aim"></i>&nbsp;&nbsp;Target Products</h5>
                                        <p>Order with Target Products will trigger the popup</p>
                                        <el-button class="popup-btn" type="text" @click="dialogVisible = true" icon="el-icon-edit-outline">Edit</el-button>
                                        <el-dialog
                                            title="Select Product"
                                            :visible.sync="dialogVisible"
                                            width="60%"
                                            :before-close="handleClose">
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <el-input
                                                        placeholder="Search products, colecttions,..."
                                                        prefix-icon="el-icon-search"
                                                        v-model="groupName">
                                                    </el-input>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="head">
                                                        <h4 style="display: inline-block">Results</h4>
                                                        <el-button type="text" style="float: right;">Select all</el-button>
                                                    </div>
                                                    <div class="wrapper results-wrapper">
                                                        <div style="padding: 1rem 0;">
                                                            <img width="30" src="#" style="vertical-align: super;">
                                                            <div style="width: 35%; display: inline-block; padding-left: 1rem;"><strong>Arabian Chair</strong><br><strong>$300</strong></div>
                                                            <el-button style="float: right; padding: 1rem; margin-left: 1rem;" type="text">ADD</el-button>
                                                            <el-select style="float: right; width: 40%" v-model="value" placeholder="Select">
                                                                <el-option
                                                                    v-for="item in options"
                                                                    :key="item.value"
                                                                    :label="item.label"
                                                                    :value="item.value">
                                                                </el-option>
                                                            </el-select>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="head">
                                                        <h4 style="display: inline-block">Selected Products</h4>
                                                        <el-button style="float: right;" type="text">Remove all</el-button>
                                                    </div>
                                                    <div class="wrapper selected-wrapper">
                                                        <div style="padding: 1rem 0;">
                                                            <img width="30" src="#" style="vertical-align: super;">
                                                            <div style="width: 35%; display: inline-block; padding-left: 1rem;"><strong>Arabian Chair</strong><br><strong>$300</strong></div>
                                                            <el-button style="float: right; padding: 1rem; margin-left: 1rem;" type="text"><i class="el-icon-delete-solid"></i></el-button>
                                                            <el-select style="float: right; width: 40%" v-model="value" placeholder="Select">
                                                                <el-option
                                                                    v-for="item in options"
                                                                    :key="item.value"
                                                                    :label="item.label"
                                                                    :value="item.value">
                                                                </el-option>
                                                            </el-select>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

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
                                <h2>LIMITED TIME OFFER!</h2>
                            </div>
                            <div class="text-component">Add these Items and Save</div>
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
                                <el-input placeholder="LIMITED TIME OFFER! "v-model="headline"></el-input>
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
export default {
    data() {
        return {
            offerName: '',
            groupName: '',
            headline: '',
            description: '',
            searchProduct: '',
            targetRadio: '',
            displayRadio: '',
            isActive: false,
            dialogVisible: false
        }
    },
    methods: {
        handleClose(done) {
            this.$confirm('Are you sure to close this dialog?')
            .then(_ => {
                done();
            })
            .catch(_ => {});
        }
    }
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
