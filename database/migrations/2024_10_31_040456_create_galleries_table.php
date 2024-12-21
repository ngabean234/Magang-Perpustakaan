<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('galleries', function (Blueprint $table) {
            $table->id();
            $table->unsignedInteger('category_gallery_id');
            $table->string('title');
            $table->text('description')->nullable();
            $table->string('image_path');
            $table->string('author'); // Penulis/Pengambil Foto
            $table->date('date_taken'); // Tanggal Pengambilan
            $table->string('location'); // Lokasi
            $table->timestamps();

            $table->foreign('category_gallery_id')->references('id')->on('category_galleries')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('galleries');
    }
};
