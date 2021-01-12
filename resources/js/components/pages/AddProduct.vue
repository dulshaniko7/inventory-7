<template>
    <div class="container">
        <h2 class="text-center">Add Products</h2>
        <form @submit.prevent="insert" enctype="multipart/form-data">
            <div class="row">
                <div class="col-md-9">
                </div>
                <div class="col-md-3">

                </div>
            </div>

            <div class="form-group">
                <div class="form-row">
                    <div class="col-md-6">
                        <label for="name">Name</label>
                        <input type="text" class="form-control" id="name" v-model="form.name">
                    </div>
                    <div class="col-md-6">
                        <label for="code">Code</label>
                        <input type="text" class="form-control" id="code" v-model="form.code">
                    </div>
                </div>
            </div>
            <div class="form-group">
                <div class="form-row">
                    <div class="col-md-12">
                        <label for="category">Category</label>
                        <select class="form-control" id="category" v-model="form.category_id">
                            <option v-for="(cat,index) in categories" :key="index" :value="cat.id">
                                {{cat.name}}
                            </option>
                        </select>
                    </div>
                </div>
            </div>


            <div class="form-group">
                <div class="form-row">
                    <div class="col-md-6">
                        <label for="salary">Root</label>
                        <input type="text" class="form-control" id="salary" v-model="form.root">
                    </div>
                    <div class="col-md-6">
                        <label for="salary"> Date</label>
                        <input type="date" class="form-control" v-model="form.date">
                    </div>
                </div>
            </div>

            <div class="form-group">
                <div class="form-row">
                    <div class="col-md-6">
                        <label for="salary">Price</label>
                        <input type="text" class="form-control" v-model="form.selling_price">
                    </div>
                    <div class="col-md-6">
                        <label for="salary"> Qty</label>
                        <input type="text" class="form-control" v-model="form.qty">
                    </div>
                </div>
            </div>

            <div class="form-group">
                <div class="form-row">
                    <div class="col-md-6">
                        <label class="custom-file-label">image</label>
                        <input type="file" class="custom-file-input" id="photo" name="image">
                    </div>

                </div>
            </div>


            <button class="btn btn-primary">Submit</button>
        </form>
    </div>
</template>

<script>
    export default {
        name: "AddProduct",
        data() {
            return {
                form: {
                    name: null,
                    code: null,
                    root: null,
                    selling_price: null,
                    date: null,
                    image: null,
                    qty: null,
                    category_id: null
                },
                categories: null
            }
        },
        mounted() {
            axios.get('/api/category')
                .then(response => {
                    this.categories = response.data
                })
                .catch(error => {
                    console.log('data error')
                });
        },
        methods: {
            insert(){
            axios.post('/api/product',this.form)
                .then(() => {
                    this.$router.push({name: 'allProducts'})
                    Notification.success()
                })
            }
        }
    }
</script>

<style scoped>

</style>
