<template>
    <div class="card">
        <button class="card-button"
        :style="{ backgroundColor: validate_color(bank.bg_color), color: validate_color(bank.font_color), borderColor: validate_color(bank.bg_color)}"
        @click="select_bank(bank.id)"
        >
            {{bank.name}}
        </button>
    </div>
</template>

<script>
export default {
    props: {
       CurrentBank: Object,
       select_bank: Function
    },
    data(){
        return {
            bank: null
        }
    },
    methods:{
        validate_color(color){
            return "#" + color
        }
    },
    watch: {
        CurrentQuestion: {
            immediate: true,
            handler() {
                this.bank = this.CurrentBank
                //console.log(this.bank)
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
        border-radius: 2px;

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
        background: white;
        color: black;
    }
</style>
