<template>
    <div class="container">
        <h2 class="text-center">Add Employee</h2>
        <router-link :to="{name: 'allEmployees'}" class="btn btn-primary">All Employees</router-link>
        <form @submit.prevent="insert" enctype="multipart/form-data">
            <div class="row">
                <div class="col-md-9">
                </div>
                <div class="col-md-3">
                    <img :src="form.photo" alt=""
                         style="height: 200px; width: 160px; margin-bottom: -30px; margin-top: -90px;"
                         class="pull-right">
                </div>
            </div>

            <div class="form-group">
                <div class="form-row">
                    <div class="col-md-6">
                        <label for="name">Name</label>
                        <input type="text" class="form-control" id="name" v-model="form.name">
                    </div>
                    <div class="col-md-6">
                        <label for="NIC">NIC</label>
                        <input type="text" class="form-control" id="NIC" v-model="form.nic">
                    </div>
                </div>
            </div>
            <div class="form-group">
                <div class="form-row">
                    <div class="col-md-6">
                        <label for="email">Email</label>
                        <input type="email" class="form-control" id="email" v-model="form.email">
                    </div>
                    <div class="col-md-6">
                        <label for="phone">Phone</label>
                        <input type="text" class="form-control" id="phone" v-model="form.phone">
                    </div>
                </div>
            </div>


            <div class="form-group">
                <label for="salary">Address</label>
                <textarea class="form-control" id="address" rows="2" v-model="form.address"></textarea>
            </div>

            <div class="form-group">
                <div class="form-row">
                    <div class="col-md-6">
                        <label for="salary">Salary</label>
                        <input type="text" class="form-control" id="salary" v-model="form.salary">
                    </div>
                    <div class="col-md-6">
                        <label for="salary">Joining Date</label>
                        <input type="date" class="form-control" v-model="form.joiningDate">
                    </div>
                </div>
            </div>


            <div class="form-group">
                <div class="form-row">
                    <div class="col-md-6">
                        <label class="custom-file-label">Photo</label>
                        <input type="file" class="custom-file-input" id="photo" name="photo" @change="onFileSelected">
                    </div>

                </div>
            </div>


            <button class="btn btn-primary">Submit</button>
        </form>
    </div>
</template>

<script>
    export default {
        name: "AddEmployee",
        data() {
            return {
                form: {
                    name: null,
                    nic: null,
                    email: null,
                    address: null,
                    phone: null,
                    salary: null,
                    joiningDate: null,
                    photo: null,
                    image: null
                }
            }
        },
        methods: {
            insert() {

                const config = {
                    headers: {
                        'content-type': 'multipart/form-data'
                    }
                }
                let formData = new FormData();
                formData.append('photo',this.form.image)
                formData.append('name', this.form.name)
                formData.append('nic', this.form.nic)
                formData.append('email', this.form.email)
                formData.append('phone', this.form.phone)
                formData.append('address', this.form.address)
                formData.append('joiningDate', this.form.joiningDate)
                axios.post('/api/employee', formData, config)
                    .then(() => {
                        this.$router.push({name: 'allEmployees'})
                        Notification.success()
                    })
                    .catch(
                        Toast.fire({
                            icon: 'warning',
                            title: 'Not all fields are given'
                        })
                    )
            },
            onFileSelected(event) {
                let file = event.target.files[0]

                if (file.size > 20000000) {
                    Notification.image_validation()
                } else {
                    let reader = new FileReader()
                    reader.readAsDataURL(file)
                    reader.onload = event => {
                        this.form.photo = event.target.result
                        console.log(event.target.result)
                    }
                    this.form.image = event.target.files[0]
                }
            }

        }
    }
</script>

<style scoped>

</style>
