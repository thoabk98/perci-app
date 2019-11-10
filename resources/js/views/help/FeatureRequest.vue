<template>
	<div class="main-container">
		<section class="content-header">
			<el-row :gutter="10">
				<el-col :lg="10">
					<h2 class="title">Feature Request</h2>
				</el-col>
				<hr />
			</el-row>
		</section>
		<section class="content">
			<el-row :gutter="10" class="feature-box">
				<el-col :lg="12" class="feature-col">
					<h3>Suggest a feature</h3>
					<p class="small-text">
						What do you want to see in the app?
					</p>
					<el-form :model="form" :rules="rules" ref="form">
						<el-form-item prop="title">
							<div class="input-wrapper">
								<span class="input-title">Title</span>
								<el-input
									placeholder="LIMITED TIME OFFER!"
									v-model="form.title"
								></el-input>
							</div>
						</el-form-item>

						<el-form-item prop="description">
							<div class="input-wrapper">
								<span class="input-title">Description</span>
								<el-input
									class="des-input"
									type="textarea"
									placeholder="Add these items and save"
									v-model="form.description"
								>
								</el-input>
							</div>
						</el-form-item>
					</el-form>
					<el-button
						type="primary"
						id="send-button"
						@click="onSubmit('form')"
					>
						Send message
					</el-button>
				</el-col>
			</el-row>
		</section>
	</div>
</template>
<style lang="scss" scoped>
.main-container {
	padding: 2rem;
	h2 {
		padding-left: 1em;
		color: #000;
		padding-bottom: 1rem;
	}
	h3 {
		margin-top: -20px;
		color: #000;
		padding-bottom: 20px;
	}
	hr {
		border: 0;
		clear: both;
		display: block;
		width: 93%;
		background-color: #00000036;
		height: 1px;
	}
	.feature-box {
		margin-left: 30px !important;
		height: 600px;
		width: 944px;
		border-radius: 4px;
		background-color: #ffffff;
		text-align: left;
		color: #000;
		padding-left: 20px;
		padding-top: 40px;
		box-sizing: border-box;
		box-shadow: 0 2px 4px rgba(0, 0, 0, 0.12), 0 0 6px rgba(0, 0, 0, 0.04);
		.feature-col {
			padding-left: 24px !important;
			.small-text {
				margin-top: -15px;

				font-weight: 100;
			}
			.input-wrapper {
				position: relative;
				.input-title {
					position: absolute;
					background-color: #fff;
					z-index: 1;
					padding: 0 10px;
					left: 20px;
					top: -5px;
				}
				.el-input {
					padding-top: 1.5rem;
					padding-bottom: 0.5rem;
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
					padding-bottom: 0.5rem;
					& /deep/ .el-textarea__inner {
						border-radius: 6px;
						border-color: #000;
						padding: 1.5rem 15px 1rem;
						font-size: 16px;
						min-height: 120px !important;
					}
				}
			}
			.el-button--primary {
				margin-top: 1.5rem;
				float: right;
				font-weight: bold;
				width: 180px;
			}
		}
	}
}
</style>
<script>
export default {
	data() {
		return {
			form: {
				title: "",
				description: ""
			},
			rules: {
				title: [
					{
						required: true,
						message: "Please input title",
						trigger: "blur"
					}
				],
				description: [
					{
						required: true,
						message: "Please input description",
						trigger: "blur"
					}
				]
			}
		};
	},
	methods: {
		onSubmit(formName) {
			this.$refs[formName].validate(valid => {
				if (valid) {
					axios
						.post("/ult-upsell/feature-request", {
							title: this.form.title,
							description: this.form.description
						})
						.then(response => {
							console.log(response);
							if (response.data.success == true) {
								this.$message({
									showClose: true,
									message: response.data.msg,
									type: "success"
								});
							} else {
								this.$message({
									showClose: true,
									message: response.data.msg,
									type: "warning"
								});
							}
						})
						.catch(error => {
							console.log(error);
							this.$message({
								showClose: true,
								message: error.response.data.message,
								type: "warning"
							});
						});
				} else {
					console.log("error submit!!");
					return false;
				}
			});
			/*axios
				.post("/ult-upsell/help-center", {
					email: this.form.email,
					title: this.form.title,
					question: this.form.question
				})
				.then(response => {
					console.log(response);
					if (response.data.success == true) {
						this.$message({
							showClose: true,
							message: response.data.msg,
							type: "success"
						});
					} else {
						this.$message({
							showClose: true,
							message: response.data.msg,
							type: "warning"
						});
					}
				})
				.catch(error => {
					console.log(error);
					this.$message({
						showClose: true,
						message: error.response.data.message,
						type: "warning"
					});
				});*/
		}
	}
};
</script>
