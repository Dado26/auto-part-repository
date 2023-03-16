<template>
    <Layout>
      <div class="container">
        <div class="card">
          <div class="card-header">
            <h3>{{ part.name }}</h3>
          </div>
          <div class="card-body">
            <div class="row">
              <div class="col-md-6">
                <p><strong>Serial Number:</strong> {{ part.serial_number }}</p>
              </div>
            </div>
            <h5>Belong to car:</h5>
            <ul class="small">
                <li><p><strong>Name:</strong> {{ car.name }}</p> </li>
                <li> <p><strong>Registration number:</strong> {{ car.registration_number }}</p> </li>
                <li> <p><strong>Is registered:</strong> {{ car.is_registered ? 'Yes' : 'No' }}</p> </li>
                
            </ul>
            <div class="row mt-3">
              <div class="col-md-6">
                <a :href="'/parts/' + part.id + '/edit'" class="btn btn-primary m-2">Edit</a>
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
        part: Object,
        car: Object,
      },
    };

  </script>
  