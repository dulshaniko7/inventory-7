<template>
    
</template>

<script>
    export default {
        name: "logout",
        mounted(){
            localStorage.removeItem('token')
            localStorage.removeItem('user')
            Toast.fire({
                icon: 'success',
                title: 'Logout successfully'
            })
            this.$router.push({name:'login'})
        }
    }
</script>

<style scoped>

</style>
