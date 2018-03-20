import Vue from 'vue';
import axios from 'axios';

const app = new Vue({
    el: '#app',
    data : {
        'search' : '',
        loading : true,
        postList: {
            data: null,
            page : 1,
            last_page : 1
        }
    },
    methods: {
        searchAjax: function (page) {

            if (typeof page === 'undefined') {
                page = 1;
            }

            axios
                .get('/products/show?q=' + this.search + '&page=' + page)
                .then(response => {
                    this.postList = response.data;
                    if( typeof response.data.data === 'undefined' || response.data.data.length == 0 ) {
                        this.loading = true;
                    } else {
                        this.loading = false;
                    }
            });
        }
    }
});