import 'bootstrap';
import '@fortawesome/fontawesome-free/js/all';
import './bootstrap';
import ClientsTable from "../components/ClientsTable";
import ClientsForm from "../components/ClientsForm";
import VModal from 'vue-js-modal/dist/index.nocss.js';
import Reservations from "../components/Reservations";

Vue.component('clients-table', ClientsTable);
Vue.component('clients-form', ClientsForm);
Vue.component('reservations', Reservations);
Vue.use(VModal, {dialog: true});

new Vue({
    el: '#app',
});

