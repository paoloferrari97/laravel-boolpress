require('./bootstrap');

const app = new Vue({
    el: "#app",
    data: {},
    methods: {
        cancel(event) {
            let result = confirm('Sei sicuro di voler eliminare definitivamente questo post?');
            if (!result) {
                event.preventDefault();
            }
        }
    }
});