<template>
<Layout>
    <div class="container">
        <div class="row">
            <div class="alert alert-success d-flex justify-content-between align-items-center" v-if="$page.props.flash.message" role="alert">
                {{ $page.props.flash.message }}
            </div>
            <div class="col-md-12">
                <h2>Parts</h2>
            </div>
        </div>
        <div class="row">
            <div class="col-md-10">
                <div class="d-flex justify-content-end mb-3">
                    <a href="/parts/create" class="btn btn-primary">Create Part</a>
                </div>
                <div class="card mb-2">
                    <div class="card-header">
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="name-addon">Name</span>
                            </div>
                            <input type="text" class="form-control" placeholder="Search by name" aria-label="Search by name" aria-describedby="name-addon" v-model="form.name">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="regnum-addon">Reg. Number</span>
                            </div>
                            <input type="text" class="form-control" placeholder="Search by Reg. number" aria-label="Search by registration number" aria-describedby="regnum-addon" v-model="form.serial_number">
                            
                            <span class="input-group-text" id="regnum-addon">Car:</span>
                            <select v-model="form.selectedCar" id="car"  class="form-control">
                              <option value="" disabled>Find by a car</option>
                              <option v-for="(car, index) in carOptions" :value="car.value" v-bind:key="index">{{ car.label }}</option>
                            </select>
                            
                            <div class="input-group-append">
                                <button class="btn btn-primary" @click="search">Search</button>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="table-responsive">
                    <table class="table table-bordered">
                        <thead class="table-dark">
                            <tr>
                                <th>Name</th>
                                <th>Serial Number</th>
                                <th>Belongs to car</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr v-for="(part, index) in parts" :key="index">
                                <td>{{ part.name }}</td>
                                <td>{{ part.serial_number }}</td>
                                <td>{{ part.car.name }}</td>
                                <td>
                                    <div class="d-flex justify-content-center">
                                        <a :href="'/parts/' + part.id" class="btn btn-primary mx-1">View</a>
                                        <a :href="'/parts/' + part.id + '/edit'" class="btn btn-secondary mx-1">Edit</a>
                                        <button class="btn btn-danger mx-1" @click="deletePart(part.id)">Delete</button>
                                    </div>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</Layout>
</template>

<script>
import Layout from '../Layout.vue';
import {
    usePage
} from '@inertiajs/inertia-vue';

export default {
    components: {
        Layout,
        usePage,
    },

    data() {
        return {
            form: {
                name: '',
                serial_number: '',
                car_id: '',
                selectedCar: ''
            },
        };
    },

    props: {
        parts: Array,
    },

    methods: {
        search() {
            this.$inertia.visit('/parts', {
                data: {
                    name: this.form.name,
                    serial_number: this.form.serial_number,
                    car_id: this.form.selectedCar
                }
            })
        },

        deletePart(partId) {
            if (confirm('Are you sure you want to delete this part?')) {
                this.$inertia.delete('/parts/' + partId)
            }
        },
    },

    computed: {
        carOptions() {
            const uniqueCars = new Set();
            this.parts.forEach(part => uniqueCars.add(part.car.id));
            return Array.from(uniqueCars).map(carId => {
                const part = this.parts.find(part => part.car.id === carId);
                return {
                    value: carId,
                    label: part.car.name
                };
            });
        }
    },
};
</script>
