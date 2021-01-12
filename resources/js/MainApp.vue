<template>
    <div>
<div v-if="isLogged">
        <div class="row">
            <div class="col-md-2">
            <side-bar></side-bar>
        </div>
            <div class="col-md-10" >
                <Navi></Navi>
                <router-view></router-view>
            </div>
        </div>
</div>
        <div v-if="!isLogged">
        <div class="row">

            <div class="col-md-12">
                <Navi></Navi>
                <router-view></router-view>
            </div>
        </div>
        </div>





    </div>
</template>

<script>
    import Navi from "./components/Navi";
    import SideBar from "./components/SideBar";
    export default {
        name: "MainApp",
        data(){
            return{
                isLogged : false
            }
        },
       mounted(){
            if(User.loggedIn()){
                this.isLogged = true
            }
       },

        components: {SideBar, Navi}
    }
</script>

<style scoped>

</style>
