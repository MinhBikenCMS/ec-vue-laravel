<template>
    <div class="products">
        <div class="loading" v-if="loading">
            Loading...
        </div>

        <div v-if="error" class="error">
            {{ error }}
        </div>
        <div class="row">
            <div class="col-md-4" v-if="products" v-for="{ name, price } in products">
                <img src="img/no-thumbnail.jpg" alt="" class="img-thumbnail"/>
                <p>
                    {{ name }} giá {{ price }}
                <span style="float:right">
                    <button class="btn btn-primary">Add to Cart</button>
                </span>
                    <select name="qty" id="qty" style="float:right">
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                        <option value="4">4</option>
                        <option value="5">5</option>
                        <option value="6">6</option>
                        <option value="7">7</option>
                        <option value="8">8</option>
                        <option value="9">9</option>
                        <option value="10">10</option>
                    </select>
                </p>
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