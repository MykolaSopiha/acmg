
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

Vue.component('example', require('./components/Example.vue'));

const app = new Vue({
    el: '#app'
});


import 'select2';
$.fn.select2.defaults.set( "theme", "bootstrap4" );


$(document).ready(function () {

    $('.js-select').each(function (index, element) {
        $(element).select2({
            placeholder: $(element).data('placeholder')
        });
    });

    $("#alertsDropdown").click(function () {
        $.get('/markAsRead');
    });

    $('.numberInput').on('keypress', function (event) {
        return event.charCode >= 48 && event.charCode <= 57
    });

    $('[data-toggle="popover"]').popover();

    $('.btn-confirm-account').click(function (e) {
        e.preventDefault();
        let confirmLink = $(this).data('link');
        alert(confirmLink);

    });

});
