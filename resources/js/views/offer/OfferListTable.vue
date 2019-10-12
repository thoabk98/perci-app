<template>
	<div>
		<el-table
			:data="offers"
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
					trigger="click">
						<el-link>
							<strong>Edit</strong>
						</el-link>
						<br>
						<el-link>
							<strong>Delete</strong>
						</el-link>
						<el-button
						size="mini"
						@click="handleEdit(scope.$index, scope.row)"
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
			:total="1000">
		</el-pagination>
	</div>
</template>

<script>
	export default {
		name: 'offer-list-table',
		props: {
			offers: {
				type: Array
			}
		}
    }
</script>
