<template>
  <Layout>
    <div class="container">
      <div class="card">
        <div
          class="alert alert-success d-flex justify-content-between align-items-center"
          v-if="$page.props.flash.message"
          role="alert"
        >
          {{ $page.props.flash.message }}
        </div>
        <div class="card-header">
          <h3>Edit Part</h3>
        </div>
        <div class="card-body">
          <form @submit.prevent="submitForm">
            <div class="form-group mb-4">
              <label for="name">Name:</label>
              <input
                type="text"
                class="form-control"
                id="name"
                v-model="form.name"
              />
            </div>
            <div class="form-group mb-4">
              <label for="serial_number">Serial Number:</label>
              <input
                type="text"
                class="form-control"
                id="serial_number"
                v-model="form.serial_number"
              />
            </div>
            <div class="form-group mb-4">
              <label for="car_id">Car</label>
              <select class="form-control" id="car_id" v-model="form.car_id">
                <option
                  v-for="(car, index) in cars"
                  :value="car.id"
                  v-bind:key="index"
                >
                  {{ car.name }}
                </option>
              </select>
              <div v-if="errors && errors.car_id" class="text-danger">
                {{ errors.car_id }}
              </div>
            </div>
            <button type="submit" class="btn btn-primary mt-2">Save</button>
          </form>
        </div>
      </div>
    </div>
  </Layout>
</template>

<script>
import Layout from '../Layout.vue'

export default {
  components: {
    Layout,
  },

  props: {
    part: Object,
    cars: Array,
  },

  data() {
    return {
      form: this.$inertia.form({
        _method: 'PUT',
        name: this.part.name,
        serial_number: this.part.serial_number,
        car_id: this.part.car.id,
      }),
    }
  },

  methods: {
    submitForm() {
      this.form.post(`/parts/${this.part.id}`)
    },
  },
}
</script>
