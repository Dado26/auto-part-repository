<template>
  <Layout>
    <div class="container mt-4">
      <div class="alert alert-success d-flex justify-content-between align-items-center" v-if="$page.props.flash.message" role="alert">
        {{ $page.props.flash.message }}
      </div>
    <div class="row justify-content-center">
      <div class="col-md-8">
        <div class="card">
          <div class="card-header">Edit Car</div>
          <div class="card-body">
            <form @submit.prevent="submitForm">
              <div class="form-group mb-4">
                <label for="name">Name</label>
                <input type="text" class="form-control" id="name" v-model="form.name" :class="{ 'is-invalid': errors && errors.name }">
                <div class="invalid-feedback" v-if="errors && errors.name">
                  {{ errors.name }}
                </div>
              </div>
              <div class="form-group mb-4">
                <label for="registration_number">Registration Number</label>
                <input type="text" class="form-control" id="registration_number" v-model="form.registration_number" :class="{ 'is-invalid': errors && errors.registration_number }">
                <div class="invalid-feedback" v-if="errors && errors.registration_number">
                  {{ errors.registration_number }}
                </div>
              </div>
              <div class="form-group form-check mb-4">
                <input type="checkbox" class="form-check-input" id="is_registered" v-model="form.is_registered">
                <label class="form-check-label" for="is_registered">Is Registered?</label>
              </div>
              <button type="submit" class="btn btn-primary">Update</button>
            </form>
          </div>
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

    props: {
      car: Object,
    },

    data() {
      return {
        form: this.$inertia.form({
          name: this.car.name,
          registration_number: this.car.registration_number,
          is_registered: this.car.is_registered == 1 ? true : false,
        }),
        errors: null,
      };
    },

    methods: {
      submitForm() {
        this.form.put(`/cars/${this.car.id}`, {
          onSuccess: () => this.errors = null,
          onError: (errors) => {
            this.errors = errors;
          },
        });
      },
    },
  };
</script>

  