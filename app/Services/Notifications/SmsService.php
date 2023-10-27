<?php

namespace App\Services\Notifications;

use stdClass;

class SmsService
{
    protected $apiKey = 'B593B4D1-1B1C-3060-8844-27CE3A27C1ED';

    public function __construct()
    {

    }

    public function sendMessage($phone, $message)
    {
        $smsru = new SMSRU('B593B4D1-1B1C-3060-8844-27CE3A27C1ED'); // Ваш уникальный программный ключ, который можно получить на главной странице

        $data = new stdClass();
        $data->to = $phone;
        $data->text = $message; // Текст сообщения

        $sms = $smsru->send_one($data); // Отправка сообщения и возврат данных в переменную

        if ($sms->status == "OK") { // Запрос выполнен успешно
            return true;
        } else {
            return $sms->status_text;
        }
    }
}
