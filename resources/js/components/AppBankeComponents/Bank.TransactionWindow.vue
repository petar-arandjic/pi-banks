<template>
    <div class="b-tw"
    :class="class_name"
    >
        <div class="header"
        :style="{ backgroundColor: validateColor(Bank.bg_color)}"
        >
            <div class="all_text">
                <h4>{{Bank.name}}</h4>
            </div>
        </div>
        <div class="container"
        :style="{ backgroundColor: increase_brightness(Bank.bg_color)}"
        >
            <table class="bank">
                <tr>
                    <th>Saradnik</th>
                    <th>Odliv</th>
                    <th>Priliv</th>
                    <th>Datum</th>
                    <th></th>
                </tr>
                <tr v-for="(tran, id) in transactions" :key="id">
                    <td>{{tran.client_id}}</td>
                    <td v-if="tran.type_of_transaction === 2">{{tran.amount}}</td>
                    <td v-else></td>
                    <td v-if="tran.type_of_transaction === 1">{{tran.amount}}</td>
                    <td v-else></td>
                    <td>12.05.2019</td>
                    <td>?</td>
                </tr>
            </table>
        </div>
    </div>
</template>

<script>
export default {
    props:{
        Bank: Object,
        //How many bank are selected
        Bank_amount : Number
    },
    data(){
        return {
            class_name: "",

            transactions: []
        }
    },
    methods:{
        //get brither version of same color
        increase_brightness(hex){
            // strip the leading # if it's there
            hex = hex.replace(/^\s*#|\s*$/g, '');

            // convert 3 char codes --> 6, e.g. `E0F` --> `EE00FF`
            if(hex.length == 3){
                hex = hex.replace(/(.)/g, '$1$1');
            }

            var r = parseInt(hex.substr(0, 2), 16),
                g = parseInt(hex.substr(2, 2), 16),
                b = parseInt(hex.substr(4, 2), 16);

            return '#' +
            ((0|(1<<8) + r + (256 - r) * 90 / 100).toString(16)).substr(1) +
            ((0|(1<<8) + g + (256 - g) * 90 / 100).toString(16)).substr(1) +
            ((0|(1<<8) + b + (256 - b) * 90 / 100).toString(16)).substr(1);
        },
        get_class(){
            switch (this.Bank_amount) {
                case 2:
                    this.class_name = "b-tw2"
                    break;
                case 3:
                    case 4:
                        this.class_name = "b-tw4"
                    break;

                default:
                    this.class_name = "b-tw1"
                    break;
            }
        },
        //Add prefix to color code || make color readable by css
        validateColor(color){
            return "#" + color
        }
    },
    watch:{
        //run get class function every time bank is added or removed from selected bank
        Bank_amount: {
            immediate: true,
            handler() {
                this.get_class()
            }
        }
    },
    created: function () {
        fetch(`http://localhost/Cargo_Banke/public/api/banks/${this.Bank.id}/transactions`)
        .then(function(response){
            return response.json();
        })
        .then((response) => {
            this.transactions = response
        })
    }
}
</script>

<style lang="scss">
    /*-----bank transactions window ------*/
    .b-tw{
        position: absolute;
        width: 200px;
        height: 200px;
        box-sizing: border-box;
        background: white;
        overflow: hidden;

        h4 {
            margin: 0px;
            padding: 0px;

            transition: font-size 0.5s;
        }

        z-index: 1;

        -webkit-animation: fadein 2s; /* Safari, Chrome and Opera > 12.1 */
        -moz-animation: fadein 2s; /* Firefox < 16 */
        -ms-animation: fadein 2s; /* Internet Explorer */
        -o-animation: fadein 2s; /* Opera < 12.1 */
        animation: fadein 2s;

        -webkit-transition: width 0.5s, height 0.5s; /* For Safari 3.1 to 6.0 */
        transition: width 0.5s, height 0.5s;
    }
    @keyframes fadein {
    from { opacity: 0; }
    to   { opacity: 1; }
    }

    /* Firefox < 16 */
    @-moz-keyframes fadein {
        from { opacity: 0; }
        to   { opacity: 1; }
    }

    /* Safari, Chrome and Opera > 12.1 */
    @-webkit-keyframes fadein {
        from { opacity: 0; }
        to   { opacity: 1; }
    }

    /* Internet Explorer */
    @-ms-keyframes fadein {
        from { opacity: 0; }
        to   { opacity: 1; }
    }

    /* Opera < 12.1 */
    @-o-keyframes fadein {
        from { opacity: 0; }
        to   { opacity: 1; }
    }

    .b-tw1{

        height: 100%;
        width: 100%;
        h4 {
            font-size: 1.5vw;
        }
    }
    .b-tw2{
        height: 100%;

        width: -webkit-calc(50% - 2.5px);
        width:    -moz-calc(50% - 2.5px);
        width:         calc(50% - 2.5px);

        h4 {
            font-size: 1.5vw;
        }
    }
    .b-tw2:nth-child(1){
        left: 0px;
        top: 0px;
    }
    .b-tw2:nth-child(2){
        right: 0px;
        top: 0px;
    }
    .b-tw4{
        height: -webkit-calc(50% - 2.5px);
        height:    -moz-calc(50% - 2.5px);
        height:         calc(50% - 2.5px);

        width: -webkit-calc(50% - 2.5px);
        width:    -moz-calc(50% - 2.5px);
        width:         calc(50% - 2.5px);


        h4 {
            font-size: 1vw;
        }
    }
    .b-tw4:nth-child(1){
        left: 0px;
        top: 0px;
    }
    .b-tw4:nth-child(2){
        right: 0px;
        top: 0px;
    }
    .b-tw4:nth-child(3){
        left: 0px;
        bottom: 0px;
    }
    .b-tw4:nth-child(4){
        right: 0px;
        bottom: 0px;
    }
    .header{
        position: absolute;
        top: 0px;
        width: 100%;
        height: 8%;
        color: white;
    }
    .all_text{
        text-align: center;
        position: absolute;
        top: 0px;
        bottom: 0px;
        margin: auto;
        width: 100%;
        height: 55%;
    }
    .container{
        position: absolute;
        top: 8%;
        height: 92%;
        width: 100%;
    }
    .table{
        width: 100%;
    }


    .bank {
        font-family: "Trebuchet MS", Arial, Helvetica, sans-serif;
        border-collapse: collapse;
        width: 100%;
        text-align: center;
    }

    .bank td, .bank th {
        border: 1px solid #ddd;
        padding: 8px;
    }

    .bank tr:nth-child(even){background-color: #f2f2f2;}

    .bank tr:hover {background-color: #ddd;}

    .bank th {
        padding-top: 12px;
        padding-bottom: 12px;
        text-align: center;
        background-color: #4CAF50;
        color: white;
    }
</style>
