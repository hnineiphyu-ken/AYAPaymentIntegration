<?php

return [
    'APP_TYPE' => 'uat',
    'uat' => [
        'access_token' => 'https://opensandbox.ayainnovation.com/token',
        'user_token' => 'https://opensandbox.ayainnovation.com/om/1.0.0/thirdparty/merchant/login',
        'push_payment' => 'https://opensandbox.ayainnovation.com/om/1.0.0/thirdparty/merchant/v2/requestPushPayment',
        'qr_payment' => 'https://opensandbox.ayainnovation.com/om/1.0.0/thirdparty/merchant/v2/requestQRPayment',
    ],
    'production' => [
        'access_token' => 'https://api.ayapay.com/token',
        'user_token' => 'https://api.ayapay.com/merchant/1.0.0/thirdparty/merchant/login',
        'push_payment' => 'https://api.ayapay.com/merchant/1.0.0/thirdparty/merchant/v2/requestPushPayment',
        'qr_payment' => 'https://api.ayapay.com/merchant/1.0.0/thirdparty/merchant/v2/requestQRPayment',
    ],
    'consumer_key' => 'YG4ZKc7XWb5CKLOeH8TeQB2KUWQa',
    'consumer_secret' => 'tzkZORt_xQoaE9caVxLltT9kxH8a',
    'user_id' => '20005890',
    'phone' => '09441114441',
    'password' => '991626',
    'servic_code_pin' => 'innwa-om',
    'servic_code_qr' => 'innwa-qr',
    'callback_key' => 'K6Iwh6ExTefaOTrMgNdZqvBmY96VUIc2'
];

?>