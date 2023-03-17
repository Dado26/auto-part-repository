<template>
<Layout>
    <div class="container">
        <div class="alert alert-success d-flex justify-content-between align-items-center" v-if="$page.props.flash.message" role="alert">
            {{ $page.props.flash.message }}
        </div>
        <h1>Cars</h1>
        <div class="row">
            <div class="col-md-10">
                <div class="d-flex justify-content-end mb-3">
                    <a href="/cars/create" class="btn btn-primary col-auto ml-auto">Create Car</a>
                </div>

                <div class="card mb-2">
                    <div class="card-header">

                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="name-addon">Name</span>
                            </div>
                            <input type="text" class="form-control" placeholder="Search by name" aria-label="Search by name" aria-describedby="name-addon" v-model="filters.name">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="regnum-addon">Reg. Number</span>
                            </div>
                            <input type="text" class="form-control" placeholder="Search by registration number" aria-label="Search by registration number" aria-describedby="regnum-addon" v-model="filters.registration_number">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="registered-addon">Registered</span>
                            </div>
                            <select class="form-control" v-model="filters.is_registered" aria-label="Search by is registered" aria-describedby="registered-addon">
                                <option value="">Any</option>
                                <option value="1">Yes</option>
                                <option value="0">No</option>
                            </select>
                            <div class="input-group-append">
                                <button class="btn btn-primary" @click="searchCars">Search</button>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="table-responsive">
                    <table class="table table-striped table-bordered">
                        <thead class="table-dark">
                            <tr>
                                <th>#</th>
                                <th>Name</th>
                                <th>Registration Number</th>
                                <th>Is Registered</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr v-for="(car, index) in cars" :key="index">
                                <td>{{ index + 1 }}</td>
                                <td>{{ car.name }}</td>
                                <td>{{ car.registration_number }}</td>
                                <td>{{ car.is_registered ? 'Yes' : 'No' }}</td>
                                <td>
                                    <div class="d-flex justify-content-center">
                                        <a :href="'/cars/' + car.id" class="btn btn-primary mx-1">View</a>
                                        <a :href="'/cars/' + car.id + '/edit'" class="btn btn-secondary mx-2">Edit</a>
                                        <button @click="deleteCar(car.id)" class="btn btn-danger mx-1">Delete</button>
                                    </div>
                                </td>
                            </tr>
                        </tbody>
                        <tfoot>
                            <tr>
                                <td colspan="5" class="text-end"><strong>Total cars: {{ cars.length }}</strong></td>
                            </tr>
                        </tfoot>
                    </table>
                </div>
            </div>
        </div>
    </div>
</Layout>
</template>

<script>
import Layout from '../Layout.vue';

export default {
    components: {
        Layout,
    },

    props: ['cars'],

    data() {
        return {
            filters: {
                name: '',
                registration_number: '',
                is_registered: '',
            },
        };
    },

    methods: {

        searchCars() {
            this.$inertia.visit('/cars', {
                data: {
                    search: this.filters
                }
            })
        },

        deleteCar(id) {
            if (confirm('Are you sure you want to delete this car?')) {
                this.$inertia.delete(`/cars/${id}`)
            }
        }
    }

};
</script>
