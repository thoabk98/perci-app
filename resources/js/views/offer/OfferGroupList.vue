<template>
	<div>
		<div v-if="offerGroups.length > 0">
			<el-table
			:data="offerGroups"
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
						trigger="click">
							<el-link>
								<strong>Edit</strong>
							</el-link>
							<br>
							<el-link>
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
				<img v-bind:src="'/images/Folder.png'" />
				<div class="row">
					<div class="col-md-2">
					</div>
					<div class="col-md-8">
						It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout.
					</div>
				</div>
				<br>
				<div class="row">
					<el-button class="create-new-btn">Create group</el-button>
				</div>
			</div>
			<br>
		</div>
	</div>
</template>

<script>
    export default {
		name: 'offer-group-list',
		props: {
			offerGroups: {
				type: Array
			}
		},
		methods: {
			checkbox(scope) {
				if (scope.row.isActive == null) {
					return false
				}
				return scope.row.isActive;
			},
			changeState(scope) {
				scope.row.isActive = !scope.row.isActive
			}
		}
    }
</script>

<style lang="scss" scoped>
</style>
