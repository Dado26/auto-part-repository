import './bootstrap';
import 'bootstrap';
import '@popperjs/core';

import {createApp, h} from 'vue';
import {createInertiaApp} from '@inertiajs/inertia-vue3';

createInertiaApp({
  resolve: name => import(`./Pages/${name.replace(/^(.*)\/(.*)$/, '$1/$2.vue')}`),
  setup({el, app, props, plugin}) {
    return createApp({render: () => h(app, props)})
      .use(plugin)
      .mount(el);
  },
});