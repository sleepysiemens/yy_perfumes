<template>
    <form :action="submit" method="post" class="lg:w-1/3 lg:mb-0 mx-auto w-full mb-5">
        <input type="text" name="_token" :value="csrf" hidden="hidden">
        <h1 class="text-xl font-semibold mb-5">Оформление заказа</h1>

        <!-- TECH INPUTS -->
        <input type="text" name="pvz_id">
        <input type="text" name="pvz_address">

        <div class="form-group">
            <label for="" class="font-medium">Имя</label>
            <input type="text" name="name" class="w-full bg-zinc-100 mt-1 py-2 pl-3 font-medium outline-none border-2 border-zinc-0 duration-200 focus:border-zinc-600" placeholder=""
                   value="">
        </div>
        <div class="form-group mt-3">
            <label for="" class="font-medium">Номер телефона</label>
            <input type="text" name="phone" class="w-full bg-zinc-100 mt-1 py-2 pl-3 font-medium outline-none border-2 border-zinc-0 duration-200 focus:border-zinc-600" placeholder=""
                   value="">
        </div>
        <div class="form-group mt-3">
            <label for="" class="font-medium">Электронная почта</label>
            <input type="email" name="email" class="w-full bg-zinc-100 mt-1 py-2 pl-3 font-medium outline-none border-2 border-zinc-0 duration-200 focus:border-zinc-600" placeholder=""
                   value="">
        </div>
        <div class="form-group mt-3">
            <label for="" class="font-medium">Выберите магазин в городе получения</label>
            <select name="shop" class="w-full bg-zinc-100 mt-1 py-2 pl-3 font-medium outline-none border-2 border-zinc-0 duration-200 focus:border-zinc-600">
                <option :value="shop.id" v-for="shop in shops">
                    {{ shop.full_title }}
                </option>
            </select>
        </div>
        <div class="mt-2 mb-3">
            <label for="">Страна</label>
            <select name="" id="" v-model="selectedCountry" class="w-full bg-zinc-100 mt-1 py-2 pl-3 font-medium outline-none border-2 border-zinc-0 duration-200 focus:border-zinc-600">
                <option v-for="country in sdekCountries" :value="country.alpha2">{{ country.name }}</option>
            </select>
        </div>
        <div class="mt-2 mb-3" v-if="sdekCities.length > 0">
            <label for="">Город или регион</label>
            <select name="city" id="" v-model="selectedCity" class="w-full bg-zinc-100 mt-1 py-2 pl-3 font-medium outline-none border-2 border-zinc-0 duration-200 focus:border-zinc-600">
                <option v-for="city in sdekCities" :value="city.region_code">{{ city.region }}</option>
            </select>
        </div>
        <div class="mt-2 mb-3" v-if="sdekVillages.length > 0">
            <label for="village">Выберите населенный пункт</label>
            <select name="" id="" v-model="selectedVillage" class="w-full bg-zinc-100 mt-1 py-2 pl-3 font-medium outline-none border-2 border-zinc-0 duration-200 focus:border-zinc-600">
                <option v-for="village in sdekVillages" :value="village.code">{{ village.city }}</option>
            </select>
        </div>
        <div class="form-group mt-3">
<!--            <label for="" class="font-medium">Адрес</label>-->
            <!--            <input type="text" name="address" class="w-full bg-zinc-100 mt-1 py-2 pl-3 font-medium outline-none border-2 border-zinc-0 duration-200 focus:border-zinc-600" placeholder="{{ __('Город') }}">-->
            <!--            <input type="text" name="address" class="w-full bg-zinc-100 mt-1 py-2 pl-3 font-medium outline-none border-2 border-zinc-0 duration-200 focus:border-zinc-600" placeholder="{{ __('Адрес') }}">-->
            <!--            <input type="text" name="address" class="w-full bg-zinc-100 mt-1 py-2 pl-3 font-medium outline-none border-2 border-zinc-0 duration-200 focus:border-zinc-600" placeholder="{{ __('Почтовый индекс') }}">-->
        </div>
        <h4 class="font-weight-bold mt-3">Выберите способ доставки</h4>
        <div class="mt-5 mb-3 flex flex-wrap">
            <template v-for="method in deliveryMethods">
                <template v-for="deliveryMethod in method">
                    <label class="radio-select-large" v-if="deliveryMethod.active === true">
                        <input class="radio-select-large-input" type="radio" name="delivery_method" :value="deliveryMethod.method" @click="setDeliveryMethod(deliveryMethod.method)" checked>
                        <div class="radio-select-large-content">
                            <strong class="radio-select-large-title">{{ deliveryMethod.title }}</strong>
                        </div>
                    </label>
                </template>
            </template>
        </div>
        <div class="mb-5">
            <template v-if="deliveryMethod === 'delivery'">
                <div class="form-group mt-3">
                    <b class="fs-1">Укажите адрес доставки</b>
                    <br>
                    <label for="">Улица</label>
                    <input type="text" name="email" class="mb-3 w-full bg-zinc-100 mt-1 py-2 pl-3 font-medium outline-none border-2 border-zinc-0 duration-200 focus:border-zinc-600" placeholder=""
                           value="">
                    <label for="">Дом, подъезд, офис/квартира</label>
                    <input type="text" name="email" class="w-full bg-zinc-100 mt-1 py-2 pl-3 font-medium outline-none border-2 border-zinc-0 duration-200 focus:border-zinc-600" placeholder=""
                           value="">
                </div>
            </template>


            <!-- SDEK -->
            <template v-else-if="deliveryMethod === 'sdek_pickup'">
                <b>Выберите пункт выдачи СДЭК</b>
                <div v-if="sdekPoints.length > 0">
                    <label for="">Выберите пункт выдачи</label>
                    <select name="" id="" v-model="selectedSdekPoint" class="w-full bg-zinc-100 mt-1 py-2 pl-3 font-medium outline-none border-2 border-zinc-0 duration-200 focus:border-zinc-600">
                        <option v-for="(point, index) in sdekPoints" :value="index">{{ point.location.address }} </option>
                    </select>
                </div>
                <div class="mt-3 mb-3 border p-3" v-if="Object.entries(sdekPointInfo).length > 0">
                    <h4 class="font-bold">{{ sdekPointInfo.location.address_full }}</h4>
                    <p>{{ sdekPointInfo.note }}</p>
                    <hr class="mt-2">
                    <p class="mt-2">Время работы: {{ sdekPointInfo.work_time }}</p>
                    <p class="mt-2">Оплата наличными: <span v-if="sdekPointInfo.have_cash === true">Есть</span><span v-else>Нет</span></p>
                    <p class="mt-2">Терминал оплаты: <span v-if="sdekPointInfo.have_cashless === true">Есть</span><span v-else>Нет</span></p>
                </div>
            </template>



            <template v-else-if="deliveryMethod === 'pickup'">
                <b>Самовывоз из выбранного магазина в поле <br> "Выберите магазин"</b>
            </template>
        </div>
        <div class="my-3 mb-5">
            <a href="">Оформляя заказ, я соглашаюсь с условиями сайта и обработки персональных данных</a>
        </div>
        <button class="to-cart-btn whitespace-nowrap p-2 px-5 bg-zinc-900 hover:bg-zinc-700 active:scale-95 text-white duration-200 flex items-center">Оформить заказ</button>
    </form>
</template>
<script>
export default {
    props: [
        'csrf',
        'submit'
    ],
    data() {
        return {
            shops: [],

            deliveryMethods: {
                delivery: [
                    {
                        title: 'СДЭК: Доставка по адресу',
                        method: 'delivery',
                        active: true,
                    }
                ],
                sdekPickup: [
                    {
                        title: 'СДЭК: Доставка до пункта выдачи',
                        method: 'sdek_pickup',
                        active: false,
                    }
                ],
                pickup: [
                    {
                        title: 'Самовывоз из магазина',
                        method: 'pickup',
                        active: true,
                    }
                ]
            },
            deliveryMethod: 'pickup',

            // Sdek
            sdekCountries: [],
            sdekCities: [],
            sdekVillages: [],
            sdekPoints: [],

            selectedCountry: '',
            selectedCity: '',
            selectedVillage: '',
            selectedSdekPoint: '',

            sdekPointInfo: {},
        }
    },
    created() {
        console.log(this.deliveryMethods);

        axios.get('/api/sdek/countries/')
            .then(response => {
                console.log(response);
                this.sdekCountries = response.data;
            });

        axios.get('/api/shops')
            .then(response => {
                this.shops = response.data.data;
                console.log(response);
                console.log(response);
            });
    },
    methods: {
        setDeliveryMethod(method) {
            this.deliveryMethod = method
        },
        countrySelected() {
            axios.get('/api/sdek/cities/' + this.selectedCountry)
                .then(response => {
                    console.log(response);
                    this.sdekCities = response.data;
                });
        },
        citySelected() {
            this.deliveryMethods.sdekPickup[0].active = false;
            this.deliveryMethods.sdekPickup[0].delivery = false;

            this.sdekVillages = [];
            this.sdekPoints = [];
            this.sdekPointInfo = [];

            axios.get('/api/sdek/villages/' + this.selectedCity)
                .then(response => {
                    console.log(response);
                    this.sdekVillages = response.data;
                });
        },
        villageSelected() {
            this.deliveryMethods.sdekPickup[0].active = false;
            this.deliveryMethods.sdekPickup[0].delivery = false;

            this.sdekPoints = [];
            this.sdekPointInfo = [];

            axios.get('/api/sdek/points/' + this.selectedVillage)
                .then(response => {
                    console.log(response);

                    if (response.data.length < 1) {
                        this.deliveryMethods.sdekPickup[0].active = false;
                        this.deliveryMethods.sdekPickup[0].delivery = false;
                    } else {
                        this.deliveryMethods.sdekPickup[0].active = true;
                        this.deliveryMethods.sdekPickup[0].delivery = true;
                    }

                    console.log(this.deliveryMethods.sdekPickup)

                    this.sdekPoints = response.data;
                });
        },
        pointSelected() {
            this.sdekPointInfo = this.sdekPoints[this.selectedSdekPoint];
            console.log(this.sdekPointInfo);
        },
    },
    watch: {
        selectedCity: 'citySelected',
        selectedVillage: 'villageSelected',
        selectedSdekPoint: 'pointSelected',
        selectedCountry: 'countrySelected',
    }
}
</script>
