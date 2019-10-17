<template>
    <div>
        <el-tabs class="create-offer-tabs" v-model="step.toString()">
            <el-tab-pane name="0">
                <OfferForm :step="step" @nextStep='next'></OfferForm>
            </el-tab-pane>
            <el-tab-pane name="1">
                <TriggerLocation :step="step" @nextStep='next'></TriggerLocation>
            </el-tab-pane>
            <el-tab-pane name="2">
                <OfferCreate></OfferCreate>
            </el-tab-pane>
        </el-tabs>

    </div>
</template>

<script>
import OfferForm from './OfferForm.vue';
import TriggerLocation from './TriggerLocation.vue';
import OfferCreate from './OfferCreate.vue';

export default {
    data() {
        return {
            step: 0
        };
    },
    components: {
		OfferForm,
        TriggerLocation,
        OfferCreate
	},
    methods: {
        next(step) {
            this.step = step;
        },
    }
}
</script>

<style lang="scss">
.main-container {
    padding: 3rem;
    h2 {
        padding-bottom: 4.5rem;
        color: #000;
    }
    .content-header {
        .el-breadcrumb {
            display: inline-block;
            padding-top: 1rem;
            font-size: 16px;
        }
    }
}
.create-offer-tabs {
    .el-tabs__header {
        display: none;
    }

    .create-offer-step {
        .el-breadcrumb__inner {
            cursor: pointer !important;
        }
    }
}
</style>
