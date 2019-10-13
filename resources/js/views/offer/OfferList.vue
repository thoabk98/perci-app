<template>
    <div>
        <div class='content-header'>
            <div class="row">
                <div class="col-xs-12">
                    <h2>Manage offers</h2>
                </div>
            </div>
        </div>

        <div class='content'>
            <div class="row">
                <div class="col-xs-7">
                    <el-button class="create-new-btn">Create new &nbsp;&nbsp;&nbsp;&nbsp;<span>+</span></el-button>
                </div>
                <div class="col-xs-5">
                    <template>
                        <el-input
                            v-model="search"
							prefix-icon="el-icon-search"
                            placeholder="Type to search"
							clearable/>
                    </template>
                </div>
            </div>
			<br>
            <div class="row">
                <div class="col-xs-12">
					<div class="box round-edge-box">
						<div class="box-body">
							<el-tabs v-model="activeName" @tab-click="handleClick">
								<el-tab-pane label="Offers" name="offer">
                                    <OfferListTable :offers="offers"></OfferListTable>
								</el-tab-pane>
								<el-tab-pane label="Groups" name="group">
									<OfferGroupList :offerGroups="offerGroups"></OfferGroupList>
								</el-tab-pane>
							</el-tabs>
						</div>
					</div>
				</div>
            </div>
        </div>
    </div>
</template>

<script>
import OfferGroupList from './OfferGroupList.vue'
import OfferListTable from './OfferListTable.vue'

export default {
    data() {
        return {
            offers: [{
                name: 'Red Shoes A82 Super Awesome No.1',
                address: 'No. 189, Grove St, Los Angeles',
                group_name: 'Group Name',
                date: '2016-05-02',
                cvs_rate: '35%',
                aov: '$234.04',
                views: 142,
            }, {
                name: 'Yellow Shoes A82 Super Awesome No.1',
                address: 'No. 189, Grove St, Los Angeles',
                group_name: 'Group Name',
                date: '2016-05-03',
                cvs_rate: '35%',
                aov: '$234.04',
                views: 142,
            }, {
                name: 'Green Shoes A82 Super Awesome No.1',
                address: 'No. 189, Grove St, Los Angeles',
                group_name: 'Group Name',
                date: '2016-05-04',
                cvs_rate: '35%',
                aov: '$234.04',
                views: 142,
            }, {
                name: 'Black Shoes A82 Super Awesome No.1',
                address: 'No. 189, Grove St, Los Angeles',
                group_name: 'Group Name',
                date: '2016-05-05',
                cvs_rate: '35%',
                aov: '$234.04',
                views: 142,
            }],
            offerGroups: [
                {
                    name: 'Group A01',
                    date: '2016-05-02',
                    isActive: true
                }, {
                    name: 'Group A02',
                    date: '2016-05-03',
                    isActive: false
                }, {
                    name: 'Group A03',
                    date: '2016-05-04',
                    isActive: false
                },{
                    name: 'Group A04',
                    date: '2016-05-05',
                    isActive: true
                }
            ],
            search: '',
            activeName: 'offer'
        }
    },
	components: {
		OfferGroupList,
        OfferListTable
	},
    methods: {
        handleEdit(index, row) {
            console.log(index, row);
        },
        handleDelete(index, row) {
            console.log(index, row);
        },
    },
}
</script>

<style lang="scss">
	.round-edge-box {
		border-radius: 10px;
	}

	.create-new-btn {
		background: #4C5B75;
		color: white;
		border-radius: 6px;
	}

    .text-secondary {
        color: #7F8FA4;
    }

    .offer-name {
        color: #072856;
        font-weight: bold;
    }

    .submenu-wrapper {
        cursor: pointer;
        position: relative;
        float: right;
        .submenu {
            display: none;
        }
        &:hover {
            .submenu {
                position: absolute;
                display: block;
                top: -10px;
                left: -60px;
                list-style: none;
                padding: 10px;
                background-color: #273148;
                border-radius: 5px;
                z-index: 1;
                &:before {
                    content: "";
                    position: absolute;
                    top: 20%;
                    left: 40px;
                    margin-top: -5px;
                    border: 10px solid transparent;
                    border-left: 15px solid #273148;
                }
                .submenu-item {
                    color: #fff;
                    .submenu-link {
                        color: #fff;
                    }
                }
            }
        }
    }
</style>
