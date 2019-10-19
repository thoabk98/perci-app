<template>
    <div class="card">
        <img :src="data.image" class="card-img-top" alt="card-img" />
        <div class="card-body">
            <el-button
                :type="data.btnType"
                icon="el-icon-files"
                :id="data.id"
                class="card-btn"
				@click="next"
                >{{data.btnValue}}</el-button>
        </div>
        <div class="card-footer">
            <p class="card-text">{{data.description}}</p>
        </div>
    </div>
</template>
<script>
    export default {
    	props: ["data", "step", "offer"],
		methods: {
			next() {
				if (this.step++ > 2) this.step = 2;
				this.offer.position = this.data.positionId;
				this.$emit("nextStep", this.step, this.offer);
            }
		}
    };
</script>
<style scoped>
    .card {
		width: 282px;
		height: 135.82px;
		text-align: center;
		margin: 0 auto;
    }
    .card-img-top {
		width: 282px;
		height: 135.82px;
		border-radius: 20px;
		margin-bottom: 8px;
		box-shadow: 3px 3px 1px #ccc;
    }
    .div.card p {
		font-style: normal;
		font-weight: 300;
		font-size: 11px;
		display: flex;
		align-items: center;
		text-align: center;
    }
    .card-btn {
		min-width: 282px;
		border-radius: 8px;
    }
</style>
