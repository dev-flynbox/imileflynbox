<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddIsProductionToImileSettingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (!Schema::hasColumns('system_imiles', ['is_production'])) {
            Schema::table('system_imiles', function (Blueprint $table) {
                $table->boolean('is_production')->default(false)->after('imile_is_pickup');
            });
        }

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('system_imiles', function (Blueprint $table) {
            $table->dropColumn('is_production');
        });

    }
}
