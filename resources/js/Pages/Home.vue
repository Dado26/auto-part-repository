<template>
    <Layout>
    <div class="container">
      <h1>Home</h1>
      
      <div class="row">
        <div class="col-md-6 mb-4">
          <div class="card">
            <div class="card-header">
              Car
            </div>
            <div class="card-body">
              <form>
                <div class="form-group">
                  <label for="make">Make:</label>
                  <select class="form-control" id="make" v-model="selectedMake" @change="updateModels">
                    <option disabled value="">Please select</option>
                    <option v-for="make in makes" :key="make.id" :value="make.id">{{ make.name }}</option>
                  </select>
                </div>
                <div class="form-group">
                  <label for="model">Model:</label>
                  <select class="form-control" id="model" v-model="selectedModel">
                    <option disabled value="">Please select</option>
                    <option v-for="model in parts" :key="model.id" :value="model">{{ model }}</option>
                  </select>
                </div>
              </form>
            </div>
          </div>
        </div>
        <div class="col-md-6 mb-4">
          <div class="card">
            <div class="card-header">
              Part
            </div>
            <div class="card-body">
              <form>
                <div class="form-group">
                  <label for="part">Part:</label>
                  <input type="text" class="form-control" id="part" v-model="selectedPart">
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
   </Layout>
  </template>
  
  <script>
  import Layout from './Layout.vue';

  export default {
    components: {
    Layout,
    },

    props: ['parts'],

    data() {
      return {
        makes: [
          { id: 1, name: "Toyota" },
          { id: 2, name: "Honda" },
          { id: 3, name: "Ford" }
        ],
        models: [],
        selectedMake: null,
        selectedModel: null,
        selectedPart: null
      };
    },

    methods: {
      updateModels() {
        if (this.selectedMake) {
          // In a real app, you would fetch the models for the selected make from an API
          this.models = [
            { id: 1, name: "Corolla" },
            { id: 2, name: "Camry" },
            { id: 3, name: "Rav4" }
          ];
        } else {
          this.models = [];
        }
        this.selectedModel = null;
      }
    }
  };

  </script>
  