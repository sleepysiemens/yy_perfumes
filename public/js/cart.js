$(document).ready(function () {
    updateCartDiv();

    $('.to-cart-btn').on('click', function () {
        let element = $(this);

        let productId = $(this).attr('data-product-id');
        let productPrice = $(this).attr('data-product-price');
        let productCount = 1;

        $.post(
            '/api/cart/push/' + productId + '/' + productCount,
            {},
            function (data) {
                // updateCartDiv();
                console.log(data);
            }
        );
    });

    function updateCartDiv(data) {
        $.get(
            '/api/cart/get',
            {},
            function (data) {
                console.log(data);
                // var cart = JSON.parse(data);
                // $('#cart-count').html(cart.quantity);
            }
        );

    }
});
