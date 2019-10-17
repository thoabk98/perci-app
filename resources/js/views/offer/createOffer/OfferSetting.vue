<template>
	<div class="settings">
		<section class="content-header">
			<div class="row">
				<div class="col col-lg-6">
					<h1 class="title">Offer Settings</h1>
				</div>
			</div>
		</section>
		<section class="content">
			<h4>How is offer shown to each customer?</h4>
			<el-radio-group v-model="radio">
				<el-radio :label="3">Only one offer per customer</el-radio>
				<br />
				<el-radio :label="6"
					>Show multiple offers, but not the same twice</el-radio
				>
				<br />
				<el-radio :label="9"
					>Show the offer everytime, whether they have seen it or
					not</el-radio
				>
			</el-radio-group>
			<h4>Frequency</h4>
			<el-radio-group v-model="radio">
				<el-radio :label="6" :disabled="radio != 6">
					Only show an offer to the same customer every
					<el-input
						id="input-time"
						v-model="input"
						:disabled="radio != 6"
					></el-input>
					<el-select
						id="select-time"
						v-model="value"
						placeholder="Select"
						:disabled="radio != 6"
					>
						<el-option
							v-for="item in options"
							:key="item.value"
							:label="item.label"
							:value="item.value"
						></el-option>
					</el-select>
				</el-radio>
			</el-radio-group>
		</section>
	</div>
</template>
<style>
.el-input {
	width: auto;
}
h4 {
	font-size: 16px;
	font-style: normal;
	font-weight: 700;
	line-height: 24px;
}
.el-radio__label {
	font-size: 14px;
	font-weight: 500;
	line-height: 21px;
	font-style: normal;
}
#search-bar {
	width: 450px;
	height: 40px;
	font-style: normal;
	font-weight: normal;
	font-size: 14px;
	line-height: 21px;
	border-radius: 10px;
}
#input-time {
	border-radius: 10px 0px 0px 10px;
	width: 50px;
	/* Para/ Body 3 _ 14 Light */

	font-style: normal;
	font-weight: 500;
	font-size: 14px;
	line-height: 21px;
	height: 28.05px;
}
#select-time {
	border-radius: 0px 10px 10px 0px;
	font-style: normal;
	font-weight: 700;
	font-size: 14px;
	line-height: 21px;
	margin-left: -5px;
	width: 100px;
	height: 28.05px;
}
.title {
	width: 400px;
	display: inline-block !important;
	text-align: left;
	font-style: normal;
	font-weight: 800;
	font-size: 25px;
	line-height: 37px;
	margin-top: 0px;
	margin: 0px;
	height: 40px;
}
.content {
	margin-top: 43px;
}
.settings {
	margin-left: 40px;
}
</style>
<script>
export default {
	data() {
		return {
			radio: 3,
			radio2: 0,
			options: [
				{
					value: "minute",
					label: "minute"
				},
				{
					value: "hour",
					label: "hour"
				}
			],
			value: "minute",
			input: 10,
			input2: ""
		};
	}
};
</script>
