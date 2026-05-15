<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Carbon;
class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
{
    $imageYuna = 'img/yuna.jpeg';
    $imageJungwoon = 'img/jungwoon.jpeg';
    $imageYeji = 'img/yeji2.jpeg';

    /*
    |--------------------------------------------------------------------------
    | YEJI
    |--------------------------------------------------------------------------
    */

    DB::table('users')->updateOrInsert(
        [
            "email" => "yeji@gmail.com",
        ],
        [
            "name" => 'Yeji',
            "role_id" => 3,
            "profile_image" => $imageYeji,
            "password" => Hash::make('dibikininsyifa1234'),
            "phone" => "081212028123",
            "status" => "active",
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]
    );

    $userYeji = DB::table('users')
        ->where('email', 'yeji@gmail.com')
        ->first();

    DB::table('ilustrators')->updateOrInsert(
        [
            'user_id' => $userYeji->id
        ],
        [
            'portofolio_name' => 'Anime Character Art',
            'portofolio_description' => 'Spesialis ilustrasi anime aesthetic dan colorful',
            'image_portofolio' => 'img/portofolio/yeji-art.jpeg',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]
    );

    /*
    |--------------------------------------------------------------------------
    | JUNGWOON
    |--------------------------------------------------------------------------
    */

    DB::table('users')->updateOrInsert(
        [
            "email" => "jungwoon@gmail.com",
        ],
        [
            "name" => 'Jungwoon',
            "role_id" => 3,
            "profile_image" => $imageJungwoon,
            "password" => Hash::make('dibikininsyifa1234'),
            "phone" => "081212028124",
            "status" => "active",
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]
    );

    $userJungwoon = DB::table('users')
        ->where('email', 'jungwoon@gmail.com')
        ->first();

    DB::table('ilustrators')->updateOrInsert(
        [
            'user_id' => $userJungwoon->id
        ],
        [
            'portofolio_name' => 'Fantasy Digital Art',
            'portofolio_description' => 'Ilustrator fantasy art dengan style semi realism',
            'image_portofolio' => 'img/portofolio/jungwoon-art.jpeg',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]
    );

    /*
    |--------------------------------------------------------------------------
    | YUNA
    |--------------------------------------------------------------------------
    */

    DB::table('users')->updateOrInsert(
        [
            "email" => "yuna@gmail.com",
        ],
        [
            "name" => 'Yuna',
            "role_id" => 3,
            "profile_image" => $imageYuna,
            "password" => Hash::make('dibikininsyifa1234'),
            "phone" => "081212028125",
            "status" => "active",
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]
    );

    $userYuna = DB::table('users')
        ->where('email', 'yuna@gmail.com')
        ->first();

    DB::table('ilustrators')->updateOrInsert(
        [
            'user_id' => $userYuna->id
        ],
        [
            'portofolio_name' => 'Cute Chibi Illustration',
            'portofolio_description' => 'Fokus pada ilustrasi chibi dan karakter lucu',
            'image_portofolio' => 'img/portofolio/yuna-art.jpeg',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]
    );
}
}
