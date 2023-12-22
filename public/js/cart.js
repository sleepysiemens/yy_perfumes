$(document).ready(function () {
    updateCartDiv();

    $('.to-cart-btn').on('click', function () {
        let element = $(this);

        let productId = $(this).attr('data-product-id');
        let productPrice = $(this).attr('data-product-price');
        let productCount = 1;
        if(document.getElementById('product_amount_'+productId)!=null)
            productCount = document.getElementById('product_amount_'+productId).value;

        $.post(
            '/cart/push/' + productId + '/' + productCount,
            {},
            function (data) {
                $('#cart-container *').remove();
                updateCartDiv();
            }
        );
    });

    function updateCartDiv(data) {
        $.get(
            '/cart/get',
            {},
            function (data) {
                var cart = JSON.parse(data);
                $('#cart-count').html(cart.quantity);

                $('#cart-container *').remove();

                // Если товаров нет
                console.log(cart.cart);
                // <p className="font-semibold">В корзине еще нет товаров</p>
                if (cart.cart === null) {
                    $('#cart-container').append(`
                                <p className="font-semibold">В корзине еще нет товаров</p>
                            `);
                } else {
                    // Вставляем добавленные товары
                    Object.entries(cart.cart).forEach(([element, quantity]) => {
                        $.get(
                            '/api/products/' + element + '/' + localStorage.getItem('lang'),
                            {},
                            function (data) {
                                var item = data.data;

                                $('#cart-container').append(`
                                <div class="cart-item flex flex-row items-center mb-3">
                                    <img src="${item.img}" class="mr-2 rounded-md" width="50px" height="50px" alt="">
                                    <div class="flex flex-col">
                                        <span>${item.title}</span>
                                        <span class="text-slate-400 text-xs">${(item.price).toFixed(2)}</span>
                                    </div>
                                </div>
                            `);
                            }
                        );
                    });
                }

                // Вставляем нижние итоги
                $('#cart-totals *').remove();
                $('#cart-totals').append(`<hr class="my-4">
                                            <div class="flex">
                                                <span class="w-1/2 whitespace-nowrap">Товаров:
                                                    <span class="font-bold">${cart.quantity}</span>
                                                </span>
                                                <span class="w-1/2 whitespace-nowrap">Итого:
                                                    <span class="font-bold">${(cart.total).toFixed(2)}</span>
                                                </span>
                                            </div>
                                         `);
            }
        );

    }
});

function press_btn()
{
    $('.to-cart-btn').trigger("click");
}

for(let cnt=1; cnt<=4; cnt++)
{
    $('#product_amount_'+cnt).on('change',function (){
        $('#add_to_card_'+cnt).trigger("click");
    });
}
