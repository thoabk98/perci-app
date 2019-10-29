<template>
	<div class="main-container">
		<section class="content-header">
			<el-row :gutter="10">
				<el-col :lg="10">
					<h2 class="title">Frequently Asked Questions</h2>
				</el-col>
				<hr />
			</el-row>
		</section>
		<section class="content">
			<el-row :gutter="10" class="top-row">
				<el-col :md="7">
					<el-button @click="show = 1" plain
						>Installations & Getting Started</el-button
					><br />
					<el-button @click="show = 2" plain
						>Pricing & Trial</el-button
					><br />
					<el-button @click="show = 3" plain>Highlights</el-button
					><br />
					<el-button @click="show = 4" plain>Others</el-button>
				</el-col>
				<el-col :md="5">
					<div class="help-box">
						<transition name="el-fade-in" mode="out-in">
							<div
								v-if="show == 1"
								class="transition-box"
								key="install"
							>
								<h3>Installation & Getting Started</h3>
								<el-collapse v-model="activeName1" accordion>
									<el-collapse-item name="1">
										<template slot="title">
											<p class="collapse-title">
												Does Peasi Ultimate Upsell work
												with my Theme?
											</p>
										</template>
										<div>
											Yes, Peasi Ultimate Upsell works
											with any BigCommerce themes. You're
											free to change themes as often as
											you like, our app will work with
											them.
										</div>
									</el-collapse-item>
									<el-collapse-item name="2">
										<template slot="title">
											<p class="collapse-title">
												Where will i start to create new
												Offer?
											</p>
										</template>
										<div>
											From the dashboard, you can choose
											which type of Offer you want to
											create (upsell basic, cross-sell
											basic, upsell with boost, cross-sell
											with boost) etc.. We have the
											storage of tutorial videos for you
											to get started with Peasi Ultimate
											Upsell and how to manage and
											optimize the offers effectively.
										</div>
									</el-collapse-item>
								</el-collapse>
							</div>
							<div
								v-if="show == 2"
								class="transition-box"
								key="price"
							>
								<h3>Pricing</h3>
								<el-collapse v-model="activeName2" accordion>
									<el-collapse-item name="1">
										<template slot="title">
											<p class="collapse-title">
												Can i try it before purchase?
											</p>
										</template>
										<div>
											Yes, we’re providing you 500
											impressions through the free plan.
											After it ends, if you may want more
											time to try Peasi Ultimate Upsell,
											our supporters would be happy to
											extend the the impressions for you.
										</div>
									</el-collapse-item>
									<el-collapse-item name="2">
										<template slot="title">
											<p class="collapse-title">
												Can i change my current plan?
											</p>
										</template>
										<div>
											Yes. From the box at the top right
											corner of the Dashboard, when you
											click on it, you will see button
											“Change Plan”
										</div>
									</el-collapse-item>
								</el-collapse>
							</div>
							<div
								v-if="show == 3"
								class="transition-box"
								key="highlights"
							>
								<h3>Highlight Benefits/Why Peasi</h3>
								<el-collapse v-model="activeName3" accordion>
									<el-collapse-item name="1">
										<template slot="title">
											<p class="collapse-title">
												How many offers (basic/with
												boost) can i create using Peasi
												Ultimate Upsell?
											</p>
										</template>
										<div>
											You can create multiple types of
											offers (upsell basic, cross-sell
											basic, upsell with boost, cross-sell
											with boost), in any trigger you want
											(add to cart, before checkout, and
											also AFTER CHECKOUT will be
											available ASAP). The number of
											offers you can create with Peasi
											Ultimate Upsell is unlimited!
										</div>
									</el-collapse-item>
									<el-collapse-item name="2">
										<template slot="title">
											<p class="collapse-title">
												How about customer support while
												I'm creating offers with Peasi
												Ultimate Upsell?
											</p>
										</template>
										<div>
											We’re in GTM+8 so we’d glad to
											assist you from Monday - Saturday,
											from 8:00 am (GMT+7) to 6:00 pm
											(GMT+7). Should you need any further
											information, please feel free to
											reach us via live chat
										</div>
									</el-collapse-item>
								</el-collapse>
							</div>
							<div
								v-if="show == 4"
								class="transition-box"
								key="others"
							>
								<h3>Others</h3>
								<el-collapse v-model="activeName4" accordion>
									<el-collapse-item name="1">
										<template slot="title">
											<p class="collapse-title">
												If i work as a Freelancer /
												Agency?
											</p>
										</template>
										<div>
											We're providing a white-label
											package for our agencies that you
											can purchase through Paypal. For
											Agency Plan, we will discount 20%
											when you buy Peasi Ultimate Upsell
											in a year for multiple stores. The
											total price can be counted as
											follow: Total = 19$/month x number
											of your store x 12 (months) x 0.8 (
											discount 20%)
										</div>
									</el-collapse-item>
								</el-collapse>
							</div>
						</transition>
					</div>
				</el-col>
			</el-row>
			<el-row :gutter="10" class="bottom-row">
				<p>Need help? Send a message</p>
				<el-button
					type="primary"
					id="send-button"
					@click="dialogFormVisible = true"
					>Send message</el-button
				>
				<el-dialog :visible.sync="dialogFormVisible">
					<span slot="title">
						<h3 class="dialog-title">Ask us anything</h3>
					</span>
					<el-form :model="form" :rules="rules" ref="form">
						<el-form-item prop="email">
							<p class="form-dialog-label">Your Email</p>
							<!--<span slot="label">
								<p class="form-dialog-label">Your Email</p>
							</span> -->
							<el-input
								type="text"
								v-model="form.email"
							></el-input>
						</el-form-item>
						<el-form-item prop="title">
							<p class="form-dialog-label">Title</p>
							<el-input
								v-model="form.title"
								autocomplete="off"
								type="text"
							></el-input>
						</el-form-item>
						<el-form-item prop="question">
							<p class="form-dialog-label">Question</p>
							<el-input
								v-model="form.question"
								autocomplete="off"
								type="textarea"
								:autosize="{ minRows: 3, maxRows: 5 }"
							></el-input>
						</el-form-item>
					</el-form>
					<span slot="footer" class="dialog-footer">
						<el-button
							class="cancel-button"
							@click="dialogFormVisible = false"
							>Cancel</el-button
						>
						<el-button type="primary" @click="onSubmit('form')"
							>Send</el-button
						>
					</span>
				</el-dialog>
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
		padding-left: 24px;
	}
	br {
		display: block; /* makes it have a width */
		content: ""; /* clears default height */
		margin-top: 3px; /* change this to whatever height you want it */
	}
	hr {
		border: 0;
		clear: both;
		display: block;
		width: 93%;
		background-color: #00000036;
		height: 1px;
	}
	.top-row {
		height: 300px;

		.el-button.is-plain {
			margin-left: 28px;
			width: 250px;
			text-align: left;
		}
		.el-button.is-plain:focus,
		.el-button.is-plain:hover {
			box-shadow: 0 2px 4px rgba(0, 0, 0, 0.12),
				0 0 6px rgba(0, 0, 0, 0.04);
			font-weight: bold;
			border-color: #ffffff;
		}
		.help-box {
			width: 682px;
			.transition-box {
				margin-bottom: 10px;
				border-radius: 4px;
				width: 100%;
				background-color: #ffffff;
				text-align: left;
				color: #000;
				padding: 40px 20px;
				box-sizing: border-box;
				margin-left: -15px;
				box-shadow: 0 2px 4px rgba(0, 0, 0, 0.12),
					0 0 6px rgba(0, 0, 0, 0.04);
				.el-collapse {
					padding-left: 24px;
					.collapse-title {
						color: #0e3c82;
					}
				}
			}
		}
	}
	.bottom-row {
		text-align: center;
		margin-top: 100px;
		position: relative;

		.el-button--primary {
			font-weight: bold;
			width: 180px;
		}
		#send-button {
			margin-bottom: 100px;
		}
		.cancel-button {
			width: 180px;
		}
		.dialog-title {
			text-align: left !important;
			margin-top: 0px;
			margin-bottom: -40px;
			padding-left: 0px;
		}
		.form-dialog-label {
			text-align: left;
			font-weight: 500;
			margin-bottom: -10px;
		}
	}
}
</style>
<script>
export default {
	data() {
		return {
			show: 1,
			activeName1: "",
			activeName2: "",
			activeName3: "",
			activeName4: "",
			dialogFormVisible: false,
			form: {
				email: "",
				title: "",
				question: ""
			},
			rules: {
				email: [
					{
						required: true,
						message: "Please input your email",
						trigger: "blur"
					},
					{
						type: "email",
						message: "Please input correct email address format",
						trigger: ["blur", "change"]
					}
				],
				title: [
					{
						required: true,
						message: "Please input title",
						trigger: "blur"
					}
				],
				question: [
					{
						required: true,
						message: "Please input question",
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
					alert("submit!");
					axios
						.post("/ult-upsell/help-center", {
							email: this.form.email,
							title: this.form.title,
							question: this.form.question
						})
						.catch(error => {
							console.log(error);
						});
					this.dialogFormVisible = false;
				} else {
					console.log("error submit!!");
					return false;
				}
			});
			/*axios
				.post("/ult-upsell/mail", {
					email: this.form.email,
					title: this.form.title,
					question: this.form.question
				})
				.catch(error => {
					console.log(error);
				});
			this.dialogFormVisible = false;*/
		}
	}
};
</script>
