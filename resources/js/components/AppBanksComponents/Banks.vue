<template>
    <div class="bank_container">
        <div class="bank_cells border">
            <bank-cell
                v-for="(bank, index) in banks.data"
                :key="bank.id"
                :index="index"
                :bank="bank"
                :selected_bank="selected_bank"
            ></bank-cell>
        </div>
        <div class="bank_info border">
            <bank-info
                v-if="bank_loaded"
                :bank="banks.data[active_bank_cell]"
                :currencies="currencies"
            ></bank-info>
        </div>
    </div>
</template>

<script>
export default {
    data(){
        return {
            // When this obj is true bank-info component load
            bank_loaded: false,
            banks: Object,
            active_bank_cell: 0,
            currencies: null
        }
    },
    methods:{
        selected_bank(id){
            //console.log(id)
            //console.log(this.banks.data[id])
            this.active_bank_cell = id
        }
    },
    created: function () {
        fetch('http://localhost/pi-banks/public/api/banks')
        .then((response) => {
            return response.json();
        })
        .then((response) => {
            this.banks = response;
            this.bank_loaded = true;

            return fetch('http://localhost/pi-banks/public/api/currencies')
        })
        .then((response) => {
            return response.json();
        })
        .then((response) => {
            this.currencies = response;
        })
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
