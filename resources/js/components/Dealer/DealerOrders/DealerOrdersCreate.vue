<template>
    <div class="row">
        <div class="col-lg-12">
            <h4 class="mt-2 mb-4">Оформление дилерского заказа</h4>
        </div>
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header d-flex justify-content-between">
                    <div class="title">Список товаров</div>
                    <button class="btn btn-primary" @click="createOrder" :disabled="this.cart.length < 1">
                        Отправить заказ
                    </button>
                </div>
                <div class="card-body">
                    <table class="table table-hover" border="1" cellpadding="2">
                        <thead>
                        <tr>
                            <th>Товар</th>
                            <th style="width: 200px;">Розничная цена</th>
                            <th style="width:200px;">Цена дилера</th>
                            <th style="width: 150px"></th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr v-for="product in products">
                            <td><img :src="product.img" style="width:60px;border-radius: 8px;margin-right: 15px;" alt="">{{ product.title }}</td>
                            <td>{{ Number(product.guest_price).toFixed(2) }}</td>
                            <td>{{ product.formatted_price }} (-{{ (product.guest_price - product.price).toFixed(2) }})</td>
                            <td><a href="javascript:void(0);" @click="addToCart(product)">+ Добавить</a></td>
                        </tr>
                        </tbody>
                    </table>
                    <p class="text-danger mb-0" v-if="cart.length < 1">Выберите товар, который хотите заказать.</p>
                </div>
            </div>
        </div>
        <div class="col-lg-12 mt-3">
            <div class="card">
                <div class="card-header">
                    <div class="title">Корзина</div>
                </div>
                <div class="card-body">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Товар</th>
                                <th style="width:200px;">Цена</th>
                                <th style="width:200px;">Итог</th>
                                <th style="width:200px;">Количество</th>
                                <th style="width: 150px;"></th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr v-for="(product, index) in cart">
                                <td><img :src="product.img" style="width:60px;border-radius: 8px;margin-right: 15px;" alt="">{{ product.title }}</td>
                                <td>{{ product.formatted_price }}</td>
                                <td>{{ (product.price * product.count).toFixed(2) }}</td>
                                <td><input type="number" v-model="product.count" class="form-control" style="width:150px;"></td>
                                <td><a href="javascript:void(0);" class="text-danger" @click="removeFromCart(index)">Убрать</a></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div class="col-lg-12 mt-3">
            <div class="card">
                <div class="card-header">
                    <div class="title">Итого</div>
                </div>
                <div class="card-body">
                    <p class="mb-0"><b>Итоговая цена:</b> {{ total.toFixed(2) }}</p>
                    <p><b>Итоговая экономия:</b> {{ totalProfit.toFixed(2) }}</p>
                </div>
                <div class="card-footer d-flex justify-content-end">
                    <button class="btn btn-primary" @click="createOrder" :disabled="this.cart.length < 1">
                        Отправить заказ
                    </button>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    data() {
        return {
            products: [],
            cart: [],
        }
    },
    created() {
        axios.get('/dealer/products/')
            .then(response => {
                console.log(response.data);
                this.products = response.data.data;
            });
    },
    methods: {
        createOrder() {
            let data = {
                cart: this.cart,
                total: this.total.toFixed(2),
                profit: this.totalProfit.toFixed(2),
            };

            console.log(data);

            axios.post('/dealer/dealer-orders', data)
                .then(response => {
                    console.log(response.data);
                    window.location.href = '/dealer/dealer-orders/' + response.data.id;
                });
        },
        addToCart(product) {
            console.log(product);
            this.cart.push(product);
        },
        removeFromCart(index) {
            this.cart.splice(index, 1);
        },
    },
    computed: {
        total() {
            return this.cart.reduce((total, item) => total + ((parseFloat(item.price) * item.count)), 0);
            // return this.cart.reduce((total, item) => total + ((parseFloat(item.price) * item.count) - parseFloat(item.guest_pric) * item.count), 0);
        },
        totalProfit() {
            return this.cart.reduce((total, item) => total + ((parseFloat(item.guest_price) * item.count) - parseFloat(item.price) * item.count), 0);
        }
    },
}
</script>

<style>
.table{
    border: 1px solid #eee;
    table-layout: fixed;
    width: 100%;
    margin-bottom: 20px;
}
.table th {
    font-weight: bold;
    padding: 5px;
    background: #efefef;
    border: 1px solid #dddddd;
}
.table td{
    padding: 5px 10px;
    border: 1px solid #eee;
    text-align: left;
}
.table tbody tr:nth-child(odd){
    background: #fff;
}
.table tbody tr:nth-child(even){
    background: #F7F7F7;
}
</style>
