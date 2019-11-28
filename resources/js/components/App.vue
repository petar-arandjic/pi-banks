<template>
    <div>
        <nav-bar
        :Select_content='select_content'
        ></nav-bar>
        <app-orders v-if="selected_content == 1"></app-orders>
        <app-banke v-if="selected_content == 2"></app-banke>
        <bank v-if="selected_content == 3"></bank>
    </div>
</template>

<script>
export default {
    name: 'app',

    data(){
        return {
            selected_content: 3
        }
    },
    methods: {
        select_content(id){
            this.selected_content = id
            console.log(id);
        }
    }
}
</script>

<style>
    /* Chrome, Safari, Edge, Opera */
    input::-webkit-outer-spin-button,
    input::-webkit-inner-spin-button {
    -webkit-appearance: none;
    margin: 0;
    }

    /* Firefox */
    input[type=number] {
    -moz-appearance:textfield;
    }
</style>
