<?php

return [
    'order_statuses' => [
        1 => [
            'title' => 'Ожидание оплаты',
            'send_msg' => false,
        ],
        2 => [
            'title' => 'Оплачен',
            'send_msg' => true,
            'msg' => 'Ваш заказ оплачен и передан в обработку',
        ],
        3 => [
            'title' => 'В обработке',
            'send_msg' => false,
        ],
        4 => [
            'title' => 'Передан в доставку',
            'send_msg' => true,
            'msg' => 'Ваш заказ передан в доставку %track_url%',
        ],
        5 => [
            'title' => 'Завершён',
            'send_msg' => true,
            'msg' => 'Пожалуйста, оцените работу магазина %review_send_url%',
        ],
    ],

    'payment_methods' => [
        1 => [
            'title' => 'YooKassa',
            'desc' => 'Оплата онлайн через кассу.',
        ],
        2 => [
            'title' => 'Оплата при получении',
            'desc' => 'Оплата наличными в пункте самовывоза.',
        ],
    ],
];
