<template>
    <header class="bg-dark py-3">
      <div class="container">
        <div class="d-flex flex-wrap align-items-center justify-content-center justify-content-lg-start">
          <a class="d-flex align-items-center mb-2 mb-lg-0 text-white text-decoration-none" href="/">
            <svg class="bi me-2" width="40" height="32" role="img" aria-label="Bootstrap"><use xlink:href="#bootstrap"></use></svg>
            <span class="fs-4">Auto parts inventory</span>
          </a>
  
          <ul class="nav col-12 col-lg-auto me-lg-auto mb-2 justify-content-center mb-md-0 ms-auto">
            <li class="nav-item">
              <a class="nav-link px-2 text-white" href="/cars">Cars</a>
            </li>
            <li class="nav-item">
              <a class="nav-link px-2 text-white" href="/parts">Parts</a>
            </li>
          </ul>
        </div>
      </div>
    </header>
  </template>
  
  <script>

  export default {
    name: 'Header',
  };

  </script>  