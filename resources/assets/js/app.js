
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

Vue.component('ast-bet-on-odd', require('./components/AstBetOnOdd.vue'));

const app = new Vue({
    el: '#app',

    data: {
        playerInfo: {
            playerId: document.getElementById('user_id').value,
            credit: 0,
        },
        gameInfo: {
            gameId: 0,
        }
    },

    methods: {

        onBet: function onBet(betData) {
            axios.post('http://sb.app/bet', betData)
            .then((response) => {
                console.log(response);
            })
            .catch((response) => {
                //this.errors.push(e)
                console.log(response);
            });
        },
    }
});
