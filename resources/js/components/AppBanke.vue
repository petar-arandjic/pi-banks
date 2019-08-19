<template>
    <div>
        <div id="nav_bar_place"></div>
        <div id="horizontal_bank_nav_bar">
            <hb-NB-Crad v-for="bank in banks"
            :CurrentBank="bank"
            :select_bank='select_bank'
            />
        </div>
    </div>
</template>

<script>

export default {
    name: 'App-Banks',
    data(){
        return {
            //all banks
            banks: [],
            //banks selected to be seen
            selected_banks: []
        }
    },
    methods:{
        select_bank(id){
            this.selected_banks.push(this.banks[id])
            console.log(this.selected_banks)
        }
    },
    //get bank data from server
    created: function () {
        fetch('http://localhost/Cargo_Banke/public/api/banks')
        .then(function(response) {
            return response.json();
        })
        .then((response) => {
            //save data to banks
            //console.log(JSON.parse(response));
            //console.log(response.data);
            this.banks = response.data;
        });
    }
}
</script>

<style lang="scss">
    button, input[type="submit"], input[type="reset"] {
	background: none;
	color: inherit;
	border: none;
	padding: 0;
	font: inherit;
	cursor: pointer;
	outline: inherit;
    }

    #nav_bar_place{
        position: absolute;
        width: 100%;
        height: 7%;
        top: 0px;
        background: lightgray;
    }
    #horizontal_bank_nav_bar{
        position: absolute;

        left: 5px;

        top: -webkit-calc(7% + 5px);
        top:    -moz-calc(7% + 5px);
        top:         calc(7% + 5px);

        width: -webkit-calc(10% - 5px);
        width:    -moz-calc(10% - 5px);
        width:         calc(10% - 5px);

        height: -webkit-calc(93% - 10px);
        height:    -moz-calc(93% - 10px);
        height:         calc(93% - 10px);

        color: white;
    }
</style>


