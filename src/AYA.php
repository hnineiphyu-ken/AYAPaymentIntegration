<?php
namespace KenNebula\AYAPaymentIntegration;

use ErrorException;
use Illuminate\Support\Facades\Http;

class AYA {
    public static function test()
    {
        return "ken nebula test";
    }

    /**
     * return Json (access_token, scope, token_type, expires_in)
     */
    public static function getAccessToken() : Array
    {
        $app_type = config('APP_TYPE');
        $url = config('aya.'.$app_type.'.access_token');
        $body = [
            "grant_type" =>  "client_credentials"
        ];
        $response = Http::withHeaders([
            "Content-Type" => "application/x-www-form-urlencoded",
            "Authorization" => "Basic ".self::base64(),
        ])->asForm()->post($url, $body);
        $responseJson = $response->json();

        return $responseJson;
    }

    /**
     * parameter $access_token ('access_token' get from getAccessToken Function)
     * return Json (err, message, token['token', 'expiredAt'])
     */
    public static function getUserToken(String $access_token) : Array
    {
        $app_type = config('APP_TYPE');
        $url = config('aya.'.$app_type.'.user_token');
        $body = [
            "phone" =>  config('aya.phone'),
            "password" =>  config('aya.password')
        ];
        $response = Http::withHeaders([
            "Content-Type" => "application/json",
            "Token" => "Bearer ".$access_token,
        ])->post($url, $body);
        $responseJson = $response->json();
        
        return $responseJson;
    } 
    /**
     * AYA Pay payment with pin
     * parameters 
     * $amount (total amount)
     * $order_no (order no)
     * $customer_phone (the phone number of the customer to whom the payment will be made)
     * $access_token ('access_token' get from getAccessToken Function)
     * $user_token ('user_token' get from getAccessToken Function)
     * return Json (err, message, data['externalTransactionId', 'referenceNumber'])
     */
    public static function pushPayment(String $amount, String $order_no, String $customer_phone, String $access_token, String $user_token) : Array
    {
        $app_type = config('APP_TYPE');
        $url = config('aya.'.$app_type.'.push_payment');
        $body = [
            "serviceCode" => config('aya.servic_code_pin'),
            "amount" => $amount,
            "externalTransactionId" => $order_no,
            "customerPhone" => $customer_phone,
            "currency" => "MMK",
        ];
        $response = Http::withHeaders([
            "Content-Type" => "application/json",
            "Accept-Language" => "en",
            "Authorization" => "Bearer ".$user_token,
            "Token" => "Bearer ".$access_token,
        ])->post($url, $body);
        $responseJson = $response->json();
        return $responseJson;
    } 

    /**
     * AYA Pay payment with QR Code
     * parameters 
     * $amount (total amount)
     * $order_no (order no)
     * $access_token ('access_token' get from getAccessToken Function)
     * $user_token ('user_token' get from getAccessToken Function)
     * return Json (err, message, data['status', 'qrdata', 'amount', 'fees', 'type', 'expiredAt', 'action', 'externalTransactionId', 'referenceNumber'])
     */
    public static function qrPayment(String $amount, String $order_no, String $access_token, String $user_token) : Array
    {
        $app_type = config('APP_TYPE');
        $url = config('aya.'.$app_type.'.qr_payment');
        $body = [
            "serviceCode" => config('aya.servic_code_qr'),
            "amount" => $amount,
            "externalTransactionId" => $order_no,
            "currency" => "MMK",
        ];
        $response = Http::withHeaders([
            "Content-Type" => "application/json",
            "Accept-Language" => "en",
            "Authorization" => "Bearer ".$user_token,
            "Token" => "Bearer ".$access_token,
        ])->post($url, $body);
        $responseJson = $response->json();
        return $responseJson;
    } 
    
    private static function base64() : String 
    {
        $encoded = "";
        $consumer_key = config('aya.consumer_key');
        $consumer_secret = config('aya.consumer_secret');
        $encoded = base64_encode($consumer_key.':'.$consumer_secret);   

        return $encoded;
    }

    public static function checkConfigData(){
        $config_data = [
            "APP_TYPE" => config('aya.APP_TYPE'),
            "uat.access_token" => config('aya.uat.access_token'),
            "uat.user_token" => config('aya.uat.user_token'),
            "uat.push_payment" => config('aya.uat.push_payment'),
            "uat.qr_payment" => config('aya.uat.qr_payment'),
            "production.access_token" => config('aya.production.access_token'),
            "production.user_token" => config('aya.production.user_token'),
            "production.push_payment" => config('aya.production.push_payment'),
            "production.qr_payment" => config('aya.production.qr_payment'),
            "consumer_key" => config('aya.consumer_key'),
            "consumer_secret" => config('aya.consumer_secret'),
            "user_id" => config('aya.user_id'),
            "phone" => config('aya.phone'),
            "password" => config('aya.password'),
            "servic_code_pin" => config('aya.servic_code_pin'),
            "servic_code_qr" => config('aya.servic_code_qr'),
            "callback_key" => config('aya.callback_key'),
        ];
       
        foreach($config_data as $key => $data){
            $data == null ? throw new ErrorException($key . ' cannot be null in config/aya.php') : '';
        }
    }

}