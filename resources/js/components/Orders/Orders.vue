<template>
    <div class="orders_container">
        <div class="orders border border-dark">
            <table class="table table-hover text-center border-bottom">
                <thead class="thead-dark">
                    <tr>
                        <th class="sticky-header">ID</th>
                        <th class="sticky-header">Komitent</th>
                        <th class="sticky-header">Datum</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <th scope="row">1</th>
                        <td>Mark</td>
                        <td>Otto</td>
                    </tr>
                    <tr>
                        <th scope="row">2</th>
                        <td>Jacob</td>
                        <td>Thornton</td>
                    </tr>
                    <tr>
                        <th scope="row">3</th>
                        <td>Larry</td>
                        <td>the Bird</td>
                    </tr>
                </tbody>
            </table>
        </div>
        <div class="o-add_order">
            <b-button squared variant="outline-dark w-100 h-100 o-add_order_button"
            @click="selected = 'order'"
            >
                Dodaj novi nalog
            </b-button>
        </div>
        <div class="o-container">
            <order-form v-if="selected == 'order'"></order-form>
        </div>
    </div>
</template>

<script>
export default {
    name: 'App-orders',

    data(){
        return {
            banks: Object,
            selected: String
        }
    },
    methods:{
    }
    /*
    created: function () {
        fetch(`http://localhost/Cargo_Banke/public/api/banks`)
        .then(function(response){
            return response.json();
        })
        .then((response) => {
            this.banks = response
        })
    }
    */
}
</script>

<style lang="scss" scoped>
    .orders_container{
        position: absolute;
        top: 7%;
        height: 93%;
        width: 100%;
    }
    .orders{
        position: absolute;
        left: 5px;
        top: 5px;
        bottom: -webkit-calc(5% + 5px);
        bottom:    -moz-calc(5% + 5px);
        bottom:         calc(5% + 5px);
        width: -webkit-calc(20% - 5px);
        width:    -moz-calc(20% - 5px);
        width:         calc(20% - 5px);
        overflow: auto;
    }
    th.sticky-header {
        position: sticky;
        top: 0;
        z-index: 10;
        /*To not have transparent background.
        background-color: white;*/
    }
    .o-add_order{
        position: absolute;
        left: 5px;
        bottom: 5px;
        width: -webkit-calc(20% - 5px);
        width:    -moz-calc(20% - 5px);
        width:         calc(20% - 5px);

        height: -webkit-calc(5% - 5px);
        height:    -moz-calc(5% - 5px);
        height:         calc(5% - 5px);
    }
    .o-add_order_button{
        font-size: 1.6vh;
    }
    .o-container{
        position: absolute;
        top: 5px;
        right: 5px;
        bottom: 5px;
        width: -webkit-calc(80% - 10px);
        width:    -moz-calc(80% - 10px);
        width:         calc(80% - 10px);
    }
</style>
