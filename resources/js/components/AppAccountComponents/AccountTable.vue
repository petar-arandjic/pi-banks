<template>
    <div class="bi-a_container p-5">
        <b-row class="bi-a_table_container border m-0 h-100">
            <div class="bi-a_tc_child">

            </div>
            <table class="table table-bordered table-hover text-center border-bottom">
                <thead class="thead-dark">
                    <tr>
                        <th class="sticky-header p-1" width="25%" >račun</th>
                        <th class="sticky-header p-1" width="25%" >početno stanje</th>
                        <th class="sticky-header p-1" width="20%" >dozvoljeni minus</th>
                        <th class="sticky-header p-1" width="20%" >stanje</th>
                        <th class="sticky-header p-1" width="10%" >valuta</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <th class="p-1" scope="row">1658473947563</th>
                        <td class="p-1">32000.00</td>
                        <td class="p-1">50000.00</td>
                        <td class="p-1">32000.00</td>
                        <td class="p-1">KM</td>
                    </tr>
                    <tr>
                        <th class="p-1" scope="row">2</th>
                        <td class="p-1">Jacob</td>
                        <td class="p-1">Thornton</td>
                        <td class="p-1">Thornton</td>
                        <td class="p-1">USD</td>
                    </tr>
                    <tr>
                        <th class="p-1" scope="row">3</th>
                        <td class="p-1">Larry</td>
                        <td class="p-1">the Bird</td>
                        <td class="p-1">the Bird</td>
                        <td class="p-1">EUR</td>
                    </tr>
                </tbody>
            </table>
        </b-row>
        <b-row class="m-0">
            <form id="account_form" class="w-100">
            <table class="table table-bordered table-hover text-center border-bottom mb-0">
                    <thead class="border">
                        <tr>
                            <th class="sticky-header p-1" width="25%">
                                <input name="account" type="number" class="border-0 w-100 h-100 text-center" placeholder="račun">
                            </th>
                            <th class="sticky-header p-1" width="25%">
                                <input name="starting_balance" type="number" class="border-0 w-100 h-100 text-center" placeholder="početno stanje">
                            </th>
                            <th class="sticky-header p-1" width="20%">
                                <input name="allowed_overdraft" type="number" class="border-0 w-100 h-100 text-center" placeholder="dozvoljeni minus">
                            </th>
                            <th class="sticky-header p-1" width="20%">

                            </th>
                            <th class="sticky-header p-1" width="10%">
                                <select name="currency_id" class="w-100 h-100 border-0">
                                    <option value="null">valuta</option>
                                    <option
                                        v-for="currency in currencies"
                                        :key="currency.id"
                                        :value="currency.id"
                                        >{{ currency.name }}</option>
                                </select>
                            </th>
                        </tr>
                    </thead>
            </table>
            </form>
        </b-row>
        <b-row class="m-0 mt-1">
            <b-col md="1" offset="11" class="p-0">
                <button type="button" class="btn btn-dark w-100"
                    @click="submit_account"
                >
                Sačuvaj
                </button>
            </b-col>
        </b-row>
    </div>
</template>

<script>
export default {
    props: {
        bank_id: Number,
    },
    data(){
        return {
            currencies: Object
        }
    },
    methods: {
        // Create new account
        submit_account(){
            const myForm = document.getElementById('account_form');
            const formData = new FormData(myForm);

            const url = "api/bank/" + this.bank_id + "/account/store";

            fetch(url, {
                method: 'post',
                body: formData
            }).then((response)=>{
                return response.json();
            }).then((response)=>{
                console.log(response);
            }).catch((error)=>{
                console.error(error);
            });

        }
    },
    created() {
        fetch('http://localhost/pi-banks/public/api/currencies')
        .then(function(response) {
            return response.json();
        })
        .then((response) => {
            this.currencies = response
        });
    }
}
</script>

<style land="scss" scoped>
    .bi-a_container{
        position: absolute;
        bottom: 5%;
        left: 0px;
        width: 100%;
        height: 55%;
    }
    .bi-a_table_container{
        overflow: auto;
    }
    .sticky-header {
        position: sticky;
        top: 0;
        z-index: 10;
        /*To not have transparent background.
        background-color: white;*/
    }
</style>
