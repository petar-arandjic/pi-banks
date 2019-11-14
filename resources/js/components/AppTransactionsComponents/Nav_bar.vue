<template>
    <div class="con">
        <div class="nav_cell"
        @click="Select_content(1)"
        >
            <div class="hor_alling">
                Home
            </div>
        </div>
        <div class="nav_cell"
        @click="Select_content(2)"
        >
            <div class="hor_alling">
                Transakcije
            </div>
        </div>
        <div class="nav_cell"
        @click="Select_content(3)"
        >
            <div class="hor_alling">
                Banke
            </div>
        </div>
    </div>
</template>

<script>
export default {
    props:{
        Select_content: Function
    },
    methods:{

    }
}
</script>

<style scoped>
    .con{
        position: absolute;
        width: 100%;
        height: 7%;
        background: #01bf9b;
        box-sizing: border-box;
    }
    .nav_cell{
        position: absolute;
        height: 100%;
        width: 10%;
        text-align: center;
        color: white;
        cursor: pointer;
    }
    .nav_cell:hover{
        border-bottom: 5px solid lightgrey;
    }
    .hor_alling{
        position: absolute;
        height: 40%;
        width: 100%;
        top: 0px;
        bottom: 0px;
        margin: auto;
        font-weight: bold
    }
    .nav_cell:nth-child(1){
        left: 5%;
    }
    .nav_cell:nth-child(2){
        left: 15%;
    }
    .nav_cell:nth-child(3){
        left: 25%;
    }
</style>
