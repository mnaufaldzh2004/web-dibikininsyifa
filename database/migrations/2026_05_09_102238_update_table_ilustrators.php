<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('ilustrators', function (Blueprint $table) {
             $table->renameColumn('nama_proyek', 'portofolio_name');
            $table->renameColumn('image', 'image_portofolio');
          $table->renameColumn('deskripsi', 'portofolio_description');

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('ilustrators', function (Blueprint $table) {
            //
        });
    }
};
