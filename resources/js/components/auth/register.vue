<template>
    <div>
        <div class="row justify-content-center">
            <div class="col-xl-10 col-lg-12 col-md-9">
                <div class="card shadow-sm my-5">
                    <div class="card-body p-0">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="login-form">
                                    <div class="text-center">
                                        <h1 class="h4 text-gray-900 mb-4">Register</h1>
                                    </div>
                                    <form @submit.prevent="register">
                                        <div class="form-group">
                                            <label>Name</label>
                                            <input type="text" class="form-control" id="exampleInputFirstName"
                                                   placeholder="Enter Name" v-model="form.name">
                                            <small class="text-danger" v-if="errors.name">{{errors.name[0]}}</small>
                                        </div>
                                        <div class="form-group">
                                            <label>Email</label>
                                            <input type="email" class="form-control" id="exampleInputEmail"
                                                   aria-describedby="emailHelp"
                                                   placeholder="Enter Email Address" v-model="form.email">
                                            <small class="text-danger" v-if="errors.email">{{errors.email[0]}}</small>
                                        </div>
                                        <div class="form-group">
                                            <label>Password</label>
                                            <input type="password" class="form-control" id="exampleInputPassword"
                                                   placeholder="Password" v-model="form.password">
                                            <small class="text-danger" v-if="errors.password">{{errors.password[0]}}</small>
                                        </div>
                                        <div class="form-group">
                                            <label>Confirm Password</label>
                                            <input type="password" class="form-control" id="exampleInputPasswordRepeat"
                                                   placeholder="Confirm Password" v-model="form.password_confirmation">
                                            <small class="text-danger" v-if="errors.password">{{errors.password_confirmation[0]}}</small>
                                        </div>
                                        <div class="form-group">
                                            <button class="btn btn-primary btn-block">Register</button>
                                        </div>
                                        <hr>

                                    </form>
                                    <hr>
                                    <div class="text-center">
                                        <router-link :to="{name : 'login'}">Already have an account?</router-link>
                                    </div>
                                    <div class="text-center">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        name: "register",
        data() {
            return {
                form: {
                    name: null,
                    email: null,
                    password: null,
                    password_confirmation: null
                },
                errors: {}
            }
        },
        mounted(){
            if(User.loggedIn()){
                this.$router.push({ name: 'Index'})
            }
        },
        methods: {
            register() {
                axios.post('/api/auth/register', this.form)
                    .then(response => {
                       User.responseAfterLogin(response)
                        Toast.fire({
                            icon: 'success',
                            title: 'Signed in successfully'
                        })
                        this.$router.go(0)
                        this.$router.push({name: 'Index'})
                    })
                    .catch(error => this.errors = error.response.data.errors)
                    .catch(
                        Toast.fire({
                            icon: 'warning',
                            title: 'All fields required'
                        })
                    )

            }
        }
    }
</script>

<style scoped>

</style>
