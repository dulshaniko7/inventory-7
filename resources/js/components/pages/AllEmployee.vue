<template>
    <div>
        <h2>All Employees</h2>
        <input type="text" placeholder="search" class="form-control" v-model="search">
        <div class="card">
            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                <h6 class="m-0 font-weight-bold text-primary">Employees Tables</h6>
            </div>
            <div class="table-responsive">
                <table class="table align-items-center table-flush">
                    <thead class="thead-light">
                    <tr>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Phone</th>
                        <th>Salary</th>
                        <th>Joining Date</th>
                        <th>Photo</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr v-for="e in filterSearch" :key="e.id">
                        <td>{{e.name}}</td>
                        <td>{{e.email}}</td>
                        <td>{{e.phone}}</td>
                        <td>{{e.salary}}</td>
                        <td>{{e.joiningDate}}</td>
                        <td><img :src="e.photo"></td>
                        <td>
                            <a href="#" class="btn btn-sm btn-primary">Edit</a>
                            <a @click="" class="btn btn-sm btn-danger">Delete</a>
                        </td>
                    </tr>
                    </tbody>
                </table>
            </div>
            <div class="card-footer"></div>
        </div>
    </div>
</template>

<script>
    export default {
        name: "AllEmployee",
        data(){
            return{
                employees:[],
                search: null
            }
        },
        mounted(){
            this.allEmployees()
        },
        methods: {
            allEmployees(){
                axios.get('/api/employee')
                    .then(response => {
                        this.employees = response.data.data
                })
            },
            delete(id){
                Swal.fire({
                    title: 'Are you sure?',
                    text: "You won't be able to revert this!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Yes, delete it!'
                }).then((result) => {
                    if (result.isConfirmed) {
                        Swal.fire(
                            'Deleted!',
                            'Your file has been deleted.',
                            'success'
                        )
                    }
                })
            }
        },
        computed :{
            filterSearch(){
                return this.employees.filter(e => {
                    return e.name.match(this.search)
                })
            }
        }
    }
</script>

<style scoped>

</style>
