<template>
  <Layout>
    <div class="container">
      <div class="card">
        <div class="card-header">
          <h3>{{ car.name }}</h3>
        </div>
        <div class="card-body">
          <div class="row">
            <div class="col-md-6">
              <p>
                <strong>Registration Number:</strong>
                {{ car.registration_number }}
              </p>
              <p>
                <strong>Is Registered:</strong>
                {{ car.is_registered ? 'Yes' : 'No' }}
              </p>
            </div>
            <div v-if="parts.length">
              <h5>Parts:</h5>
              <ul class="small">
                <div v-for="part in parts" :key="part.id">
                  <li>
                    <p>
                      <strong>Name:</strong>
                      {{ part.name }}
                    </p>
                  </li>
                  <li>
                    <p>
                      <strong>Serial Number:</strong>
                      {{ part.serial_number }}
                    </p>
                  </li>
                  <hr>
                </div>
              </ul>
            </div>
            <div v-else>
              <p>No parts found for this car.</p>
            </div>
          </div>
          <div class="row mt-3">
            <div class="col-md-6">
              <a
                :href="'/cars/' + car.id + '/edit'"
                class="btn btn-primary m-2"
              >
                Edit
              </a>
            </div>
          </div>
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
    car: Object,
    parts: Object,
  },
}
</script>
