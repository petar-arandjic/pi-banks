<template>
    <div>
        <div class="bi-b_container pl-5 pt-4">
            <b-row class="m-0 mb-5">
                <h3>{{ bank.name }}</h3>
            </b-row>
            <b-row class="m-0 mt-4 ml-5">
                <b-col>
                    <h5>Početno stanje:</h5>
                    <p>{{ bank.starting_balance.toFixed(2) }}</p>
                </b-col>
                <b-col></b-col>
                <b-col></b-col>
            </b-row>
        </div>
        <account-table
        :bank_id="bank.id"
        ></account-table>
    </div>
</template>

<script>
export default {
    props: {
        bank: Object
    }
}
</script>

<style lang="scss" scoped>
    .bi-b_container{
        position: absolute;
        top: 0px;
        left: 0px;
        width: 100%;
        height: 45%;
    }
</style>
