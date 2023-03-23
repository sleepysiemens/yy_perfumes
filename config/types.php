<?php

return [
    /*
     *  Задаем цены для каждого типа пользователя
     *  $userType => $priceColumn
     */
    'prices' => [
        'client' => 'cost',
        'dealer' => 'cost_dealer',
        'vip' => 'cost_vip_dealer',
    ],
];
