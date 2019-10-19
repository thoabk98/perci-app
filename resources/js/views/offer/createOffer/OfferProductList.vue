<template>
    <el-transfer
        filterable
        :filter-method="filterMethod"
        filter-placeholder="State Abbreviations"
        v-model="value"
        :data="data">
    </el-transfer>
</template>

<script>
export default {
    data() {
        const generateData = _ => {
            const data = [];
            const states = ['California', 'Illinois', 'Maryland', 'Texas', 'Florida', 'Colorado', 'Connecticut '];
            states.forEach((city, index) => {
                data.push({
                    label: city,
                    key: index,
                });
            });
            return data;
        };
        return {
            data: generateData(),
            value: [],
            filterMethod(query, item) {
                return item.label.toLowerCase().indexOf(query.toLowerCase()) > -1;
            }
        };
    }
};
</script>
