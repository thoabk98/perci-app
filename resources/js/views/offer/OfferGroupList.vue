<template>
    <div>
        <div v-if="offerGroups.length > 0">
            <el-table
                    :data="offerGroups"
                    v-loading="isLoading"
                    style="width: 100%"
                    column-gap="40px">
                <el-table-column
                        width="40px"
                        className="offer-name">
                    <i class="fa fa-folder-open fa-2x"></i>
                </el-table-column>
                <el-table-column
                        label="Name"
                        prop="name"
                        className="offer-name"
                        min-width="100">
                </el-table-column>
                <el-table-column
                        label="Date"
                        prop="date"
                        className="text-secondary"
                        min-width="100">
                </el-table-column>
                <el-table-column
                        min-width="200"
                        align="right">
                    <template slot-scope="scope">
                        <el-switch
                                :value="checkbox(scope)"
                                @change="changeState(scope)">
                        </el-switch>
                        &nbsp;
                        <el-popover
                                placement="left"
                                trigger="click"
                                :ref="'popover'+scope.$index">
                            <el-link @click="handleEdit(scope.row)">
                                <strong>Edit</strong>
                            </el-link>
                            <br>
                            <el-link @click="showDeleteConfirm(scope.$index, scope.row)">
                                <strong>Delete</strong>
                            </el-link>
                            <span role="button" slot="reference">︙</span>
                        </el-popover>
                    </template>
                </el-table-column>
            </el-table>
        </div>
        <div v-else>
            <div class="text-center">
                <img v-bind:src="'/images/Folder.png'"/>
                <div class="row">
                    <div class="col-md-2">
                    </div>
                    <div class="col-md-8">
                        It is a long established fact that a reader will be distracted by the readable content of a page
                        when looking at its layout.
                    </div>
                </div>
                <br>
                <div class="row">
                    <el-button class="create-new-btn" @click="creatGroup">Create group</el-button>
                </div>
            </div>
            <br>
        </div>
        <el-pagination
                class="text-center"
                layout="prev, pager, next"
                :total="total"
                :page-size="per_page"
                :current-page="current_page"
                @current-change="handleCurrentChange"
        >
        </el-pagination>
    </div>
</template>

<script>
    export default {
        name: 'offer-group-list',
        data() {
            return {
                isLoading: false,
                offerGroups: [],
                total: 0,
                per_page: 4,
                current_page: 1
            }
        },
        methods: {
            checkbox(scope) {
                return scope.row.status == 1;
            },
            changeState(scope) {
                // scope.row.isActive = !scope.row.isActive
                // TODO update status in database
                scope.row.status = scope.row.status == 1 ? 0 : 1;
            },
            fetchData(page = '1') {
                this.isLoading = true;
                axios.get('/api/groups' + '?page=' + page).then((response) => {
                    this.offerGroups = response.data.data;
                    this.total = response.data.total;
                    this.isLoading = false;
                }).catch((err) => {
                    this.$notify.error({
                        title: 'Error',
                        message: error.response.data.message
                    })
                });
            },
            showDeleteConfirm(index, val) {
                this.$refs[`popover${index}`].doClose();
                this.$confirm(`This will permanently delete ${val.name} group. Continue?`, 'Warning', {
                    confirmButtonText: 'Delete',
                    cancelButtonText: 'Cancel',
                    type: 'warning'
                }).then(() => {
                    this.handleDelete(index, val);
                }).catch(() => {
                    this.$notify.info({
                        title: 'Info',
                        message: 'Delete canceled'
                    });
                });
            },
            handleDelete(index, val) {
                this.isLoading = true;
                this.showDialog = false;
                axios.delete(`/api/groups/${val.id}`).then((response) => {
                    this.offerGroups.splice(index, 1);
                    this.$notify.success({
                        title: 'Success',
                        message: 'Delete success'
                    });
                    this.updateTable('delete');
                    this.isLoading = false;
                }).catch((error) => {
                    this.$notify.error({
                        title: 'Error',
                        message: error
                    });
                    this.isLoading = false;
                });
            },
            handleCurrentChange(val) {
                this.current_page = val;
                this.fetchData(val);
            },
            updateTable(action) {
                if (action === 'delete') {
                    this.total -= 1;
                    let maxPage = Math.ceil(this.total / this.per_page);
                    if (this.current_page > maxPage) {
                        this.current_page -= 1;
                        this.handleCurrentChange(this.current_page);
                    }
                } else if (action === 'duplicate') {
                    this.total += 1;
                    let maxPage = Math.ceil(this.total / this.per_page);
                    this.handleCurrentChange(maxPage);
                }
            },
            handleEdit(object) {
                this.$root.$emit("openUpdateGroup", object);
            },
            creatGroup() {
                this.$emit("createGroup", true);
            }
        },
        mounted() {
            this.fetchData();
            this.$parent.$parent.$parent.$on('newGroup', function (groupName) {
                axios.post('/api/groups', {name: groupName}).then((response) => {
                    this.$notify.success({
                        title: 'Success',
                        message: response.data.message
                    });
                }).catch((err) => {
                    this.$notify.error({
                        title: 'Error',
                        message: err.response.data.message
                    })
                })
            });
        }
    }
</script>

<style lang="scss" scoped>
</style>
