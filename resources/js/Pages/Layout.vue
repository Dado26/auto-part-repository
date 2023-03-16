<template>
    <div>
      <Header />
      <div class="container py-4">
        <Sidebar />
        <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
            <slot></slot>
        </main>
      </div>
      <Footer />
    </div>
  </template>
  

  <script>

  import Header from './Header.vue';
  import Sidebar from './SideBar.vue';
  import Footer from './Footer.vue';
  
  export default {
    name: 'Layout',
    components: {
      Header,
      Sidebar,
      Footer,
    },
  };

  </script>
  