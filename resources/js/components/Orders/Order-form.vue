<template>
    <div class="of-order">
        <b-row class="h-100 m-0">
            <b-col class="p-5">
                <b-row class="pb-1 pt-3 of-order_header">
                    <h5 class="mb-1"><strong>Novi nalog</strong></h5>
                </b-row>
                <form v-on:submit.prevent="onSubmit" method="POST" action="/order/store" id="o-order_form">
                    <b-row class="of-form_row">
                        <b-col md="8" offset="2">
                            <b-row class="m-0 mt-5">
                                <div class="form-group w-100">
                                    <label for="of-partner">Komitent</label>
                                    <select class="form-control" id="of-partner" name="partner_id">
                                        <option>1</option>
                                        <option>2</option>
                                        <option>3</option>
                                        <option>4</option>
                                        <option>5</option>
                                    </select>
                                </div>
                            </b-row>
                            <b-row class="m-0">
                                <div class="form-group w-100">
                                    <label for="of-parity">Paritet</label>
                                    <select class="form-control" id="of-parity" name="parity">
                                        <option>1</option>
                                        <option>2</option>
                                        <option>3</option>
                                        <option>4</option>
                                        <option>5</option>
                                    </select>
                                </div>
                            </b-row>
                            <b-row class="mt-4">
                                <b-col md="6" class="pr-1">
                                     <div class="form-group">
                                        <label for="of-bl">B/L</label>
                                        <input type="text" class="form-control" id="of-bl" placeholder="B/L" name="bl">
                                    </div>
                                </b-col>
                                <b-col md="6" class="pl-1">
                                    <div class="form-group">
                                        <label for="of-bl2">B/L 2</label>
                                        <input type="number" class="form-control" id="of-bl2" placeholder="B/L" name="bl2">
                                    </div>
                                </b-col>
                            </b-row>
                            <b-row class="mt-4">
                                <b-col md="6" class="pr-1">
                                    <div class="form-group">
                                        <label for="of-port_of_departure">Luka polaska</label>
                                        <input type="text" class="form-control" id="of-port_of_departure" placeholder="Luka polaska" name="port_of_departure">
                                    </div>
                                </b-col>
                                <b-col md="6" class="pl-1">
                                    <div class="form-group">
                                        <label for="of-departure_date">Datum polaska</label>
                                        <input type="date" class="form-control" id="of-departure_date" placeholder="Datum dolaska" name="departure_date">
                                    </div>
                                </b-col>
                            </b-row>
                            <b-row class="mt-0">
                                <b-col md="6" class="pr-1">
                                    <div class="form-group">
                                        <label for="of-destination_port">Luka dolazak</label>
                                        <input type="text" class="form-control" id="of-destination_port" placeholder="Luka dolaska" name="destination_port">
                                    </div>
                                </b-col>
                                <b-col md="6" class="pl-1">
                                    <div class="form-group">
                                        <label for="of-date_of_arrival">Datum dolaska</label>
                                        <input type="date" class="form-control" id="of-date_of_arrival" placeholder="Datum dolaska" name="date_of_arrival">
                                    </div>
                                </b-col>
                            </b-row>
                            <b-row class="mt-4">
                                <b-col md="6" class="pr-1">
                                    <b-row>
                                        <b-col md="6" class="pr-1">
                                            <b-button type="submit" variant="primary" class="w-100">Submit</b-button>
                                        </b-col>
                                        <b-col md="6" class="pl-1">
                                            <b-button type="reset" variant="danger" class="w-100">Reset</b-button>
                                        </b-col>
                                    </b-row>
                                </b-col>
                            </b-row>
                        </b-col>
                    </b-row>
                </form>
            </b-col>
        </b-row>
    </div>
</template>

<script>
export default {
    methods:{
        onSubmit(form){
            
            const myForm = document.getElementById('o-order_form');

            const formData = new FormData(myForm);

            
        }
    }
}
</script>

<style lang="scss" scoped>
    .of-order{
        position: absolute;
        width: 100%;
        height: 100%;
    }
    .of-order_header{
        border-bottom: 5px solid #40b9c2;
        color: #40b9c2;
    }
</style>