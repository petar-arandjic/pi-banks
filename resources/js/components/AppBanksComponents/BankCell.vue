<template>
    <b-row class="m-0 pt-1 pb-1 pl-3 border-bottom" @click="bc_info('hello')">
        <b-col class="bc-container p-3">1 of 1</b-col>
    </b-row>
</template>

<script>
export default {
    props: {
        bank: Object,
        index: Number
    },
    methods:{
        bc_info(val){
            console.log(val)
        }
    }
}
</script>

<style lang="scss" scoped>

</style>
