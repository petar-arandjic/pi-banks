<template>
    <b-row class="m-0 pt-1 pb-1 pl-3 border-bottom">
        <b-col class="bc-container p-3"
            @click="selected_bank(index)"
        >{{ bank.name }}</b-col>
    </b-row>
</template>

<script>
export default {
    props: {
        bank: Object,
        index: Number,
        selected_bank: Function
    },
    methods:{
        
    }
}
</script>

<style lang="scss" scoped>

</style>
