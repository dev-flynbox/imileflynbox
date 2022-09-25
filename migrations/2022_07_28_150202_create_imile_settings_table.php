<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateImileSettingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('system_imiles', function (Blueprint $table) {
            $table->id();

            $table->string('imile_sandbox_url')->nullable(true);
            $table->string('imile_production_url')->nullable(true);
            $table->string('imile_access_token')->nullable(true);
            $table->string('imile_customer_id')->nullable(true);
            $table->string('imile_format')->nullable(true);
            $table->string('imile_customer_secret')->nullable(true);
            $table->string('imile_api_version')->nullable(true);
            $table->string('imile_sign_method')->nullable(true);
            $table->string('imile_timezone')->nullable(true);
            $table->string('imile_delivery_type')->nullable(true);
            $table->string('imile_aging_code')->nullable(true);


            $table->string('imile_consignor')->nullable(true);
            $table->string('imile_consignor_contact')->nullable(true);
            $table->string('imile_consignor_phone')->nullable(true);
            $table->string('imile_consignor_mobile')->nullable(true);
            $table->string('imile_consignor_country')->nullable(true);
            $table->string('imile_consignor_city')->nullable(true);
            $table->string('imile_consignor_area')->nullable(true);
            $table->string('imile_consignor_address')->nullable(true);
            $table->string('imile_consignor_longitude')->nullable(true);
            $table->string('imile_consignor_latitude')->nullable(true);
            $table->string('imile_consignor_zipcode')->nullable(true);
            $table->string('imile_consignor_street')->nullable(true);
            $table->string('imile_consignor_external_no')->nullable(true);
            $table->string('imile_consignor_ixternal_no')->nullable(true);
            $table->string('imile_is_pickup')->nullable(true);

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('imile_settings');
    }
}
