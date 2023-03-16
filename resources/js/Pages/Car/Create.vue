<template>
  <Layout>
    <div class="container">
      <div class="alert alert-success d-flex justify-content-between align-items-center" v-if="$page.props.flash.message" role="alert">
        {{ $page.props.flash.message }}
      </div>
      <h1>Create Car</h1>
      <div class="row justify-content-center">
        <div class="col-md-8">
          <div class="card">
            <div class="card-body">
              <form @submit.prevent="submitForm">
                <div class="form-group">
                  <label for="name">Name:</label>
                  <input type="text" class="form-control" id="name" v-model="form.name" :class="{ 'is-invalid': errors && errors.name }">
                  <div v-if="$page.props.errors && $page.props.errors.name" class="text-danger">{{ $page.props.errors.name }}</div>
                </div>
                <div class="form-group">
                  <label for="registration_number">Registration Number:</label>
                  <input type="text" class="form-control" id="registration_number" v-model="form.registration_number" :class="{ 'is-invalid': errors && errors.registration_number }">
                  <div v-if="$page.props.errors && $page.props.errors.registration_number" class="text-danger">{{ $page.props.errors.registration_number }}</div>
                </div>
                <div class="form-check">
                  <input type="checkbox" class="form-check-input" id="is_registered" v-model="form.is_registered">
                  <label class="form-check-label" for="is_registered">Is Registered</label>
                </div>
                <button type="submit" class="btn btn-primary">Create</button>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </Layout>
  </template>
  
  <script>

  import { usePage } from '@inertiajs/inertia-vue';
  import Layout from '../Layout.vue';

    export default {

      components:{
        Layout,
        usePage
      },

      props: {
       // errors: Object,
        car: Object,
      },

      data() {
        return {
          form: this.$inertia.form({
            name: '',
            registration_number: '',
            is_registered: false,
          }),
          errors: null
        }
      },

      methods: {
         submitForm() {
            this.form.post('/cars', {
             onSuccess: () => [this.form.reset('name','registration_number'), this.errors = null ] ,
             onError: (errors) => {this.errors = errors },
      });
        }
      }
    }

  </script>