<template>
    <Layout>
      <div class="container">
    <div class="alert alert-success d-flex justify-content-between align-items-center" v-if="$page.props.flash.message" role="alert">
        {{ $page.props.flash.message }}
      </div>
        <div class="card">
          <div class="card-header">
            <h3>Add new Part</h3>
          </div>
          <div class="card-body">
            <form @submit.prevent="submitForm">
              <div class="form-group mb-4">
                <label for="name">Name:</label>
                <input type="text" class="form-control" id="name" v-model="form.name">
                <div v-if="errors && errors.name" class="text-danger">{{ errors.name }}</div>
              </div>
              <div class="form-group mb-4">
                <label for="serial_number">Serial Number:</label>
                <input type="text" class="form-control" id="serial_number" v-model="form.serial_number">
                <div v-if="errors && errors.serial_number" class="text-danger">{{ errors.serial_number }}</div>
              </div>
              <div class="form-group mb-4">
              <label for="car_id">Car</label>
              <select class="form-control" id="car_id" v-model="form.car_id">
                <option v-for="(car, index) in cars" :value="car.id" v-bind:key="index">{{ car.name }}</option>
              </select>
              <div v-if="errors && errors.car_id" class="text-danger">{{ errors.car_id }}</div>
            </div>
              <button type="submit" class="btn btn-primary mt-4">Create</button>
            </form>
          </div>
        </div>
      </div>
    </Layout>
  </template>
  
  <script>

    import { usePage } from '@inertiajs/inertia-vue';
    import Layout from '../Layout.vue';
  
    export default {
      components: {
        Layout,
        usePage,
      },

      props: ['cars'],
  
      data() {
        return {
          form: this.$inertia.form({
            name: '',
            serial_number: '',
            car_id: '',
          }),
          errors: null,
        };
      },
  
      methods: {
        submitForm() {
          this.form.post('/parts',
          {
             onSuccess: () => [this.form.reset('name','serial_number'), this.errors = null ] ,
             onError: (errors) => {this.errors = errors },
         });
        },
      },
    };
  </script>
  