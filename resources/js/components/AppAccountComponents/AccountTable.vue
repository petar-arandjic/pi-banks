<template>
    <div class="bi-a_container p-5">
        <div class="tables_container">
            <div class="account_container border-bottom border-dark">
                <table class="table table-borderless">
                    <thead class="thead-dark">
                        <tr class="text-center">
                            <th class="sticky-header p-1" width="20%" >račun</th>
                            <th class="sticky-header p-1" width="20%" >početno stanje</th>
                            <th class="sticky-header p-1" width="20%" >dozvoljeni minus</th>
                            <th class="sticky-header p-1" width="20%" >stanje</th>
                            <th class="sticky-header p-1" width="10%" >valuta</th>
                            <th class="sticky-header p-1" width="10%" ></th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr class="text-center" v-for="(account, index) in accounts"
                        :key="index"
                        :class="{ 'acount_field_bg_color': index % 2 }"
                        >
                            <th class="p-1" scope="row">{{ account.account }}</th>
                            <td class="p-1">{{ account.starting_balance }}</td>
                            <td class="p-1">{{ account.allowed_overdraft }}</td>
                            <td class="p-1">N/A</td>
                            <td class="p-1">{{ account.currency_id }}</td>
                            <td class="p-1">
                                <!-- alert buttons -->
                                <div class="row m-0"
                                v-if="delete_alert && selected_delete_account === index"
                                >
                                    <div class="col m-0 p-0">
                                        <button type="button" class="btn btn-danger m-0 mr-1 p-0 w-100"
                                        @click="delete_account(account.id)"
                                        >
                                            <i class="fas fa-check"></i>
                                        </button>
                                    </div>
                                    <div class="col m-0 p-0">
                                        <button type="button" class="btn btn-secondary m-0 ml-1 p-0 w-100"
                                        @click="delete_alert = false"
                                        ><i class="fas fa-times"></i></button>
                                    </div>
                                </div>
                                <!-- Edit and delete buttons -->
                                <div class="row m-0"
                                v-else
                                >
                                    <div class="col">
                                        <i class="far fa-edit edit_button"></i>
                                    </div>
                                    <div class="col"
                                    @click="show_alert_box(index, true)"
                                    >
                                        <i class="far fa-times-circle delete_button"></i>
                                    </div>
                                </div>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="form_container">
                <form id="account_form" class="w-100 h-100">
                    <div class="account_form_info">
                        <p class="ml-3"><strong>Dodaj novi račun</strong></p>
                    </div>
                    <div class="form_input_container">
                        <div class="row m-0 ml-2 mr-2 p-0 h-100">
                            <div class="col m-0 mr-1 p-0 border-bottom">
                                <input name="account" type="number" class="border-0 pl-3 pr-3 w-100 h-100" placeholder="račun">
                            </div>
                            <div class="col m-0 ml-1 mr-1 p-0 border-bottom">
                                <input name="starting_balance" type="number" class="border-0 pl-3 pr-3 w-100 h-100" placeholder="početno stanje">
                            </div>
                            <div class="col m-0 p-0 ml-1 mr-1 border-bottom">
                                <input name="allowed_overdraft" type="number" class="border-0 pl-3 pr-3 w-100 h-100" placeholder="dozvoljeni minus">
                            </div>
                            <div class="col m-0 p-0 ml-1 mr-1 border-bottom">
                                 <select name="currency_id" class="border-0 pl-3 pr-3 w-100 h-100">
                                    <option value="null">valuta</option>
                                    <option
                                        v-for="currency in currencies"
                                        :key="currency.id"
                                        :value="currency.id"
                                        >{{ currency.name }}</option>
                                </select>
                            </div>
                            <div class="col-1 m-0 p-0 h-100">
                                <button type="button" class="btn w-100 h-100 p-0 save_account_button"
                                @click="submit_account"
                                >
                                    <strong>Sačuvaj</strong>
                                </button>
                            </div>
                        </div>
                    </div>
                    <div class="form_alert_container">
                        <div class="row ml-2 mr-2">
                            <div class="col m-0 mr-1 p-0 pl-2 pr-2 text-center form_alert_text">
                                <strong class="text-danger" v-if="create_account_errors.account">račun nije validan</strong>
                            </div>
                            <div class="col m-0 mr-1 p-0 pl-2 pr-2 text-center form_alert_text">
                                <strong class="text-danger" v-if="create_account_errors.starting_balance">unesite početno stanje</strong>
                            </div>
                            <div class="col m-0 mr-1 p-0 pl-2 pr-2 text-center form_alert_text">
                                <strong class="text-danger" v-if="create_account_errors.allowed_overdraft">unesite dozvoljeni minus</strong>
                            </div>
                            <div class="col m-0 mr-1 p-0 pl-2 pr-2 text-center form_alert_text">
                                <strong class="text-danger" v-if="create_account_errors.currency_id">odaberi valutu</strong>
                            </div>
                            <div class="col-1 m-0 p-0 h-100">

                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <!-- Account delete form -->
        <form id='form_delete_account'>
            <input type="hidden" name="_method" value="DELETE">
        </form>
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
            create_account_errors: Object,
            //for delete alert box
            delete_alert: false,
            selected_delete_account: false
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
                    this.create_account_errors = {};
                    //reset form
                    document.getElementById("account_form").reset();

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
        },
        // Delete account
        delete_account(id){
            const myForm = document.getElementById('form_delete_account');
            const formData = new FormData(myForm);

            const url = `api/account/${id}/destroy`;

            fetch(url, {
                method: 'post',
                body: formData
            }).then((response)=>{
                return response.json();
            }).then((response)=>{
                //If data is deleted get new data froms server
                if(response){
                    this.get_accounts();
                    //close alert box after item is deleted
                    this.show_alert_box(false, false)
                }
            });
        },
        show_alert_box(index, show){
            this.delete_alert = show
            this.selected_delete_account = index
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
            // after bank is changed clod alert box if it is opened
            this.show_alert_box(false, false);
        },
    }
}
</script>

<style land="scss" scoped>
    .bi-a_container{
        position: absolute;
        bottom: 3%;
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
        height: 70%;
        overflow-y: auto;
    }
    .acount_field_bg_color{
        background: #f5f5f5;
    }
    .form_container{
        position: absolute;
        top: 75%;
        width: 100%;
        height: 25%;
    }
    .account_form_info{
        position: absolute;
        width: 100%;
        height: 30%;
        border-bottom: 2px solid #01bf9b;
    }
    .form_input_container{
        position: absolute;
        top: 50%;
        width: 100%;
        height: 30%;
    }
    .save_account_button{
        font-size: 0.9rem;
        background: #01bf9b;
        color: white;
    }
    .form_alert_container{
        position: absolute;
        bottom: 0px;
        left: 0px;
        width: 100%;
        height: 20%;
    }
    .form_alert_text{
        font-size: 0.8rem;
    }
    .edit_button:hover{
        color: #4287f5;
        cursor: pointer;
    }
    .delete_button:hover{
        color: #eb4034;
        cursor: pointer;
    }
    /*
    .buttons_container{
        position: absolute;
        top: 88%;
        width: 100%;
        height: 12%;
    }
    */
</style>
