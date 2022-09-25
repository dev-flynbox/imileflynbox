<?php
return [

    /*
    |--------------------------------------------------------------------------
    | Imile zcart configuration
    |--------------------------------------------------------------------------
    |
    |
    | Order types :
    | 100: Shipping Orders
    | 200: Return order
    | 400: Refund order
    | 800: Forward order
    |
    | Delivery Types :
    | Delivery: home delivery
    | Self: customer pick up
    |
    | Aging Code (Required for Mexico) :
    | ST: Standard Express
    | EX:express
    |
    | Consignor Country :
    | CHN: China
    | UAE: United Arab Emirates
    | KSA: Saudi Arabia
    | OMN: Oman
    | JOR: Jordan
    | KWT: Kuwait
    | MEX: Mexico
    | MAR: Morocco
    | BHR: Bahrain
    | QAT: Qatar
    |
    | Consignor Country (Receiving Country) :
    | UAE: United Arab Emirates
    | KSA: Saudi Arabia
    | OMN: Oman
    | JOR: Jordan
    | KWT: Kuwait
    | MEX: Mexico
    | MAR: Morocco
    | BHR: Bahrain
    | QAT: Qatar
    |
    | Payment Method :
    | 100: PPD (Prepaid)
    | 200: Cash (Cash On Delivery)
    |
    | Is Pick Up (Whether door-to-door pickup is required) :
    | 0:  not required
    | null: not required
    | 1: means required
    |
    */

    'imile_sandbox_url' => env('IMILE_ZCART_SANDBOX_URL', 'https://openapi.52imile.cn'),
    'imile_production_url' => env('IMILE_ZCART_PRODUCTION_URL', 'https://openapi.imile.com'),
    'imile_access_token' => env('IMILE_ZCART_ACCESS_TOKEN', ''),
    'imile_customer_id' => env('IMILE_ZCART_CUSTOMER_ID', ''),
    'imile_format' => env('IMILE_ZCART_FORMAT', 'json'),
    'imile_customer_secret' => env('IMILE_ZCART_CUSTOMER_SECRET', ''),
    'imile_api_version' => env('IMILE_ZCART_API_VERSION', 'V1.0.14'),
    'imile_sign_method' => env('IMILE_ZCART_SIGN_METHOD', 'MD5'),
    'imile_timezone' => env('IMILE_ZCART_TIMEZONE', '+4'),


    "imile_order_type" => env('IMILE_ORDER_TYPE'),
    "imile_old_express_no" => env('IMILE_OLD_EXPRESS_NO'),
    "imile_delivery_type" => env('IMILE_DELIVERY_TYPE'),
    "imile_aging_code" => env('IMILE_AGING_CODE'),
    "imile_consignor" => env('IMILE_CONSIGNOR'),
    "imile_consignor_contact" => env('IMILE_CONSIGNOR_CONTACT'),
    "imile_consignor_phone" => env('IMILE_CONSIGNOR_PHONE'),
    "imile_consignor_mobile" => env('IMILE_CONSIGNOR_MOBILE'),
    "imile_consignor_country" => env('IMILE_CONSIGNOR_COUNTRY'),
    "imile_consignor_city" => env('IMILE_CONSIGNOR_CITY'),
    "imile_consignor_area" => env('IMILE_CONSIGNOR_AREA'),
    "imile_consignor_address" => env('IMILE_CONSIGNOR_ADDRESS'),
    "imile_consignor_longitude" => env('IMILE_CONSIGNOR_LONGITUDE'),
    "imile_consignor_latitude" => env('IMILE_CONSIGNOR_LATITUDE'),
    "imile_consignor_zipcode" => env('IMILE_CONSIGNOR_ZIPCODE'),
    "imile_consignor_street" => env('IMILE_CONSIGNOR_STREET'),
    "imile_consignor_external_no" => env('IMILE_CONSIGNOR_EXTERNAL_NO'),
    "imile_consignor_ixternal_no" => env('IMILE_CONSIGNOR_IXTERNAL_NO'),
    "imile_payment_method" => env('IMILE_PAYMENT_METHOD'),
    "imile_is_pickup" => env('IMILE_IS_PICKUP'),


];
