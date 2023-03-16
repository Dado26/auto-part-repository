<template>
    <nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse">
    <div class="position-sticky pt-3">
      <ul class="nav flex-column">
        <li class="nav-item">
          <a class="nav-link text-dark font-weight-bold" href="/cars">
            <i class="bi bi-car mr-2"></i> Cars
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link text-dark font-weight-bold" href="/parts">
            <i class="bi bi-tools mr-2"></i> Parts
          </a>
        </li>
      </ul>
    </div>
  </nav>
  </template>
  
  <script>

  export default {
    name: 'Sidebar'
  }

  </script>