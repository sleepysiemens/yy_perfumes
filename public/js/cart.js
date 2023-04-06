$(document).ready(function () {
    updateCartDiv();

    $('.to-cart-btn').on('click', function () {
        let element = $(this);

        let productId = $(this).attr('data-product-id');
        let productPrice = $(this).attr('data-product-price');
        let productCount = 1;

        $.post(
            '/cart/push/' + productId + '/' + productCount,
            {},
            function (data) {
                $('#cart-container *').remove();
                updateCartDiv();
                console.log(data);
            }
        );
    });

    function updateCartDiv(data) {
        $.get(
            '/cart/get',
            {},
            function (data) {
                $('')

                var cart = JSON.parse(data);
                $('#cart-count').html(cart.quantity);

                $('#cart-container *').remove();

                // Вставляем добавленные товары
                Object.entries(cart.cart).forEach(([element, quantity]) => {
                    $.get(
                        '/api/products/' + element + '/' + localStorage.getItem('lang'),
                        {},
                        function (data) {
                            var item = data.data;
                            $('#cart-container').append(`
                                <div class="cart-item flex flex-row items-center mb-3">
                                    <img src="/storage/products/${item.img}" class="mr-2 rounded-md" width="50px" height="50px" alt="">
                                    <div class="flex flex-col">
                                        <span>${item.title}</span>
                                        <span class="text-slate-400 text-xs">${item.price}</span>
                                    </div>
                                </div>
                            `);
                        }
                    );
                });

                // Вставляем нижние итоги
                $('#cart-totals *').remove();
                $('#cart-totals').append(`<hr class="my-4">
                                            <div class="flex">
                                                <span class="w-1/2 whitespace-nowrap">Товаров:
                                                    <span class="font-bold">${cart.quantity}</span>
                                                </span>
                                                <span class="w-1/2 whitespace-nowrap">Итого:
                                                    <span class="font-bold">${cart.total}</span>
                                                </span>
                                            </div>
                                         `);
            }
        );

    }
});
