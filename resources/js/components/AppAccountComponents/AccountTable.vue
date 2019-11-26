<template>
    <div class="bi-a_container p-5">
        <!--
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
                    <tr v-for="account in accounts">
                        <th class="p-1" scope="row">{{ account.account }}</th>
                        <td class="p-1">{{ account.starting_balance }}</td>
                        <td class="p-1">{{ account.allowed_overdraft }}</td>
                        <td class="p-1">N/A</td>
                        <td class="p-1">{{ account.currency_id }}</td>
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
        -->
        <div class="tables_container">
            <div class="account_container border">
                <table class="table table-borderless">
                    <thead class="thead-dark">
                        <tr class="text-center">
                            <th class="sticky-header p-1" width="25%" >račun</th>
                            <th class="sticky-header p-1" width="25%" >početno stanje</th>
                            <th class="sticky-header p-1" width="20%" >dozvoljeni minus</th>
                            <th class="sticky-header p-1" width="20%" >stanje</th>
                            <th class="sticky-header p-1" width="10%" >valuta</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr class="border-bottom text-center" v-for="account in accounts">
                            <th class="p-1 border-right" scope="row">{{ account.account }}</th>
                            <td class="p-1 border-right">{{ account.starting_balance }}</td>
                            <td class="p-1 border-right">{{ account.allowed_overdraft }}</td>
                            <td class="p-1 border-right">N/A</td>
                            <td class="p-1">{{ account.currency_id }}</td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="form_container">
                <form id="account_form" class="w-100">
                    <table class="table table-borderless text-center">
                            <thead class="border-left border-right border-bottom">
                                <tr>
                                    <th class="sticky-header p-1 border-right" width="25%">
                                        <input name="account" type="number" class="border-0 w-100 h-100 text-center" placeholder="račun">
                                    </th>
                                    <th class="sticky-header p-1 border-right" width="25%">
                                        <input name="starting_balance" type="number" class="border-0 w-100 h-100 text-center" placeholder="početno stanje">
                                    </th>
                                    <th class="sticky-header p-1 border-right" width="20%">
                                        <input name="allowed_overdraft" type="number" class="border-0 w-100 h-100 text-center" placeholder="dozvoljeni minus">
                                    </th>
                                    <th class="sticky-header p-1 border-right" width="20%">

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
                            <tbody>
                                <tr class="text-center">
                                    <td class="p-1"><strong class="text-danger" v-if="create_account_errors.account">račun nije validan</strong></td>
                                    <td class="p-1"><strong class="text-danger" v-if="create_account_errors.starting_balance">unesite početno stanje</strong></td>
                                    <td class="p-1"><strong class="text-danger" v-if="create_account_errors.allowed_overdraft">unesite dozvoljeni minus</strong></td>
                                    <td class="p-1"></td>
                                    <td class="p-1"><strong class="text-danger" v-if="create_account_errors.currency_id">odaberi valutu</strong></td>
                                </tr>
                            </tbody>
                    </table>
                </form>
            </div>
            <div class="buttons_container">
                <div class="row m-0">
                    <div class="col-2 offset-10 p-0 pl-5">
                        <button type="button" class="btn btn-secondary w-100"
                        @click="submit_account"
                        >Sačuvaj</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    props: {
        bank_id: Number,
        currencies: Array
    },
    data(){
        return {
            accounts: Array,
            create_account_errors: Object
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
                if (response.hasOwnProperty('success')) {
                    alert('account added');
                    //if successful get current bank account again
                    this.get_accounts();
                    //unset errors
                    this.create_account_errors = null
                }else if(response.hasOwnProperty('errors')){
                    //if form has errors give feadback to user
                    this.create_account_errors = response.errors
                }
            }).catch((error)=>{
                console.error(error);
            });
        },
        // Get all currnt bank accounts
        get_accounts(){
            const url = `http://localhost/pi-banks/public/api/bank/${this.bank_id}/accounts`

            fetch(url)
            .then((response) => {
                return response.json();
            })
            .then((response) => {
                this.accounts = response;
            });
        }
    },
    // Get all Current Bank Accounts when component is created
    created() {
        this.get_accounts();
    },
    // Get all Current Bank Accounts when bank_id is changed
    watch: {
        bank_id(){
            this.get_accounts();
        }
    }
}
</script>

<style land="scss" scoped>
    .bi-a_container{
        position: absolute;
        bottom: 0px;
        left: 0px;
        width: 100%;
        height: 55%;
    }
    /*
    .bi-a_table_container{
        overflow: auto;
    }
    */
    .sticky-header {
        position: sticky;
        top: 0;
        z-index: 10;
    }
    .tables_container{
        position: absolute;
        top: 0px;
        left: 50px;
        right: 50px;
        bottom: 20px;
    }
    .account_container{
        position: absolute;
        top: 0px;
        width: 100%;
        height: 60%;
        overflow-y: auto;
    }
    .form_container{
        position: absolute;
        top: 60%;
        width: 100%;
        height: 25%;
    }
    .buttons_container{
        position: absolute;
        top: 88%;
        width: 100%;
        height: 12%;
    }
</style>
