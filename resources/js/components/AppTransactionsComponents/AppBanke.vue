<template>
    <div>
        <div id="horizontal_bank_nav_bar">
            <hb-NB-Crad v-for="(bank, index) in banks"
            :key="index"
            :Index="index"
            :Bank="bank"
            :Add_selected_bank="add_selected_bank"
            />
            <div class="new_bank_button_par">
                <button type="button" class="bank_button bg-success text-white"><a class="bank_link" href="bank/create">+</a></button>
            </div>
        </div>
        <div id="transactions_screen">
            <bank-Transaction-window class="b-tw" v-for="(bank, index) in selected_banks" :key="index"
            :Bank="bank"
            :index="index"
            :Bank_amount="get_lenght(selected_banks)"
            :remove_selected_bank="remove_selected_bank"
            />
        </div>
        <div id="main_info_window">
            <bank-main-info
            :Stats="bank_stats"
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
            selected_banks: [],
            //
            bank_stats: {},

        }
    },
    methods:{
        get_selected_banks(){
            for (let index = 0; index < this.banks.length; index++) {
                if (this.banks[index].show) {
                    this.selected_banks.push(this.banks[index]);
                }
            }
        },
        //push bank to selected_banks array || this function is run inside Horizontal.Banke.NavCard component
        add_selected_bank(id){
            if (this.selected_banks.length < 4) {
                this.selected_banks.push(this.banks[id])

                return true

            }else{
                alert('You can only have 4 bank windows displayed');
            }
        },
        //remove selected bank from
        remove_selected_bank(id){
            //change bank style
            this.selected_banks[id].show = false;

            this.selected_banks.splice(id, 1);
            console.log(id);
        },
        //select right class for banks transaction window
        get_lenght(val){
            return val.length
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
            this.bank_stats = response.stats;
            this.get_selected_banks();
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

        left: 10px;

        top: -webkit-calc(7% + 5px);
        top:    -moz-calc(7% + 5px);
        top:         calc(7% + 5px);

        width: -webkit-calc(10% - 5px);
        width:    -moz-calc(10% -5px);
        width:         calc(10% - 5px);

        height: -webkit-calc(93% - 5px);
        height:    -moz-calc(93% - 5px);
        height:         calc(93% - 5px);

        color: white;
    }
    #transactions_screen{
        position: absolute;

        top: -webkit-calc(7% + 15px);
        top:    -moz-calc(7% + 15px);
        top:         calc(7% + 15px);

        height: -webkit-calc(93% - 30px);
        height:    -moz-calc(93% - 30px);
        height:         calc(93% - 30px);

        left: -webkit-calc(10% + 15px);
        left:    -moz-calc(10% + 15px);
        left:         calc(10% + 15px);

        width: 70%;
    }

    #main_info_window{
        position: absolute;
        right: 0px;
        top: 7%;
        box-sizing: border-box;


        height: 93%;

        width: -webkit-calc(20% - 30px);
        width:    -moz-calc(20% - 30px);
        width:         calc(20% - 30px);
    }
    .new_bank_button_par{
        position: relative;
        width: 100%;
        height: 8%;
        margin-bottom: 5px;

    }
    .bank_button{
        box-sizing: border-box;

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
    .bank_button:hover{
        filter: alpha(opacity=50);
        opacity: 0.8;
    }
    .bank_link{
        display: inline-block;
        width: 100%;
        color: inherit; /* blue colors for links too */
        text-decoration: inherit; /* no underline */
    }
    .bank_link:hover{
        color: inherit; /* blue colors for links too */
        text-decoration: inherit; /* no underline */
    }
</style>


