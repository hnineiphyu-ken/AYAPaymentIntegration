AYA Payment Integration Package
============

<!-- [![Latest Stable Version](https://packagist.org/packages/kennebula/ayapaymentintegration)] -->

Requirements
------------

* PHP >= 8.0;
* composer;

Features
--------

* PSR-4 autoloading compliant structure.
* Easy to use with Laravel framework.
* Useful tools for better code included.

Installation
============

    composer require kennebula/ayapaymentintegration

Set Up Tools
============

Running Command:
--------------------------

    php artisan vendor:publish --provider="KenNebula\AYAPaymentIntegration\PackageServiceProvider" --tag="config"

Config Output
----------

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

* This command will create aya.php file inside config folder like this, 

* Important - You need fill the aya info in this config file for package usage.

Package Usage
------------

Get Access Token :
----------------

    use KenNebula\AYAPaymentIntegration\AYA;

    AYA::getAccessToken();

Load Output 
---------

* This will return json array include the following field.
        { 
            "access_token": "6c8e0cac-7fb8-3751-80df-5cec3dbc7dd7", 
            "scope": "am_application_scope default", 
            "token_type": "Bearer", 
            "expires_in": 3600 
        }     
* Each data can be change according to provider's response.

Get User Token :
----------------

    use KenNebula\AYAPaymentIntegration\AYA;

    AYA::getUserToken(@String $access_token);

* Note 

* access_token must be string.

Load Output 
---------

* This will return json array include the following field.
        { 
            "err": 200, 
            "message": "Success", 
            "token": { 
                "token": "5e2f768a-5228-49ca-b228-3fc1eaa27373", 
                "expiredAt": "2020-02-06T01:35:40.545Z" 
                }, 
        }   
* Each data can be change according to provider's response.

Send payment with (pin):
----------------

    use KenNebula\AYAPaymentIntegration\AYA;

    AYA::pushPayment(@String $amount, @String $order_no, @String $customer_phone, @String $access_token, @String $user_token);

* Note 

* amount must be string.
* order_no must be integer.
* customer_phone must be string.
* access_token must be string.
* user_token must be string.

Load Output 
---------

* This will return json array include the following field.
        { 
            "err": 200, 
            "message": "Success",  
            "data": { 
                "externalTransactionId": "HD100001", 
                "referenceNumber": "5e816c06959b1f3db0113a7e" 
            } 
        }    
* Each data can be change according to provider's response.

Send payment with (qr):
----------------

    use KenNebula\AYAPaymentIntegration\AYA;

    AYA::qrPayment(@String $amount, @String $order_no, @String $access_token, @String $user_token);

* Note 

* amount must be string.
* order_no must be integer.
* access_token must be string.
* user_token must be string.

Load Output 
---------

* This will return json array include the following field.
        { 
            "err": 200, 
            "message": "Success", 
            "data": { 
                "status": 0, 
                "qrdata":  "000201010212514200245d83683da3b8053cb768ef200110L3K4237989520430095405100005802MM5908HoangND6003Mon62720111123456543210309storeshop051206805361754150245e216cc54d067ef2b7adafb264180002en0108Hoang ND6304e1f6", 
                "amount": 10000, 
                "fees": { 
                    "debitFee": 200, 
                    "creditFee": 0 
                }, 
                "type": "online_merchant", 
                "expiredAt": "2020-02-26T09:19:57.541Z", 
                "action": "paymentCode", 
                "externalTransactionId": "HD10001", 
                "referenceNumber": "068053617541" 
                } 
            }    
* Each data can be change according to provider's response.

License
=======

KenNebula Reserved Since 2024.