<?php
namespace Waqarali7\Imilezcart\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SystemImile extends Model
{
    use HasFactory;
    protected $fillable = [
        'imile_sandbox_url',
        'imile_production_url',
        'imile_access_token',
        'imile_customer_id',
        'imile_format',
        'imile_customer_secret',
        'imile_api_version',
        'imile_sign_method',
        'imile_timezone',
        'imile_delivery_type',
        'imile_aging_code',
        'imile_consignor',
        'imile_consignor_contact',
        'imile_consignor_phone',
        'imile_consignor_mobile',
        'imile_consignor_country',
        'imile_consignor_city',
        'imile_consignor_area',
        'imile_consignor_address',
        'imile_consignor_longitude',
        'imile_consignor_latitude',
        'imile_consignor_zipcode',
        'imile_consignor_street',
        'imile_consignor_external_no',
        'imile_consignor_ixternal_no',
        'imile_is_pickup',
        'is_production',
    ];

}
