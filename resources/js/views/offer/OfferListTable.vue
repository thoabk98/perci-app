<template>
	<div>
		<el-table
			:data="offers"
			v-loading.body="isLoading"
			style="width: 100%"
			column-gap="40px">
			<el-table-column
				min-width="150"
				label="Name"
				prop="name"
				className="offer-name">
			</el-table-column>
			<el-table-column
				min-width="100"
				prop="group_name"
				className="text-secondary">
			</el-table-column>
			<el-table-column
				prop="date"
				min-width="70"
				column-key="date"
				className="text-secondary">
			</el-table-column>
			<el-table-column
				label="CVS RATE"
				prop="cvs_rate"
				min-width="50">
			</el-table-column>
			<el-table-column
				label="AOV"
				prop="aov"
				min-width="50">
			</el-table-column>
			<el-table-column
				label="Views"
				prop="views"
				min-width="50">
			</el-table-column>
			<el-table-column
				align="right"
				min-width="70">
				<template slot-scope="scope">
					<el-popover
					placement="bottom-end"
					trigger="click"
          :ref="'popover'+scope.$index">
						<el-link @click="handleEdit(scope.$index, scope.row)">
							<strong>Edit</strong>
						</el-link>
						<br>
            <el-link @click="showDuplicateConfirm(scope.$index, scope.row)">
							<strong>Duplicate</strong>
						</el-link>
            <br>
						<el-link @click="showDeleteConfirm(scope.$index, scope.row)">
							<strong>Delete</strong>
						</el-link>
						<el-button
						size="mini"
						slot="reference">
							Action &#x25BC;
						</el-button>
					</el-popover>
				</template>
			</el-table-column>
		</el-table>
		<br>
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
		name: 'offer-list-table',
		data() {
			return {
        offers: [],
        total: 0,
				per_page: 4,
				current_page: 1,
        offersPage: [],
				isLoading: false
			}
		},
		methods: {
			handleCurrentChange(val) {
				this.current_page = val;
				this.fetchData(val);
			},
			fetchData(page='1') {
				this.isLoading = true;
				axios.get('/api/offers' + '?page=' + page).then((response) => {
          this.offers = response.data.data.data;
					this.total = response.data.pageInfo.total;
          this.isLoading = false;
				});
      },
      showDeleteConfirm(index, val) {
        this.$refs[`popover${index}`].doClose();
        this.$confirm(`This will permanently delete ${val.name} offer. Continue?`, 'Warning', {
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
      showDuplicateConfirm(index, val) {
        this.$refs[`popover${index}`].doClose();
        this.$confirm(`Are you sure to duplicate this ${val.name} offer. Continue?`, 'Warning', {
          confirmButtonText: 'Ok',
          cancelButtonText: 'Cancel',
          type: 'warning'
        }).then(() => {
          this.handleDuplicate(val);
        }).catch(() => {
          this.$notify.info({
            title: 'Info',
            message: 'Duplicate canceled'
          });          
        });
      },
      handleDelete(index, val) {
        this.isLoading = true;
        this.showDialog = false;
        axios.delete(`/api/offers/${val.id}`).then((response) => {
          this.offers.splice(index, 1);
          this.$notify.success({
            title: 'Success',
            message: response.data.message
          });
          this.updateTable('delete');
          this.isLoading = false;
        }).catch(error => {
          this.$notify.error({
            title: 'Error',
            message: error.response.data.message
          });
          this.isLoading = false;
        });
      },
      handleDuplicate(val) {
        this.isLoading = true;
        this.showDialog = false;
        val.name = val.name += ' (B/A Testing)';
        this.$router.push( { name: 'offer.new', params: { baseOffer: val } });
      },
      updateTable(action) {
        if(action === 'delete') {
          this.total -= 1;
          let maxPage = Math.ceil(this.total / this.per_page);
          if(this.current_page > maxPage) {
            this.current_page -= 1;
            this.handleCurrentChange(this.current_page);
          }
        } else if (action === 'duplicate') {
          this.total += 1;
          let maxPage = Math.ceil(this.total / this.per_page);
          console.log('here page', maxPage);
          this.handleCurrentChange(maxPage);
        }
      }
		},
		mounted: function () {
			this.fetchData();
		}
  }
</script>
