<template>
    <form v-on:submit="saveForm()">
        <input type="hidden" name="cart" id="cart" v-model="order.cart"/>
        <h1> Info cart </h1>
        <div class="row">
            <div class="col-md-12">
                <table class="table table-hover table-responsive my-cart-table">

                </table>
            </div>
        </div>
        <h1> Info delivery </h1>
        <div class="row">
            <div class="col-md-12">
                <div class="form-group">
                    <label for="phone">Phone: </label>
                    <input type="number" class="form-control" required name="phone" id="phone" v-model="order.phone"/>
                </div>
            </div>
            <div class="col-md-12">
                <div class="form-group">
                    <label for="phone">Address: </label>
                    <input type="text" class="form-control" required name="address" id="address" v-model="order.address"/>
                </div>
            </div>
            <div class="col-md-12">
                <div class="form-group">
                    <input type="submit" class="btn btn-default" required name="submit" id="submit"/>
                </div>
            </div>
        </div>
    </form>
</template>
<script type="text/javascript">
    import axios from 'axios';
    export default {
        data: function () {
            return {
                order: {
                    phone: '',
                    address: '',
                    cart: localStorage.products
                }
            }
        },
        methods: {
            saveForm() {
                event.preventDefault();
                var app = this;
                var newOrder = app.order;
                axios.post('/order', newOrder)
                        .then(function (resp) {
                            localStorage.clear();
                            window.location.href = '/shop';
                        })
                        .catch(function (resp) {
                            console.log(resp);
                            alert("Could not create your order");
                        });
            }
        }
    }
</script>