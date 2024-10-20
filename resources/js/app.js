import './bootstrap';
import 'flowbite';
import Alpine from 'alpinejs';
import toastr from 'toastr';
import 'toastr/build/toastr.min.css';
import Swal from 'sweetalert2';

toastr.options = {
    "closeButton": true,
    "progressBar": true,
    "positionClass": "toast-top-right",
    "timeOut": "3000",
    "escapeHtml": false
};

window.Alpine = Alpine;
window.toastr = toastr;
window.Swal = Swal;


document.addEventListener('DOMContentLoaded', () => {
    Alpine.start();
});