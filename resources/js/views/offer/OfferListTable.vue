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
          this.offers = this.formatOfferData(response.data.data);
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
      handleDelete(index, val) {
        this.isLoading = true;
        this.showDialog = false;
        axios.delete(`/api/offers/${val.offer_id}`).then((response) => {
          this.offers.splice(index, 1);
          this.$notify.success({
            title: 'Success',
            message: response.data.message
          });
          this.updateTable();
          this.isLoading = false;
        }).catch(error => {
          this.$notify.error({
            title: 'Error',
            message: error.response.data.message
          });
          this.isLoading = false;
        });
      },
      formatOfferData(fetchedOffers) {
        let offerIds = Object.keys(fetchedOffers);
				let offers = Object.values(fetchedOffers);
        let index = 0;
        offers.forEach(function(offer) {
          offer['offer_id'] = offerIds[index];
          offer['visible'] = false;
          index++;
        });

        return offers;
      },
      updateTable() {
        this.total -= 1;
        let maxPage = Math.ceil(this.total / this.per_page);
        if(this.current_page > maxPage) {
          this.current_page -= 1;
          this.handleCurrentChange(this.current_page);
        }
      }
		},
		mounted: function () {
			this.fetchData();
		}
  }
</script>
