<template>
    <div class="global">
        <div class="db-newTransaction">
            <button class="b-newTransaction">DODAJ NOVU TRANSAKCIJU</button>
        </div>
    </div>
</template>

<script>
export default {

}
</script>


<style lang="scss">
    .global{
         font-family: "Trebuchet MS", Arial, Helvetica, sans-serif;
    }
    .db-newTransaction{
        position: absolute;
        bottom: 5px;
        left: 5px;
        right: 5px;
        height: 30px;
    }
    .b-newTransaction{
        position: absolute;
        width: 100%;
        height: 100%;
        background: #E53935;
        color: white;
        font-weight: bold;
    }
    .b-newTransaction:hover{
        opacity: 0.9;
    }
    .b-newTransaction:active{
        opacity: 0.8;
    }
</style>
