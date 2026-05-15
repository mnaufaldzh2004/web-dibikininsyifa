<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Carbon;
class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('roles')->insertOrIgnore([
            [
                "name" => 'admin',
                'description' => 'Admin role with full permission',
                 'created_at' => Carbon::now(),
            'updated_at' => Carbon::now() 
            ], 
            [
                'name' => 'customer', 
                'description' => 'Customer role with limited permission',
                 'created_at' => Carbon::now(),
            'updated_at' => Carbon::now() 
            ],
           
            [
                'name' => 'ilustrator',
                'description' => 'Ilustrator role with permission to create and manage ilutrations',
                 'created_at' => Carbon::now(),
            'updated_at' => Carbon::now() 
            ]
                
            
        ]);
    }
}
