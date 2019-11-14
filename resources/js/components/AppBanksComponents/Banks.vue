<template>
    <div class="bank_container">
        <div class="bank_cells border">
            <bank-cell
                v-for="(bank, index) in banks.data"
                :key="bank.id"
                :index="index"
                :bank="bank"
            ></bank-cell>
        </div>
        <div class="bank_info border">

        </div>
    </div>
</template>

<script>
export default {
    data(){
        return {
            banks: Object,
            active_bank_cell: 0
        }
    },
    methods:{
        info(){
            console.log('hello')
        }
    },
    created: function () {
        fetch('http://localhost/Cargo_Banke/public/api/banks')
        .then(function(response) {
            return response.json();
        })
        .then((response) => {
            this.banks = response;
        });
    }
}
</script>

<style lang="scss" scoped>
    .bank_container{
        position: absolute;
        bottom: 0px;
        width: 100%;
        height: 93%;
    }
    .bank_cells{
        position: absolute;
        top: 5px;
        left: 5px;

        width: -webkit-calc(20% - 5px);
        width:    -moz-calc(20% - 5px);
        width:         calc(20% - 5px);

        height: -webkit-calc(100% - 10px);
        height:    -moz-calc(100% - 10px);
        height:         calc(100% - 10px);
    }
    .bank_info{
        position: absolute;
        top: 5px;
        right: 5px;

        width: -webkit-calc(80% - 10px);
        width:    -moz-calc(80% - 10px);
        width:         calc(80% - 10px);

        height: -webkit-calc(100% - 10px);
        height:    -moz-calc(100% - 10px);
        height:         calc(100% - 10px);
    }
</style>
