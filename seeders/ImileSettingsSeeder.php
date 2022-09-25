<?php

namespace Waqarali7\Imilezcart\Seeders;

use Carbon\Carbon;
use Database\Seeders\BaseSeeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class ImileSettingsSeeder extends BaseSeeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $module = DB::table('modules')->insert(['name'=> 'System Imile']);
        $module = DB::table('modules')->where('name', '=', 'System Imile')->first();
        $now = Carbon::Now();
        $action = 'view';
        $slug = strtolower($action).'_'.Str::snake($module->name);
        $permission_id = DB::table('permissions')->insertGetId(
            [
                'module_id' => $module->id,
                'name' => Str::title($action),
                'slug' => $slug,
                'created_at' => $now,
                'updated_at' => $now,
            ]
        );
        DB::table('permission_role')->insert(
            [
                'permission_id' => $permission_id,
                'role_id' => \App\Models\Role::ADMIN,
                'created_at' => $now,
                'updated_at' => $now,
            ]
        );
        $action = 'edit';
        $slug = strtolower($action).'_'.Str::snake($module->name);
        $permission_id = DB::table('permissions')->insertGetId(
            [
                'module_id' => $module->id,
                'name' => Str::title($action),
                'slug' => $slug,
                'created_at' => $now,
                'updated_at' => $now,
            ]
        );

                DB::table('permission_role')->insert(
            [
                'permission_id' => $permission_id,
                'role_id' => \App\Models\Role::ADMIN,
                'created_at' => $now,
                'updated_at' => $now,
            ]
        );

        DB::table('system_imile')->insert(
            [
                'created_at' => $now,
                'updated_at' => $now,
            ]
        );

    }
}
