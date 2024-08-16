<?php

return [
    #to fill app type (uat or production)
    'APP_TYPE' => null,
    'uat' => [
        #to fill access token of uat url
        'access_token' => null,
        #to fill user token of uat url
        'user_token' => null,
        #to fill push payment (pin) of uat url
        'push_payment' => null,
        #to fill qr payment of uat url
        'qr_payment' => null,
    ],
    'production' => [
        #to fill access token of production url
        'access_token' => null,
        #to fill user token of production url
        'user_token' => null,
        #to fill push payment (pin) of production url
        'push_payment' => null,
        #to fill qr payment of production url
        'qr_payment' => null,
    ],
    #to fill merchant's consumer key
    'consumer_key' => null,
    #to fill merchant's consumer secret
    'consumer_secret' => null,
    #to fill merchant's user id
    'user_id' => null,
    #to fill merchant's phone
    'phone' => null,
    #to fill merchant's password
    'password' => null,
    #to fill merchant's service code for pin
    'servic_code_pin' => null,
    #to fill merchant's service code for qr
    'servic_code_qr' => null,
    #to fill call back key to decrypt call back response
    'callback_key' => null
];

?>