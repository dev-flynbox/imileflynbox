<?php

namespace DevFlynbox\Imileflynbox;

use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Session;
use DevFlynbox\Imileflynbox\Models\SystemImile;

class Imileflynbox
{
    private static $get_access_token_url = '';
    private static $add_consignor_url = '';
    private static $create_order_url = '';
    private static $delete_order_url = '';
    private static $track_order_url = '';
    private static $access_token = null;
    private static $access_token_expire_time = null;

    private static $imile_order_type = null;
    private static $imile_old_express_no = null;
    private static $imile_delivery_type = null;
    private static $imile_aging_code = null;
    private static $imile_consignor = null;
    private static $imile_consignor_contact = null;
    private static $imile_consignor_phone = null;
    private static $imile_consignor_mobile = null;
    private static $imile_consignor_country = null;
    private static $imile_consignor_city = null;
    private static $imile_consignor_area = null;
    private static $imile_consignor_address = null;
    private static $imile_consignor_longitude = null;
    private static $imile_consignor_latitude = null;
    private static $imile_consignor_zipcode = null;
    private static $imile_consignor_street = null;
    private static $imile_consignor_external_no = null;
    private static $imile_consignor_ixternal_no = null;
    private static $imile_payment_method = null;
    private static $imile_is_pickup = null;
    private static $imile_sandbox_url = null;
    private static $imile_production_url = null;

    private static $imile_access_token = null;
    private static $imile_customer_id = null;
    private static $imile_customer_secret = null;
    private static $imile_format = null;
    private static $imile_api_version = null;
    private static $imile_sign_method = null;
    private static $imile_timezone = null;


    private static $is_production = null;

//    private static $express_no = null;

    public function __construct()
    {
        $system = SystemImile::orderBy('id', 'asc')->first();

        self::$get_access_token_url = config('imile_endpoints.get_access_token_url', '');
        self::$add_consignor_url = config('imile_endpoints.add_consignor_url', '');
        self::$create_order_url = config('imile_endpoints.create_order_url', '');
        self::$delete_order_url = config('imile_endpoints.delete_order_url', '');
        self::$track_order_url = config('imile_endpoints.track_single_order_url', '');


//        self::$imile_order_type = config('imilezcart.imile_order_type', '');
//        self::$imile_old_express_no = config('imilezcart.imile_old_express_no', '');
//        self::$imile_delivery_type = config('imilezcart.imile_delivery_type', '');
//        self::$imile_aging_code = config('imilezcart.imile_aging_code', '');
//        self::$imile_consignor = config('imilezcart.imile_consignor', '');
//        self::$imile_consignor_contact = config('imilezcart.imile_consignor_contact', '');
//        self::$imile_consignor_phone = config('imilezcart.imile_consignor_phone', '');
//        self::$imile_consignor_mobile = config('imilezcart.imile_consignor_mobile', '');
//        self::$imile_consignor_country = config('imilezcart.imile_consignor_country', '');
//        self::$imile_consignor_city = config('imilezcart.imile_consignor_city', '');
//        self::$imile_consignor_area = config('imilezcart.imile_consignor_area', '');
//        self::$imile_consignor_address = config('imilezcart.imile_consignor_address', '');
//        self::$imile_consignor_longitude = config('imilezcart.imile_consignor_longitude', '');
//        self::$imile_consignor_latitude = config('imilezcart.imile_consignor_latitude', '');
//        self::$imile_consignor_zipcode = config('imilezcart.imile_consignor_zipcode', '');
//        self::$imile_consignor_street = config('imilezcart.imile_consignor_street', '');
//        self::$imile_consignor_external_no = config('imilezcart.imile_consignor_external_no', '');
//        self::$imile_consignor_ixternal_no = config('imilezcart.imile_consignor_ixternal_no', '');
//        self::$imile_payment_method = config('imilezcart.imile_payment_method', '');
//        self::$imile_is_pickup = config('imilezcart.imile_is_pickup', '');


//        self::$imile_order_type = config('imilezcart.imile_order_type', '');
        self::$imile_delivery_type = $system->imile_delivery_type;
        self::$imile_aging_code = $system->imile_aging_code;
        self::$imile_consignor = $system->imile_consignor;
        self::$imile_consignor_contact = $system->imile_consignor_contact;
        self::$imile_consignor_phone = $system->imile_consignor_phone;
        self::$imile_consignor_mobile = $system->imile_consignor_mobile;
        self::$imile_consignor_country = $system->imile_consignor_country;
        self::$imile_consignor_city = $system->imile_consignor_city;
        self::$imile_consignor_area = $system->imile_consignor_area;
        self::$imile_consignor_address = $system->imile_consignor_address;
        self::$imile_consignor_longitude = $system->imile_consignor_longitude;
        self::$imile_consignor_latitude = $system->imile_consignor_latitude;
        self::$imile_consignor_zipcode = $system->imile_consignor_zipcode;
        self::$imile_consignor_street = $system->imile_consignor_street;
        self::$imile_consignor_external_no = $system->imile_consignor_external_no;
        self::$imile_consignor_ixternal_no = $system->imile_consignor_ixternal_no;
//        self::$imile_payment_method = $system->imile_payment_method;
        self::$imile_is_pickup = $system->imile_is_pickup;

        self::$imile_access_token = $system->imile_access_token;
        self::$is_production = $system->is_production;
        self::$imile_sandbox_url = $system->imile_sandbox_url;
        self::$imile_production_url = $system->imile_production_url;
        self::$imile_customer_id = $system->imile_customer_id;
        self::$imile_customer_secret = $system->imile_customer_secret;
        self::$imile_format = $system->imile_format;
        self::$imile_api_version = $system->imile_api_version;
        self::$imile_sign_method = $system->imile_sign_method;
        self::$imile_timezone = $system->imile_timezone;

    }

    private static function sendRequest($endpoint, $params, $accessToken = null)
    {

        return Http::post( ( self::$is_production ? self::$imile_production_url : self::$imile_sandbox_url ) . $endpoint, [
            "customerId" => self::$imile_customer_id,
            "sign" => self::$imile_customer_secret,
            "accessToken" => $accessToken ?? self::$imile_access_token,
            "signMethod" => self::$imile_sign_method,
            "format" => self::$imile_format,
            "version" => self::$imile_api_version,
            "timestamp" => Carbon::now()->timestamp,
            "timeZone" => self::$imile_timezone,
            "param" => $params

        ]);
    }

    public static function getAccessToken()
    {
        if (!self::hasAccessToken()) {
            $response = self::sendRequest(self::$get_access_token_url, ["grantType" => "clientCredential"]);
            if ($response->getBody()) {
                $body = json_decode($response->getBody(), true);
                if ($body['code'] == "200") {
                    $data = $body['data'];
                    $access_token = $data['accessToken'];
                    $access_token_expire_time = $data['expiresIn'];
                    self::$access_token = $access_token;
                    self::$access_token_expire_time = $access_token_expire_time;
                    session(['accessToken' => self::$access_token]);
                    session(['accessTokenExpiresIn' => self::$access_token_expire_time]);

                }
                dd($body);
            }
        }
        return ["accessToken" => session('accessToken'), "expiresIn" => session('accessTokenExpiresIn')];
    }

    public static function createOrder(
        $orderCode = "a1345623546",
                                       $orderType = "100",
//                                       $deliveryType = "Delivery",
//                                       $agingCode = "ST",
//                                       $consignor = "Testy Number 3",
//                                       $consignorContact = "CCC",
//                                       $consignorPhone = "87654321",
//                                       $consignorMobile = "87654321",
//                                       $consignorCountry = "UAE",
//                                       $consignorCity = "Dubai",
//                                       $consignorAddress = "Shop# 104,Ras al Khor Road",
//                                       $consignorLongitude = "",
//                                       $consignorLatitude = "",
//                                       $consignorZipCode = "00000",
//                                       $consignorStreet = "Ras al khor road",
//                                       $consignorExternalNo = "",
//                                       $consignorIxternalNo = "",
                                       $consignee = "Jose",
                                       $consigneeContact = "Jose",
                                       $consigneeMobile = "0527654321",
                                       $consigneePhone = "0527654321",
                                       $consigneeCountry = "UAE",
                                       $consigneeCity = "Dubai",
                                       $consigneeAddress = "Sheikh zayed road",
                                       $consigneeZipCode = "00000",
                                       $consigneeStreet = "Sheikh zayed road",
                                       $paymentMethod = "100",
                                       $goodsValue = "20",
                                       $collectingMoney = "0",
                                       $totalCount = "1",
                                       $totalWeight = "0.5",
                                       $totalVolume = 0.5,
                                       $skuTotal = 1,
                                       $isPickUp = "",
                                       $currency = "Local",
                                       $skuAll = []

    )
    {

//        self::$imile_consignor = $system->imile_consignor;
//        self::$imile_consignor_contact = $system->imile_consignor_contact;
//        self::$imile_consignor_phone = $system->imile_consignor_phone;
//        self::$imile_consignor_mobile = $system->imile_consignor_mobile;
//        self::$imile_consignor_country = $system->imile_consignor_country;
//        self::$imile_consignor_city = $system->imile_consignor_city;
//        self::$imile_consignor_area = $system->imile_consignor_area;
//        self::$imile_consignor_address = $system->imile_consignor_address;
//        self::$imile_consignor_longitude = $system->imile_consignor_longitude;
//        self::$imile_consignor_latitude = $system->imile_consignor_latitude;
//        self::$imile_consignor_zipcode = $system->imile_consignor_zipcode;
//        self::$imile_consignor_street = $system->imile_consignor_street;
//        self::$imile_consignor_external_no = $system->imile_consignor_external_no;
//        self::$imile_consignor_ixternal_no = $system->imile_consignor_ixternal_no;
////        self::$imile_payment_method = $system->imile_payment_method;
//        self::$imile_is_pickup = $system->imile_is_pickup;

        if (self::hasAccessToken()) {
            $response = self::sendRequest(self::$create_order_url, [
                "orderCode" => $orderCode,
                "orderType" => $orderType,
//                "oldExpressNo" => "",
                "deliveryType" => self::$imile_delivery_type,
                "agingCode" => self::$imile_aging_code,
                "consignor" => self::$imile_consignor,
                "consignorContact" => self::$imile_consignor_contact,
                "consignorPhone" => self::$imile_consignor_phone,
                "consignorMobile" => self::$imile_consignor_mobile,
                "consignorCountry" => self::$imile_consignor_country,
//                "consignorProvince" => "",
                "consignorCity" => self::$imile_consignor_city,
                "consignorArea" => self::$imile_consignor_area,
                "consignorAddress" => self::$imile_consignor_address,
                "consignorLongitude" => self::$imile_consignor_longitude,
                "consignorLatitude" => self::$imile_consignor_latitude,
                "consignorZipCode" => self::$imile_consignor_zipcode,
                "consignorStreet" => self::$imile_consignor_street,
                "consignorExternalNo" => self::$imile_consignor_external_no,
                "consignorIxternalNo" => self::$imile_consignor_ixternal_no,
                "consignee" => $consignee,
                "consigneeContact" => $consigneeContact,
                "consigneeMobile" => $consigneeMobile,
                "consigneePhone" => $consigneePhone,
//                "serviceTime" => "",
                "consigneeCountry" => $consigneeCountry,
                "consigneeCity" => $consigneeCity,
                "consigneeAddress" => $consigneeAddress,
                "consigneeZipCode" => $consigneeZipCode,
                "consigneeStreet" => $consigneeStreet,
                "paymentMethod" => $paymentMethod,
                "goodsValue" => $goodsValue,
                "collectingMoney" => $collectingMoney,
                "totalCount" => $totalCount,
                "totalWeight" => $totalWeight,
                "totalVolume" => $totalVolume,
                "skuTotal" => $skuTotal,
                "skuName" => $skuAll[0]["skuName"],
//                "deliveryRequirements" => "",
//                "orderDescription" => "",
//                "buyerId" => "",
                "isPickUp" => $isPickUp,
//                "platform" => "",
                "currency" => $currency,
                "skuDetailList" => $skuAll
            ], session('accessToken'));
            if ($response->getBody()) {
                $body = json_decode($response->getBody(), true);
                return $body;
            } else
                return $response;
        } else {
            self::refreshAccessToken();
            return self::createOrder(
                $orderCode, $orderType,
//                $deliveryType, $agingCode, $consignor, $consignorContact,
//                $consignorPhone, $consignorMobile, $consignorCountry, $consignorCity, $consignorAddress,
//                $consignorLongitude, $consignorLatitude, $consignorZipCode, $consignorStreet, $consignorExternalNo,
//                $consignorIxternalNo,
                $consignee, $consigneeContact, $consigneeMobile, $consigneePhone,
                $consigneeCountry, $consigneeCity, $consigneeAddress, $consigneeZipCode, $consigneeStreet,
                $paymentMethod, $goodsValue, $collectingMoney, $totalCount, $totalWeight, $totalVolume,
                $skuTotal, $isPickUp, $currency, $skuAll
            );
        }
    }

    public static function trackOrder($express_no, $orderType = "1", $language = "1")
    {
        if (self::hasAccessToken()) {
            $response = self::sendRequest(self::$track_order_url, [
                "orderType" => $orderType,
                "orderNo" => $express_no,
                "language" => $language

            ], session('accessToken'));
            if ($response->getBody()) {
                $body = json_decode($response->getBody(), true);
                return $body;
            }
            return $response;
        } else {
            self::refreshAccessToken();
            return self::trackOrder($express_no, $orderType, $language);
        }
    }

    public static function deleteOrder($orderId)
    {
        if (self::hasAccessToken()) {
            $response = self::sendRequest(self::$delete_order_url, [
                "orderCode" => $orderId,
            ], session('accessToken'));
            if ($response->getBody()) {
                $body = json_decode($response->getBody(), true);
                return $body;
            }
            return $response;
        } else {
            self::refreshAccessToken();
            return self::deleteOrder($orderId);
        }
    }

    public static function addConsignor(
        $companyName = "Testy Number 3",
        $contacts = "CCC",
        $country = "UAE",
        $city = "Dubai",
        $address = "Shop# 104,Ras al Khor Road",
        $phone = "87654321",
        $email = "cccba@me.me",
        $attentions = "this is consignor address",
        $defaultOption = "1"
    )
    {
        if (self::hasAccessToken()) {
            $response = self::sendRequest(self::$add_consignor_url, [
                "companyName" => $companyName,
                "contacts" => $contacts,
                "country" => $country,
                "city" => $city,
                "address" => $address,
                "phone" => $phone,
                "email" => $email,
                "attentions" => $attentions,
                "defaultOption" => $defaultOption
            ], session('accessToken'));
            if ($response->getBody()) {
                $body = json_decode($response->getBody(), true);
                return $body;
            }
            return $response;
        } else {
            self::refreshAccessToken();
            return self::addConsignor(
                $companyName, $contacts, $country, $city, $address, $phone,
                $email, $attentions, $defaultOption
            );
        }
    }

    public static function hasAccessToken()
    {
        return session('accessToken') !== null;
    }

    public static function refreshAccessToken()
    {
        session()->remove('accessToken');
        session()->remove('accessTokenExpiresIn');
        $response = self::sendRequest(self::$get_access_token_url, ["grantType" => "clientCredential"]);
        if ($response->getBody()) {
            $body = json_decode($response->getBody(), true);
            if ($body['code'] == "200") {
                $data = $body['data'];
                $access_token = $data['accessToken'];
                $access_token_expire_time = $data['expiresIn'];
                self::$access_token = $access_token;
                self::$access_token_expire_time = $access_token_expire_time;
                session(['accessToken' => self::$access_token]);
                session(['accessTokenExpiresIn' => self::$access_token_expire_time]);
            }
        }
        return ["accessToken" => session('accessToken'), "expiresIn" => session('accessTokenExpiresIn')];
    }


}

?>
