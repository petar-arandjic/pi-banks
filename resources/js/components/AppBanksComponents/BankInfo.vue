<template>
    <div>
        <div class="bi-b_container pl-5 pt-4">
            <b-row class="m-0 mb-5">
                <h3>{{ bank.name }}</h3>
            </b-row>
            <b-row class="m-0 mt-4 ml-5">
                <b-col>
                    <h5>Početno stanje:</h5>
                    <p>{{ bank.starting_balance.toFixed(2) }}</p>
                </b-col>
                <b-col></b-col>
                <b-col></b-col>
            </b-row>
        </div>
        <div class="bi-a_container p-5">
            <b-row class="bi-a_table_container border m-0 h-100">
                <table class="table table-hover text-center border-bottom">
                    <thead class="thead-dark">
                        <tr>
                            <th class="sticky-header p-1">racun</th>
                            <th class="sticky-header p-1">početno stanje</th>
                            <th class="sticky-header p-1">dozvoljeni minus</th>
                            <th class="sticky-header p-1">stanje</th>
                            <th class="sticky-header p-1">valuta</th>
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
            <b-row class="m-0 mt-1">
                <b-col md="1" offset="11" class="p-0">
                    <button type="button" class="btn btn-dark w-100">Sačuvaj</button>
                </b-col>
            </b-row>
        </div>
    </div>
</template>

<script>
export default {
    props: {
        bank: Object
    }
}
</script>

<style lang="scss" scoped>
    .bi-b_container{
        position: absolute;
        top: 0px;
        left: 0px;
        width: 100%;
        height: 45%;
    }
    .bi-a_container{
        position: absolute;
        bottom: 0px;
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