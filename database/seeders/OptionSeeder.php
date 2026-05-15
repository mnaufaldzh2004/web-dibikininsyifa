<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Carbon;
class OptionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('additional_options')->insertOrIgnore([
            [
                'option_name'=> 'Cetak Frame A4',
                'additional_price' =>  165000,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ], 
            [
                'option_name' => 'Cetak Frame A5 ',
                'additional_price' => 110000,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ], 
            [
                'option_name' => 'Cetak Frame A6',
                'additional_price' => 60000,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'option_name' => 'Cetak Paper A4 ',
                'additional_price' => 150000,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'option_name' => 'Cetak Paper A5',
                'additional_price' => 100000,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ], 
            [
                'option_name' => 'Cetak Paper A6',
                'additional_price' => 50000,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'option_name' => '+1 Kepala',
                'additional_price' => 25000,
                 'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ], 
            [
                'option_name' => 'Deadline H-1 ',
                'additional_price' => 15000,
                 'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'option_name' => 'Deadline H-3',
                'additional_price' => 10000,
                 'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ], [
                'option_name' => 'Kartu Ucapan',
                'additional_price' => 5000,
                 'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ]
        ]);
    }
}
