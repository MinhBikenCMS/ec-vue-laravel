<template>
    <div class="products">
        <div class="loading" v-if="loading">
            Loading...
        </div>
        <div v-if="error" class="error">
            {{ error }}
        </div>
        <div class="row">
            <div class="col-md-3 text-center" v-if="products" v-for="{ id, name, price } in products">
                <img src="images/img_1.png" width="150px" height="150px">
                <br>
                {{ name }} - <strong>{{ price }}</strong>
                <br>
                <button class="btn btn-danger my-cart-btn" :data-id="id" :data-name="name" :data-price="price" :data-summary="id" :data-quantity="1" data-image="images/img_5.png">Add to Cart</button>
                <a href="#" class="btn btn-info">Details</a>
            </div>
        </div>
    </div>
</template>

<script>
    import axios from 'axios';
    export default {
        data() {
            return {
                loading: false,
                products: null,
                error: null,
            };
        },
        created() {
            this.fetchData();
        },
        methods: {
            fetchData() {
                this.error = this.products = null;
                this.loading = true;
                axios
                        .get('/products')
                        .then(response => {
                    this.loading = false;

                this.products = response.data;
            });
            }
        },
    }
</script>