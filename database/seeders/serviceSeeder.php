<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;

class serviceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('services')->insertOrIgnore([
            [
                 'service_name' => 'Sketsa Sederhana',
                 'description' => 'Layanan ilustrasi karakter untuk kebutuhan pribadi atau bisnis',
                 'base_price' => 50000,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()  
                 
                 ],
                [
                    'service_name' => 'Ilustrasi Berwarna',
                    'description' => 'Layanan ilustrasi berwarna untuk kebutuhan pribadi atau bisnis',
                    'base_price' => 120000,
                    'created_at' => Carbon::now(),
                    'updated_at' => Carbon::now()
                ],
                [
                    'service_name' => 'Ilustrasi Premium',
                    'description' => 'Layanan ilustrasi premium dengan detail tinggi untuk kebutuhan pribadi atau bisnis',
                    'base_price ' => 250000,
                    'created_at' => Carbon::now(),
                    'updated_at' => Carbon::now()
                ]
        ]);
    }
}
