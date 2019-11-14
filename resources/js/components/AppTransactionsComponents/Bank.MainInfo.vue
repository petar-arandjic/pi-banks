<template>
    <div class="global">
        <b-container fluid class="p-0">
            <b-row>
            <b-card
                bg-variant="light"
                header="Statistika svih računa"
                class="text-center mt-2 mr-4 ml-2 w-100"
                no-body
            >
                <b-row class="pl-2 pr-2 pt-2 pb-2">
                    <b-col class="text-left">Ukupni prilivi:</b-col>
                    <b-col class="text-right">{{ Stats.income }}</b-col>
                </b-row>
                <b-row class="pl-2 pr-2 pt-2 pb-2">
                    <b-col class="text-left">Ukupni odlivi:</b-col>
                    <b-col class="text-right">{{ Stats.expenses }}</b-col>
                </b-row>
                <b-row class="pl-2 pr-2 pt-2 pb-2">
                    <b-col class="text-left">Početno stanje:</b-col>
                    <b-col class="text-right">{{ Stats.starting_balance }}</b-col>
                </b-row>
                <b-row class="pl-2 pr-2 pt-2 pb-2">
                    <b-col class="text-left">Dozvoljeni minus:</b-col>
                    <b-col class="text-right">{{ Stats.allowed_overdraft }}</b-col>
                </b-row>
                <b-row class="pl-2 pr-2 pt-2 pb-2">
                    <b-col class="text-left">Stanje računa:</b-col>
                    <b-col class="text-right">{{ Stats.balance }}</b-col>
                </b-row>
                <b-row class="pl-2 pr-2 pt-2 pb-2">
                    <b-col class="text-left">Raspoloživa Srestva:</b-col>
                    <b-col class="text-right">{{ Stats.available_funds }}</b-col>
                </b-row>
            </b-card>
        </b-row>
        </b-container>
        <div class="db-newTransaction">
            <div class="row">
                <button type="button" class="btn btn-danger w-100 m-2 mr-4"><strong><a class="bank_link" href="transaction/create">Dodaj novu transakciju</a></strong></button>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    props:{
        Stats: Object,
    },
    methods:{
        test(){
            //console.log(this.Stats);
        }
    }
}
</script>


<style lang="scss">
    .global{
        font-family: "Trebuchet MS", Arial, Helvetica, sans-serif;
    }
    .db-newTransaction{
        position: absolute;
        bottom: 0px;
        left: 0px;
        right: 0px;
    }
    .b-newTransaction{
        position: absolute;
        width: 100%;
        height: 100%;
        background: #E53935;
        color: white;
        font-weight: bold;
        font-size: 1vw;
    }
    .b-newTransaction:hover{
        opacity: 0.9;
    }
    .b-newTransaction:active{
        opacity: 0.8;
    }
    .mi-balance{
        position: relative;
        text-align: center;
        margin: 10px;
    }
</style>
