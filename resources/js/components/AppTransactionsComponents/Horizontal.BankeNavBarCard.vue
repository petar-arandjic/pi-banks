<template>
    <div class="card">
        <button class="card-button"
        :style="{ backgroundColor: validate_color(Bank.bg_color), color: validate_color(Bank.font_color), borderColor: validate_color(Bank.bg_color)}"
        :class="{ 'card-button-active': Bank.show }"
        @click="select_bank(Index)"
        >
            {{Bank.name}}
        </button>
    </div>
</template>

<script>
export default {
    props: {
       Bank: Object,
       Index: Number,
       Add_selected_bank: Function
    },
    data(){
        return {
        }
    },
    methods:{
        //Add prefix to color code || make color readable by css
        validate_color(color){
            return "#" + color
        },
        //Run functions that add bank info to screen and change style of bank card
        select_bank(){
            //check if we already added this bank to selected_bank array
            if (!this.Bank.show) {
                //check if array is full if not adds bank to array and return true
                let is_array_full = this.Add_selected_bank(this.Index);
                //if true change style of bank card
                if (is_array_full) {
                    //change bank show property to true
                    this.Bank.show = true;
                }
            }
        }
    },
    watch: {
        CurrentQuestion: {
            immediate: true,
            handler() {
                this.bank = this.CurrentBank
                //console.log(this.bank)mk
            }
        }
    },
    /*
    created: function () {
        let a = this.CurrentBank
        console.log(a);
    }
    */
}
</script>

<style lang="scss" scoped>
    .card{
        position: relative;
        width: 100%;
        height: 8%;
        margin-bottom: 5px;

    }
    .card-button{
        box-sizing: border-box;
        border: 5px solid;

        font-family: Arial, Helvetica, sans-serif;
        font-weight: 600;
        font-size: 1vw;

        position: absolute;
        width: 100%;
        height: 100%;


        -webkit-transition: opacity 0.2s ease-in-out;
        -moz-transition: opacity 0.2s ease-in-out;
        -ms-transition: opacity 0.2s ease-in-out;
        -o-transition: opacity 0.2s ease-in-out;
        transition: opacity 0.2s ease-in-out;
    }
    .card-button:hover{
        filter: alpha(opacity=50);
        opacity: 0.8;
    }
    .card-button-active{
        -webkit-transition: background-color 0.2s ease-out;
        -moz-transition: background-color 0.2s ease-out;
        -o-transition: background-color 0.2s ease-out;
        transition: background-color 0.2s ease-out;

        background: white !important;
        color: black !important;

    }
</style>
